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
            ->setLabel('Sous Main A2 - 20')
            ->setPrice(227)
        ;
        $manager->persist($option);
        
        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Sous Main A2 - 50')
            ->setPrice(317)
        ;
        $manager->persist($option);
        
        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Sous Main A2 - 100')
            ->setPrice(373)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Sous Main A2 - 250')
            ->setPrice(590)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Sous Main A2 - 500')
            ->setPrice(990)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Sous Main A2 - 1000')
            ->setPrice(1585)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 1000')
            ->setPrice(1428)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 2500')
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
            ->setLabel('Calendrier de banque A3 - 50')
            ->setPrice(441)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 100')
            ->setPrice(523)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 250')
            ->setPrice(849)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 500')
            ->setPrice(1000)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 1000')
            ->setPrice(1428)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 2500')
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
            ->setLabel('Calendrier de banque A4 - 50')
            ->setPrice(360)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A4 - 100')
            ->setPrice(402)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A4 - 250')
            ->setPrice(664)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A4 - 500')
            ->setPrice(905)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A4 - 1000')
            ->setPrice(1218)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A4 - 2500')
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
            ->setLabel('Sous Main A2 - 20')
            ->setPrice(227)
        ;
        $manager->persist($option);
        
        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Sous Main A2 - 50')
            ->setPrice(317)
        ;
        $manager->persist($option);
        
        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Sous Main A2 - 100')
            ->setPrice(373)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Sous Main A2 - 250')
            ->setPrice(590)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Sous Main A2 - 500')
            ->setPrice(990)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Sous Main A2 - 1000')
            ->setPrice(1585)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 1000')
            ->setPrice(1428)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 2500')
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
            ->setLabel('Calendrier de banque A3 - 50')
            ->setPrice(441)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 100')
            ->setPrice(523)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 250')
            ->setPrice(849)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 500')
            ->setPrice(1000)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 1000')
            ->setPrice(1428)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A3 - 2500')
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
            ->setLabel('Calendrier de banque A4 - 50')
            ->setPrice(360)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A4 - 100')
            ->setPrice(402)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A4 - 250')
            ->setPrice(664)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A4 - 500')
            ->setPrice(905)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A4 - 1000')
            ->setPrice(1218)
        ;
        $manager->persist($option);

        $option = new Options;
        $option
            ->setProduct($product)
            ->setLabel('Calendrier de banque A4 - 2500')
            ->setPrice(1920)
        ;
        $manager->persist($option);
        
        $manager->flush();
    }
}
