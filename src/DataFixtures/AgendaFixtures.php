<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Options;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AgendaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $datas = [
            [
                'label'    => 'Note Book',
                'slug'     => Category::NOTEBOOKS,
                'products' => [
                    'name'        => 'Taille A5 (148 x 215 mm) / Taille personnalisée',
                    'cost'        => 4,
                    'description' => 'Ensemble d\'organisateur de cahier en simili cuir, livre de planificateur personnalisé, cahier d\'unité centrale personnalisé A5 avec poche',
                    'features'    => [
                        'Matériel'                     => 'House en cuir Thermol Pu + logo en relief / estampage à chaud',
                        'Impression intérieure'        => 'Impression papier 80 grammes, accepter la conception sur mesure, reliure parfaite',
                        'OEM / ODM'                    => 'Disponible sur la couleur de couverture, le logo, la conception de page intérieure et l\'emballage',
                        'Informations complémentaires' => '100 pièces minimum'
                    ]
                ]
            ],
            [
                'label'    => 'Agendas',
                'slug'     => Category::AGENDAS,
                'products' => [
                    'name'        => 'Format A5 / Format personnalisé',
                    'cost'        => 5,
                    'description' => 'Calendrier hebdomadaire clair',
                    'features'    => [
                        'Matériel'              => 'Courverture rigide Thermol Pu + Logo de gaufrage / estampage à chaud + Bande élastique',
                        'Impression intérieure' => 'Impression papier 80 grammes, reliure parfaite',
                        'OEM / ODM'             => 'Disponible sur la couleur de couverture, le logo, la conception de page intérieure et l\'emballage',
                    ],
                    'options' => [
                        [
                            'label'  => 'Format 1',
                            'format' => Options::FORMAT1
                        ],
                        [
                            'label'  => 'Format 2',
                            'format' => Options::FORMAT2
                        ],
                        [
                            'label'  => 'Format 3',
                            'format' => Options::FORMAT3
                        ],
                        [
                            'label'  => 'Format 4',
                            'format' => Options::FORMAT4
                        ],
                    ]
                ]
            ]
        ];
        foreach ($datas as $cat) {
            $category = new Category;
            $category->setLabel($cat['label']);
            $category->setSlug($cat['slug']);
            $manager->persist($category);
            foreach ($cat['products'] as $prod) {
                $product = new Product;
                /** @var array $features */
                $features = $prod['features'];
                $product
                    ->setName($prod['name'])
                    ->setCategory($category)
                    ->setFeatures($features);
                if ($prod['description']) {
                    $product->setDescription($prod['description']);
                }
                $manager->persist($product);
                if ($prod['options']) {
                    /** @var array $options */
                    $options = $prod['options'];
                    foreach ($options as $opt) {
                        $option = new Options;
                        $option
                            ->setLabel($opt['label'])
                            ->setPrice($opt['price'])
                            ->setProduct($product);
                        $manager->persist($option);
                    }
                }
            }
        }
        $manager->flush();
    }

    public function getGroups()
    {
        return ['products1'];
    }
}
