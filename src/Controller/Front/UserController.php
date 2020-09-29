<?php

namespace App\Controller\Front;

use App\Entity\Order;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Options;
use App\Repository\OrderRepository;
use App\Form\EditUserType;
use App\Form\FinalizeOrderType;
use App\Form\UserType;
use App\Repository\OptionsRepository;
use App\Repository\ProductRepository;
use App\Service\RandomStringGenerator;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\String\Slugger\SluggerInterface;

class UserController extends AbstractController
{
    const REFUSED = 'REFUSED';
    const ABANDONED = 'ABANDONED';
    const AUTHORISED = 'AUTHORISED';

    /**
     * @Route("/cart", name="cart")
     */
    public function cart(Request $request, OrderRepository $orderRepository)
    {
        $user = $this->getUser();
        $cart = $orderRepository->findOneBy(['user' => $user, 'validated' => false]);
        $signature = '';
        $params = [];

        if ($cart) {
            $actionMode = 'INTERACTIVE';
            $amount = $cart->getCost() * 1.2;
            $ctxMode = '';
            $currency = 978;
            $pageAction = 'PAYMENT';
            $paymentConfig = 'SINGLE';
            $returnMode = 'POST';
            $siteId = $_ENV['SHOP_ID'];
            $date = date('YmdHis');
            $transId = $cart->getTransactionId();
            $urlReturn = $request->getSchemeAndHttpHost() . $this->generateUrl('return');
            $version = 'V2';
            if ($_ENV['APP_ENV'] === 'prod') {
                $ctxMode = 'PRODUCTION';
            } else {
                $ctxMode = 'TEST';
            }

            $params = [
                'vads_action_mode' => $actionMode,
                'vads_amount' => $amount * 100,
                'vads_ctx_mode' => $ctxMode,
                'vads_currency' => $currency,
                'vads_page_action' => $pageAction,
                'vads_payment_config' => $paymentConfig,
                'vads_return_mode' => $returnMode,
                'vads_site_id' => $siteId,
                'vads_trans_date' => $date,
                'vads_trans_id' => $transId,
                'vads_url_return' => $urlReturn,
                'vads_version' => $version
            ];

            $signature = $this->getSignature($params);
        }

        return $this->render('front/user/cart.html.twig', [
            'user' => $user,
            'cart' => $cart,
            'signature' => $signature,
            'params' => $params
        ]);
    }

