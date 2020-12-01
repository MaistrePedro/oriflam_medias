<?php

namespace App\Controller\Front;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NavbarController extends AbstractController
{
    /**
     * @Route("/navbar", name="navbar")
     */
    public function navbar(CategoryRepository $categoryRepository)
    {
        return $this->render('front/_navbar.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}
