<?php

namespace App\Controller\Front;

use App\Repository\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/cgv", name="cgv")
     */
    public function cgv()
    {
        return $this->render('front/page/cgv.html.twig');
    }

    /**
     * @Route("/legals", name="legals")
     */
    public function legals()
    {
        return $this->render('front/page/legals.html.twig');
    }

    /**
     * @Route("/company", name="company")
     */
    public function company()
    {
        return $this->render('front/page/company.html.twig');
    }
}
