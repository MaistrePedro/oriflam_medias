<?php

namespace App\Controller;

use App\Repository\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/page/{short}", name="page")
     */
    public function index(string $short, PageRepository $pageRepository)
    {
        $page = $pageRepository->findOneBy(['short' => $short]);
        return $this->render('front/page/index.html.twig', [
            'page' => $page
        ]);
    }
}
