<?php

namespace App\Controller\Front;

use App\Entity\Order;
use App\Entity\User;
use App\Repository\OrderRepository;
use App\Form\UserType;
use App\Repository\OptionsRepository;
use App\Repository\ProductRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/signup", name="signup")
     */
    public function index()
    {
        $user = new User;
        $form = $this->createForm(UserType::class, $user);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setLastAcceptedCgu(new DateTime('now'))
                ->setUpdatedAt(new DateTime('now'))
                ->setCreatedAt(new DateTime('now'))
                ->setRoles([User::ROLE_USER]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Message enregistré');
            return $this->redirectToRoute('contact');
        }

        return $this->render('front/user/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function cart(OrderRepository $orderRepository)
    {
        $user = $this->getUser();
        $cart = $orderRepository->findOneBy(['user' => $user, 'validated' => false]);
        return $this->render('front/user/cart.html.twig', [
            'user' => $user,
            'cart' => $cart
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
        if (!$user) {
            $result = $serializer->serialize([
                'success' => false,
                'info' => 'Vous devez être connecté pour ajouter un produit au panier'
            ], 'json');
            return new Response($result);
        }
        $order = null;
        $order = $orderRepository->findOneBy(['user' => $user, 'validated' => false]);
        // \dd(!$order); 
        $result = '';
        if (!$order) {
            $order = new Order;
            $order
                ->setUser($user)
                ->setValidated(false)
                ->setCost(0)
                ->setCreatedAt(new DateTime('now'))
                ->setUpdatedAt(new DateTime('now'));
        }
        if ($productId) {
            $product = $productRepository->findOneBy(['id' => $productId]);
            if ($product) {
                $order->addProduct($product);
                $cost = $order->getCost() + $product->getCost();
                $order->setCost($cost);
                $order->setUpdatedAt(new DateTime('now'));
                $em->persist($order);
                $em->flush();
                $result = $serializer->serialize([
                    'success' => true,
                    'info' => 'Produit ajouté au panier',
                ], 'json');
            }
            else {
                $result = $serializer->serialize([
                    'success' => false,
                    'info' => 'Le produit est introuvable'
                ], 'json');
            }
        }
        if ($optionId) {
            $option = $optionsRepository->findOneBy(['id' => $optionId]);
            if ($option) {
                $order->addOption($option);
                $cost = $order->getCost() + $option->getPrice();
                $order->setCost($cost);
                $order->setUpdatedAt(new DateTime('now'));
                $em->persist($order);
                $em->flush();
                $result = $serializer->serialize([
                    'success' => true,
                    'info' => 'Produit ajouté au panier',
                ], 'json');
            }
            else {
                $result = $serializer->serialize([
                    'success' => false,
                    'info' => 'Le produit est introuvable'
                ], 'json');
            }
        }
        return new Response($result);
    }

    public function removeFromCart(
        Request $request,
        ProductRepository $productRepository,
        OptionsRepository $optionsRepository,
        OrderRepository $orderRepository
    )
    {
        
    }
}
