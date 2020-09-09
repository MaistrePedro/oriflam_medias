<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Options;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FlyerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category;
        $category
            ->setLabel('Flyers')
            ->setSlug(Category::FLYER)
        ;
        $manager->persist($category);

        $product = new Product;
        $product
            ->setName('Flyer A6 (10 x 15 cm) 100 g/m² papier couché brillant 1 recto - Quadri')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setLabel('Flyer A6 100g recto - 100')
            ->setPrice(18)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A6 100g recto - 250')
            ->setPrice(20)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A6 100g recto - 500')
            ->setPrice(23)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A6 100g recto - 1000')
            ->setPrice(27)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A6 100g recto - 2500')
            ->setPrice(32)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A6 100g recto - 10 000')
            ->setPrice(67)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $product = new Product;
        $product
            ->setName('Flyer A5 (15 x 15 cm) 135 g/m² papier couché brillant 1 recto - Quadri')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setLabel('Flyer A5 135 g recto - 100')
            ->setPrice(23)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A5 135 g recto - 250')
            ->setPrice(26)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A5 135 g recto - 500')
            ->setPrice(28)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A5 135 g recto - 1000')
            ->setPrice(33)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A5 135 g recto - 2 500')
            ->setPrice(42)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A5 135 g recto - 5 000')
            ->setPrice(60)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A5 135 g recto - 10 000')
            ->setPrice(120)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $product = new Product;
        $product
            ->setName('Flyer A4 (21 x 29,7 cm) 135 g/m² papier couché brillant 1 recto - Quadri')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setLabel('Flyer A4 135 g recto - 100')
            ->setPrice(36)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A4 135 g recto - 250')
            ->setPrice(47)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A4 135 g recto - 500')
            ->setPrice(52)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A4 135 g recto - 1000')
            ->setPrice(64)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A4 135 g recto - 2 500')
            ->setPrice(86)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A4 135 g recto - 5 000')
            ->setPrice(157)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('Flyer A4 135 g recto - 10 000')
            ->setPrice(288)
            ->setProduct($product)
        ;
        $manager->persist($option);

        $manager->flush();
    }
}
