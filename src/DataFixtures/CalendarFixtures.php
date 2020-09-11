<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Options;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CalendarFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category;
        $category
            ->setLabel('Calendriers')
            ->setSlug(Category::CALENDARS)
        ;
        $manager->persist($category);

        $product = new Product;
        $product
            ->setName('Grand format cartonné (55 X 43 cm)')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('20 exemplaires')
            ->setPrice(227)
        ;
        $manager->persist($option);
        
        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('50 exemplaires')
            ->setPrice(317)
        ;
        $manager->persist($option);
        
        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('100 exemplaires')
            ->setPrice(373)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('250 exemplaires')
            ->setPrice(590)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('500 exemplaires')
            ->setPrice(990)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('1000 exemplaires')
            ->setPrice(1428)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('2500 exemplaires')
            ->setPrice(2452)
        ;
        $manager->persist($option);

        $product = new Product;
        $product
            ->setName('Format intermédiaire (29,7 X 42 cm) A3')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('50 exemplaires')
            ->setPrice(441)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('100 exemplaires')
            ->setPrice(523)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('250 exemplaires')
            ->setPrice(849)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('500 exemplaires')
            ->setPrice(1000)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('1000 exemplaires')
            ->setPrice(1428)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('2500 exemplaires')
            ->setPrice(2452)
        ;
        $manager->persist($option);

        $product = new Product;
        $product
            ->setName('Petit format (29,7 X 21 cm) A4')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('50 exemplaires')
            ->setPrice(360)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('100 exemplaires')
            ->setPrice(402)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('250 exemplaires')
            ->setPrice(664)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('500 exemplaires')
            ->setPrice(905)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('1000 exemplaires')
            ->setPrice(1218)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('2500 exemplaires')
            ->setPrice(1920)
        ;
        $manager->persist($option);

        $product = new Product;
        $product
            ->setName('Grand format cartonné à thème personnalisable (55 X 43 cm)')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('20 exemplaires')
            ->setPrice(227)
        ;
        $manager->persist($option);
        
        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('50 exemplaires')
            ->setPrice(317)
        ;
        $manager->persist($option);
        
        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('100 exemplaires')
            ->setPrice(373)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('250 exemplaires')
            ->setPrice(590)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('500 exemplaires')
            ->setPrice(990)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('1000 exemplaires')
            ->setPrice(1585)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('1000 exemplaires')
            ->setPrice(1428)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('2500 exemplaires')
            ->setPrice(2452)
        ;
        $manager->persist($option);

        $product = new Product;
        $product
            ->setName('Format intermédiaire (29,7 X 42 cm) A3 à thème personnalisable')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('50 exemplaires')
            ->setPrice(441)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('100 exemplaires')
            ->setPrice(523)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('250 exemplaires')
            ->setPrice(849)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('500 exemplaires')
            ->setPrice(1000)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('1000 exemplaires')
            ->setPrice(1428)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('2500 exemplaires')
            ->setPrice(2452)
        ;
        $manager->persist($option);

        $product = new Product;
        $product
            ->setName('Petit format (29,7 X 21 cm) A4 à thème personnalisable')
            ->setCategory($category)
        ;
        $manager->persist($product);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('50 exemplaires')
            ->setPrice(360)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('100 exemplaires')
            ->setPrice(402)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('250 exemplaires')
            ->setPrice(664)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('500 exemplaires')
            ->setPrice(905)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('1000 exemplaires')
            ->setPrice(1218)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('2500 exemplaires')
            ->setPrice(1920)
        ;
        $manager->persist($option);
        
        $manager->flush();
    }
}
