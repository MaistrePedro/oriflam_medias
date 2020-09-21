<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Options;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category;
        $category
            ->setLabel('Beaux livres')
            ->setSlug(Category::BOOKS)
        ;
        $manager->persist($category);

        $product = new Product;
        $product
            ->setName('Grand format à l\'italienne (29,7 X 21 cm)')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setLabel('1 exemplaire - 24 pages')
            ->setPrice(52)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('2 exemplaires - 24 pages')
            ->setPrice(74)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('5 exemplaires - 24 pages')
            ->setPrice(130)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 24 pages')
            ->setPrice(227)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 36 pages')
            ->setPrice(240.5)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 48 pages')
            ->setPrice(254)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 56 pages')
            ->setPrice(260)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 64 pages')
            ->setPrice(272)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 80 pages')
            ->setPrice(288.5)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 104 pages')
            ->setPrice(316)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 120 pages')
            ->setPrice(333)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $product = new Product;
        $product
            ->setName('Grand format portrait (21 X 29,7 cm)')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setLabel('1 exemplaire - 24 pages')
            ->setPrice(52)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('2 exemplaires - 24 pages')
            ->setPrice(74)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('5 exemplaires - 24 pages')
            ->setPrice(130)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 24 pages')
            ->setPrice(227)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 36 pages')
            ->setPrice(240.5)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 48 pages')
            ->setPrice(254)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 56 pages')
            ->setPrice(260)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 64 pages')
            ->setPrice(272)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 80 pages')
            ->setPrice(288.5)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 104 pages')
            ->setPrice(316)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires - 120 pages')
            ->setPrice(333)
            ->setProduct($product);
        ;
        $manager->persist($option);

        $manager->flush();
    }
}