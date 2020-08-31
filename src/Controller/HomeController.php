<?php

namespace App\Controller;

use App\Repository\ProductTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProductTypeRepository $productTypeRepository)
    {
        return $this->render('front/home/index.html.twig', [
            'product_types' => $productTypeRepository->findBy(['displayHomepage' => true]),
        ]);
    }
}
