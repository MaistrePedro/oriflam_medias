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
                    [
                        'name'        => 'Taille A5 (148 x 215 mm) / Taille personnalisée',
                        'cost'        => 4,
                        'description' => 'Ensemble d\'organisateur de cahier en simili cuir, livre de planificateur personnalisé, cahier d\'unité centrale personnalisé A5 avec poche',
                        'features'    => [
                            'Matériel'                     => 'Housse en cuir Thermol Pu + logo en relief / estampage à chaud',
                            'Impression intérieure'        => 'Impression papier 80 grammes, accepter la conception sur mesure, reliure parfaite',
                            'OEM / ODM'                    => 'Disponible sur la couleur de couverture, le logo, la conception de page intérieure et l\'emballage',
                            'Informations complémentaires' => '100 pièces minimum'
                        ],
                        'options' => [
                            [
                                'label' => '100 exemplaires',
                                'price' => 755.13
                            ],
                            [
                                'label' => '200 exemplaires',
                                'price' => 1324.54
                            ],
                            [
                                'label' => '300 exemplaires',
                                'price' => 2025.87
                            ],
                            [
                                'label' => '400 exemplaires',
                                'price' => 2684.45
                            ],
                            [
                                'label' => '500 exemplaires',
                                'price' => 3298.08
                            ],
                            [
                                'label' => '600 exemplaires',
                                'price' => 3768.39
                            ],
                            [
                                'label' => '700 exemplaires',
                                'price' => 4394.88
                            ],
                            [
                                'label' => '800 exemplaires',
                                'price' => 4778.11
                            ],
                            [
                                'label' => '900 exemplaires',
                                'price' => 5316.84
                            ],
                            [
                                'label' => '1000 exemplaires',
                                'price' => 5711.25
                            ],
                        ]
                    ]
                ]
            ],
            [
                'label'    => 'Agendas',
                'slug'     => Category::AGENDAS,
                'products' => [
                    [
                        'name'        => 'Format A5 / Format personnalisé',
                        'cost'        => 5,
                        'description' => 'Calendrier hebdomadaire clair',
                        'features'    => [
                            'Matériel'              => 'Couverture rigide Thermol Pu + Logo de gaufrage / estampage à chaud + Bande élastique',
                            'Impression intérieure' => 'Impression papier 80 grammes, reliure parfaite',
                            'OEM / ODM'             => 'Disponible sur la couleur de couverture, le logo, la conception de page intérieure et l\'emballage',
                        ],
                        'options' => [
                            [
                                'label'  => 'Format 1 - 100 exemplaires',
                                'format' => Options::FORMAT1,
                                'price' => 796.10
                            ],
                            [
                                'label'  => 'Format 1 - 200 exemplaires',
                                'format' => Options::FORMAT1,
                                'price' => 1315.22
                            ],
                            [
                                'label'  => 'Format 1 - 300 exemplaires',
                                'format' => Options::FORMAT1,
                                'price' => 1965.10
                            ],
                            [
                                'label'  => 'Format 1 - 400 exemplaires',
                                'format' => Options::FORMAT1,
                                'price' => 2546.36
                            ],
                            [
                                'label'  => 'Format 1 - 500 exemplaires',
                                'format' => Options::FORMAT1,
                                'price' => 3054.95
                            ],
                            [
                                'label'  => 'Format 1 - 600 exemplaires',
                                'format' => Options::FORMAT1,
                                'price' => 3492.67
                            ],
                            [
                                'label'  => 'Format 1 - 700 exemplaires',
                                'format' => Options::FORMAT1,
                                'price' => 3757.17
                            ],
                            [
                                'label'  => 'Format 1 - 800 exemplaires',
                                'format' => Options::FORMAT1,
                                'price' => 4150.24
                            ],
                            [
                                'label'  => 'Format 1 - 900 exemplaires',
                                'format' => Options::FORMAT1,
                                'price' => 4371.26
                            ],
                            [
                                'label'  => 'Format 2 - 100 exemplaires',
                                'format' => Options::FORMAT2,
                                'price' => 796.10
                            ],
                            [
                                'label'  => 'Format 2 - 200 exemplaires',
                                'format' => Options::FORMAT2,
                                'price' => 1315.22
                            ],
                            [
                                'label'  => 'Format 2 - 300 exemplaires',
                                'format' => Options::FORMAT2,
                                'price' => 1965.10
                            ],
                            [
                                'label'  => 'Format 2 - 400 exemplaires',
                                'format' => Options::FORMAT2,
                                'price' => 2546.36
                            ],
                            [
                                'label'  => 'Format 2 - 500 exemplaires',
                                'format' => Options::FORMAT2,
                                'price' => 3054.95
                            ],
                            [
                                'label'  => 'Format 2 - 600 exemplaires',
                                'format' => Options::FORMAT2,
                                'price' => 3492.67
                            ],
                            [
                                'label'  => 'Format 2 - 700 exemplaires',
                                'format' => Options::FORMAT2,
                                'price' => 3757.17
                            ],
                            [
                                'label'  => 'Format 2 - 800 exemplaires',
                                'format' => Options::FORMAT2,
                                'price' => 4150.24
                            ],
                            [
                                'label'  => 'Format 2 - 900 exemplaires',
                                'format' => Options::FORMAT2,
                                'price' => 4371.26
                            ],
                            [
                                'label'  => 'Format 3 - 100 exemplaires',
                                'format' => Options::FORMAT3,
                                'price' => 796.10
                            ],
                            [
                                'label'  => 'Format 3 - 200 exemplaires',
                                'format' => Options::FORMAT3,
                                'price' => 1315.22
                            ],
                            [
                                'label'  => 'Format 3 - 300 exemplaires',
                                'format' => Options::FORMAT3,
                                'price' => 1965.10
                            ],
                            [
                                'label'  => 'Format 3 - 400 exemplaires',
                                'format' => Options::FORMAT3,
                                'price' => 2546.36
                            ],
                            [
                                'label'  => 'Format 3 - 500 exemplaires',
                                'format' => Options::FORMAT3,
                                'price' => 3054.95
                            ],
                            [
                                'label'  => 'Format 3 - 600 exemplaires',
                                'format' => Options::FORMAT3,
                                'price' => 3492.67
                            ],
                            [
                                'label'  => 'Format 3 - 700 exemplaires',
                                'format' => Options::FORMAT3,
                                'price' => 3757.17
                            ],
                            [
                                'label'  => 'Format 3 - 800 exemplaires',
                                'format' => Options::FORMAT3,
                                'price' => 4150.24
                            ],
                            [
                                'label'  => 'Format 3 - 900 exemplaires',
                                'format' => Options::FORMAT3,
                                'price' => 4371.26
                            ],
                            [
                                'label'  => 'Format 4 - 100 exemplaires',
                                'format' => Options::FORMAT4,
                                'price' => 796.10
                            ],
                            [
                                'label'  => 'Format 4 - 200 exemplaires',
                                'format' => Options::FORMAT4,
                                'price' => 1315.22
                            ],
                            [
                                'label'  => 'Format 4 - 300 exemplaires',
                                'format' => Options::FORMAT4,
                                'price' => 1965.10
                            ],
                            [
                                'label'  => 'Format 4 - 400 exemplaires',
                                'format' => Options::FORMAT4,
                                'price' => 2546.36
                            ],
                            [
                                'label'  => 'Format 4 - 500 exemplaires',
                                'format' => Options::FORMAT4,
                                'price' => 3054.95
                            ],
                            [
                                'label'  => 'Format 4 - 600 exemplaires',
                                'format' => Options::FORMAT4,
                                'price' => 3492.67
                            ],
                            [
                                'label'  => 'Format 4 - 700 exemplaires',
                                'format' => Options::FORMAT4,
                                'price' => 3757.17
                            ],
                            [
                                'label'  => 'Format 4 - 800 exemplaires',
                                'format' => Options::FORMAT4,
                                'price' => 4150.24
                            ],
                            [
                                'label'  => 'Format 4 - 900 exemplaires',
                                'format' => Options::FORMAT4,
                                'price' => 4371.26
                            ],
                        ]
                    ]
                ]
            ]
        ];
        $categoryRepository = $manager->getRepository(Category::class);
        $productRepository = $manager->getRepository(Product::class);
        $agendasCat = $categoryRepository->findOneBy(['slug' => Category::AGENDAS]);
        $notebooksCat = $categoryRepository->findOneBy(['slug' => Category::NOTEBOOKS]);
        $objects = [];
        if ($agendasCat) {
            $agendas = $productRepository->findBy(['category' => $agendasCat]);
            foreach ($agendas as $agenda) {
                \array_push($objects, $agenda);
            }
            $manager->remove($agendasCat);
        }
        if ($notebooksCat) {
            $notebooks = $productRepository->findBy(['category' => $notebooksCat]);
            foreach ($notebooks as $notebook) {
                \array_push($objects, $notebook);
            }
            $manager->remove($notebooksCat);
        }
        foreach ($objects as $object) {
            /**
             * @var Product $object
             */
            $manager->remove($object);
        }
        $manager->flush();
        foreach ($datas as $cat) {
            $category = new Category;
            $category->setLabel($cat['label']);
            $category->setSlug($cat['slug']);
            $manager->persist($category);
            foreach ($cat['products'] as $prod) {
                $product = new Product;
                /** @var array $features */
                $features = [];
                foreach ($prod['features'] as $type => $feat) {
                    $features[$type] = $feat;
                }
                $product
                    ->setName($prod['name'])
                    ->setCategory($category)
                    ->setFeatures($features);
                if (array_key_exists('description', $prod)) {
                    $product->setDescription($prod['description']);
                }
                $manager->persist($product);
                if (array_key_exists('options', $prod)) {
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

    public static function getGroups()
    {
        return ['products1'];
    }
}
