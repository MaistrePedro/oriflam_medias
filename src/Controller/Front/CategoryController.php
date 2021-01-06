<?php

namespace App\Controller\Front;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{slug}", name="category")
     */
    public function category($slug, CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $category = $categoryRepository->findOneBy(['slug' => $slug]);
        $products = $category->getProducts();
        foreach ($products as $product) {
            $product->setMinPrice();
        }
        return $this->render('front/category/index.html.twig', [
            'category' => $category,
        ]);
    }
}
