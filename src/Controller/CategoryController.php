<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/calendars", name="calendars")
     */
    public function calendars(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $category = $categoryRepository->findOneBy(['slug' => Category::CALENDARS]);
        $customProducts = $productRepository->findLike('personnalisable', $category);
        $otherProducts = $productRepository->findOthers('personnalisable', $category);
        return $this->render('front/category/calendars.html.twig', [
            'customs' => $customProducts,
            'others' => $otherProducts
        ]);
    }

    /**
     * @Route("/books", name="books")
     */
    public function books(CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->findOneBy(['slug' => Category::BOOKS]);
        $products = [];
        if ($category) {
            $products = $category->getProducts();
        }
        return $this->render('front/category/books.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/agendas", name="agendas")
     */
    public function agendas(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $agendasCat = $categoryRepository->findOneBy(['slug' => Category::AGENDAS]);
        $notebooksCat = $categoryRepository->findOneBy(['slug' => Category::NOTEBOOKS]);
        $agendas = [];
        $notebooks = [];
        if ($agendasCat) {
            $agendas = $productRepository->findBy(['category' => $agendasCat]);
        }
        if ($notebooksCat) {
            $notebooks = $productRepository->findBy(['category' => $notebooksCat]);
        }
        return $this->render('front/category/agendas.html.twig', [
            'agendas' => $agendas,
            'notebooks' => $notebooks
        ]);
    }

    /**
     * @Route("/booklets", name="booklets")
     */
    public function booklets(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $category = $categoryRepository->findOneBy(['slug' => Category::BOOKLET]);
        $booklets = [];
        if ($category) {
            $booklets = $productRepository->findBy(['category' => $category]);
        }
        return $this->render('front/category/booklets.html.twig', [
            'booklets' => $booklets,
        ]);
    }

    /**
     * @Route("/flyers", name="flyers")
     */
    public function flyers(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $category = $categoryRepository->findOneBy(['slug' => Category::FLYER]);
        $flyers = [];
        if ($category) {
            $flyers = $productRepository->findBy(['category' => $category]);
        }
        return $this->render('front/category/flyers.html.twig', [
            'flyers' => $flyers,
        ]);
    }

    /**
     * @Route("/communication", name="communication")
     */
    public function communication()
    {
        return $this->render('front/category/communication.html.twig');
    }
}
