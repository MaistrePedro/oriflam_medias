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
        $datas = [
            [
                'label' => 'Note Book',
                'slug' => Category::NOTEBOOKS,
                'products' => [
                    'name' => 'Taille A5 (148 x 215 mm) / Taille personnalisée',
                    'cost' => 4,
                    'description' => 'Ensemble d\'organisateur de cahier en simili cuir, livre de planificateur personnalisé, cahier d\'unité centrale personnalisé A5 avec poche',
                    'features' => [
                        'Matériel' => 'House en cuir Thermol Pu + logo en relief / estampage à chaud',
                        'Impression intérieure' => 'Impression papier 80 grammes, accepter la conception sur mesure, reliure parfaite',
                        'OEM / ODM' => 'Disponible sur la couleur de couverture, le logo, la conception de page intérieure et l\'emballage',
                        'Informations complémentaires' => '100 pièces minimum'
                    ]
                ]
            ],
            [
                'label' => 'Agendas',
                'slug' => Category::AGENDAS,
                'products' => [
                    'name' => 'Format A5 / Format personnalisé',
                    'cost' => 5,
                    'description' => 'Calendrier hebdomadaire clair',
                    'features' => [
                        'Matériel' => 'Courverture rigide Thermol Pu + Logo de gaufrage / estampage à chaud + Bande élastique',
                        'Impression intérieure' => 'Impression papier 80 grammes, reliure parfaite',
                        'OEM / ODM' => 'Disponible sur la couleur de couverture, le logo, la conception de page intérieure et l\'emballage',
                    ],
                    'options' => [
                        ''
                    ]
                ]
            ]
        ];
        $agendas = new Category;
        $agendas
            ->setLabel('Agendas')
            ->setSlug(Category::AGENDAS);
        $manager->persist($agendas);

        $notebook = new Category;
        $notebook
            ->setLabel('Notebooks')
            ->setSlug(Category::NOTEBOOKS);
        $manager->persist($notebook);

        $product = new Product;
        $product
            ->setName('Format A5 (Noir) (210 X 148 mm)')
            ->setCategory($agendas);
        $manager->persist($product);

        $product = new Product;
        $product
            ->setName('Format A5 (Marron) (210 X 148 mm)')
            ->setCategory($agendas);
        $manager->persist($product);

        $product = new Product;
        $product
            ->setName('Format A5 (210 X 148 mm)')
            ->setCategory($notebook);
        $manager->persist($product);

        $manager->flush();
    }
}
