<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use App\Form\Admin\EditValidatedOrderType;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}