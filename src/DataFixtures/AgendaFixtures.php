<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AgendaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $agendas = new Category;
        $agendas
            ->setLabel('Agendas')
            ->setSlug(Category::AGENDAS)
        ;
        $manager->persist($agendas);

        $notebook = new Category;
        $notebook
            ->setLabel('Notebooks')
            ->setSlug(Category::NOTEBOOKS)
        ;
        $manager->persist($notebook);

        $product = new Product;
        $product
            ->setName('Format A5 (Noir) (210 X 148 mm)')
            ->setCategory($agendas)
        ;
        $manager->persist($product);

        $product = new Product;
        $product
            ->setName('Format A5 (Marron) (210 X 148 mm)')
            ->setCategory($agendas)
        ;
        $manager->persist($product);

        $product = new Product;
        $product
            ->setName('Format A5 (210 X 148 mm)')
            ->setCategory($notebook)
        ;
        $manager->persist($product);

        $manager->flush();
    }
}