    /**
     * @Route("/api/add-to-cart", name="add_to_cart ")
     */
    public function addToCart(
        Request $request,
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
        OptionsRepository $optionsRepository
    ) {
        $serializer = $this->container->get('serializer');
        $em = $this->getDoctrine()->getManager();
        $datas = json_decode($request->getContent());
        $productId = $datas->product;
        $optionId = $datas->option;
        $user = $this->getUser();
        $encoder = new JsonEncoder();
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                if ($object instanceof Category) {
                    return $object->getLabel();
                } elseif ($object instanceof Product) {
                    return $object->getName();
                } elseif ($object instanceof Options) {
                    return $object->getLabel();
                }
            }
        ];
        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);
        $serializer = new Serializer([$normalizer], [$encoder]);

        if (!$user) {
            $result = [
                'success' => false,
                'info' => 'Vous devez être connecté pour ajouter un produit au panier'
            ];
            return new Response($serializer->serialize($result, 'json'));
        }
        $order = $orderRepository->findOneBy(['user' => $user, 'validated' => false]);
        $result = '';
        if ($order === null) {
            $generator = new RandomStringGenerator();
            $asserter = false;
            $token = '';
            while ($asserter === false) {
                $token = $generator->generate(6);
                $orders = $orderRepository->findBy(['transactionId' => $token]);
                if (empty($orders)) {
                    $asserter = true;
                }
            }
            $order = new Order;
            $order
                ->setUser($user)
                ->setValidated(false)
                ->setCost(0)
                ->setTransactionId($token)
                ->setCreatedAt(new DateTime('now'))
                ->setUpdatedAt(new DateTime('now'));
            $em->persist($order);
            $em->flush();
        }
        if ($productId) {
            $product = $productRepository->findOneBy(['id' => $productId]);
            if ($product) {
                $order->addProduct($product);
                $cost = $order->getCost() + $product->getCost();
                $order->setCost($cost);
                $order->setUpdatedAt(new DateTime('now'));
                $em->flush();
                $result = [
                    'success' => true,
                    'info' => 'Produit ajouté au panier',
                ];
            } else {
                $result = [
                    'success' => false,
                    'info' => 'Le produit est introuvable'
                ];
            }
        }
        if ($optionId) {
            $option = $optionsRepository->findOneBy(['id' => $optionId]);
            if ($option) {
                $order->addOption($option);
                $cost = $order->getCost() + $option->getPrice();
                $order->setCost($cost);
                $order->setUpdatedAt(new DateTime('now'));
                $em->flush();
                $result = [
                    'success' => true,
                    'info' => 'Produit ajouté au panier',
                    'option' => $option
                ];
            } else {
                $result = [
                    'success' => false,
                    'info' => 'Le produit est introuvable'
                ];
            }
        }
        return new Response($serializer->serialize($result, 'json'));
    }

    /**
     * @Route("/cart/delete/{id}", name="cart_delete", methods={"DELETE"})
     */
    public function delete(Request $request, OrderRepository $orderRepository, Product $product = null, Options $option = null): Response
    {
        $user = $this->getUser();
        $cart = $orderRepository->findOneBy(['user' => $user, 'validated' => false]);
        $entityManager = $this->getDoctrine()->getManager();
        if ($product) {
            if ($this->isCsrfTokenValid('delete' . $product->getId(), $request->request->get('_token'))) {
                $totalCost = $cart->getCost() - $product->getCost();
                $cart->setCost($totalCost);
                $cart->removeProduct($product);
            }
        } else if ($option) {
            if ($this->isCsrfTokenValid('delete' . $option->getId(), $request->request->get('_token'))) {
                $totalCost = $cart->getCost() - $option->getPrice();
                $cart->setCost($totalCost);
                $cart->removeOption($option);
            }
        }
        $cartOptions = $cart->getOptions();
        $cartProducts = $cart->getProducts();
        if ($cartOptions->isEmpty() && $cartProducts->isEmpty()) {
            $entityManager->remove($cart);
        }
        $entityManager->flush();

        return $this->redirectToRoute('cart');
    }

    public function getSignature(array $params)
    {
        $signature = '';
        foreach ($params as $param) {
            $signature .= $param . '+';
        }
        $signature .= $_ENV['PAYMENT_KEY'];
        return \base64_encode(\hash_hmac('sha256', $signature, $_ENV['PAYMENT_KEY'], true));
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function showProfile()
    {
        $user = $this->getUser();
        if ($user) {
            return $this->render('front/user/profile.html.twig', [
                'page' => 'profile'
            ]);
        } else {
            $this->addFlash('error', 'Vous devez être connecté pour effectuer cette action');
            $this->redirectToRoute('home');
        }
    }

    /**
     * @Route("/profile/history", name="history")
     */
    public function orderHistory(OrderRepository $orderRepository)
    {
        if ($this->getUser()) {
            $orders = $orderRepository->findBy(['user' => $this->getUser(), 'validated' => true], ['updatedAt' => 'DESC']);
            return $this->render('front/user/history.html.twig', [
                'orders' => $orders,
                'page' => 'history'
            ]);
        } else {
            $this->addFlash('error', 'Vous devez être connecté pour effectuer cette action');
            return $this->redirectToRoute('home');
        }
    }

    /**
     * @Route("/profile/history/{transactionId}", name="show_order")
     */
    public function showOrder(string $transactionId, OrderRepository $orderRepository)
    {
        $order = $orderRepository->findOneBy(['transactionId' => $transactionId]);
        $user = $this->getUser();
        if ($user) {
            if ($order) {
                if ($order->getUser() === $user) {
                    return $this->render('front/user/show.html.twig', [
                        'order' => $order,
                        'page' => 'show-order'
                    ]);
                } else {
                    $this->addFlash('error', 'Cette commande ne correspond pas à votre compte client');
                    return $this->redirectToRoute('history');
                }
            } else {
                $this->addFlash('error', 'Commande introuvable.');
                return $this->redirectToRoute('history');
            }
        } else {
            $this->addFlash('error', 'Vous devez être connecté pour effectuer cette action');
            return $this->redirectToRoute('home');
        }
    }

    /**
     * @Route("/profile/edit", name="edit_profile")
     */
    public function editProfile(Request $request)
    {
        $user = $this->getUser();
        if ($user) {
            $form = $this->createForm(EditUserType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('profile');
            }
            return $this->render('front/user/edit.html.twig', [
                'form' => $form->createView(),
                'page' => 'signup'
            ]);
        } else {
            $this->addFlash('error', 'Vous devez être connecté pour effectuer cette action');
            return $this->redirectToRoute('home');
        }
    }

    /**
     * @Route("/return", name="return")
     */
    public function returnAfterPayment(Request $request, OrderRepository $orderRepository)
    {
        $status = $request->request->get('vads_trans_status');
        $transactionId = $request->request->get('vads_trans_id');
        $paymentMode = $request->request->get('vads_card_brand');

        if ($status === self::AUTHORISED) {
            $entityManager = $this->getDoctrine()->getManager();
            $order = $orderRepository->findOneBy(['transactionId' => $transactionId]);
            $order
                ->setValidated(true)
                ->setPaymentMode($paymentMode)
                ->setUpdatedAt(new DateTime('now'));
            $entityManager->flush();
            return $this->redirectToRoute('finalize_order', [
                'transactionId' => $transactionId
            ]);
        }
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/finalize-order/{transactionId}", name="finalize_order")
     */
    public function finalizeOrder(string $transactionId, Request $request, OrderRepository $orderRepository, SluggerInterface $slugger)
    {
        $order = $orderRepository->findOneBy(['transactionId' => $transactionId]);
        $form = $this->createForm(FinalizeOrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $time = time();
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . $time . '.' . $imageFile->guessExtension();

                $imageFile->move(
                    $this->getParameter('images_directory'),
                    $newFilename
                );
                $order->setImageFilename($newFilename);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }
            return $this->redirectToRoute('home');
        }
        return $this->render('front/user/finalize.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
