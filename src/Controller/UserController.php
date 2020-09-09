<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\OrderRepository;
use App\Form\UserType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
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

    public function cart(OrderRepository $orderRepository)
    {
        $user = $this->getUser();
        $cart = $orderRepository->findOneBy(['user' => $user, 'validated' => false]);
        return $this->render('front/user/cart.html.twig', [
            'user' => $user,
            'cart' => $cart
        ]);
    }
}
