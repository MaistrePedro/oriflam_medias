<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use App\Form\Admin\BatType;
use App\Form\Admin\EditValidatedOrderType;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/admin/order")
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/", name="order_index", methods={"GET"})
     */
    public function index(OrderRepository $orderRepository): Response
    {
        return $this->render('admin/order/index.html.twig', [
            'orders' => $orderRepository->findBy(['validated' => true], ['updatedAt' => 'DESC']),
        ]);
    }

    /**
     * @Route("/{id}", name="order_show")
     */
    public function show(Order $order, Request $request): Response
    {
        $form = $this->createForm(EditValidatedOrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($order);
            $entityManager->flush();

            return $this->redirectToRoute('order_show', ['id' => $order->getId()]);
        }
        return $this->render('admin/order/show.html.twig', [
            'order' => $order,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/bat", name="send_bat")
     */
    public function sendBat(Order $order, Request $request, SluggerInterface $slugger)
    {
        $form = $this->createForm(BatType::class, $order);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $bat */
            $bat = $form->get('bat')->getData();
            // \dd($request);
            if ($bat) {
                $filesystem = new Filesystem;
                $images = $order->getImages();
                foreach ($images as $image) {
                    $file = 'public/uploads/images/'. $image->getName() . '.' . $image->getExtension();
                    // \dd($file);
                    $filesystem->remove($file);
                    $order->removeImage($image);
                }
                $time = time();
                $originalFilename = \pathinfo($bat->getClientOriginalName(), \PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . $time . '.' . $bat->guessExtension();

                $bat->move(
                    $this->getParameter('bat_directory'),
                    $newFilename
                );
                $order->setBat($newFilename);
                $images = $order->getImages();
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }
            return $this->redirectToRoute('order_show', [
                'id' => $order->getId()
            ]);
        }
        return $this->render('admin/order/send_bat.html.twig', [
            'form' => $form->createView()
        ]);
    }
}