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
        $datas = [
            [
                'label'    => 'Calendriers',
                'slug'     => Category::CALENDARS,
                'products' => [
                    'name'        => 'A2 (42 x 59,4 cm)',
                    'description' => 'Calendriers annuels 42 x 59,4 cm',
                    'features'    => [
                        'Support'                => '300 g/m² carton offset',
                        'Orientation'            => 'Hauteur (Portrait/vertical)',
                        'Nombre de pages (face)' => '1 page (recto)',
                        'Colorimétrie'           => 'CMJN 4/0 (quadri 1 face)',
                        'Propriété papier'       => '- Couché brillant',
                        'Finition'               => 'Absence de finition'
                    ],
                    'options' => [
                        'label' => '150 exemplaires',
                        'price' => 730
                    ],
                    [
                        'label' => '250 exemplaires',
                        'price' => 900
                    ],
                    [
                        'label' => '500 exemplaires',
                        'price' => 1100
                    ],
                    [
                        'label' => '750 exemplaires',
                        'price' => 1200
                    ],
                    [
                        'label' => '1000 exemplaires',
                        'price' => 1500
                    ],
                    [
                        'label' => '1500 exemplaires',
                        'price' => 1800
                    ],
                    [
                        'label' => '2000 exemplaires',
                        'price' => 2100
                    ],
                ],
                [
                    'name'    => 'A2 (42 x 59,4 cm) personnalisable',
                    'description' => 'Calendriers annuels personnalisables 42 x 59,4 cm',
                    'features'    => [
                        'Support'                => '300 g/m² carton offset',
                        'Orientation'            => 'Hauteur (Portrait/vertical)',
                        'Nombre de pages (face)' => '1 page (recto)',
                        'Colorimétrie'           => 'CMJN 4/0 (quadri 1 face)',
                        'Propriété papier'       => '- Couché brillant',
                        'Finition'               => 'Absence de finition'
                    ],
                    'options' => [
                        'label' => '150 exemplaires',
                        'price' => 730
                    ],
                    [
                        'label' => '250 exemplaires',
                        'price' => 900
                    ],
                    [
                        'label' => '500 exemplaires',
                        'price' => 1100
                    ],
                    [
                        'label' => '750 exemplaires',
                        'price' => 1200
                    ],
                    [
                        'label' => '1000 exemplaires',
                        'price' => 1500
                    ],
                    [
                        'label' => '1500 exemplaires',
                        'price' => 1800
                    ],
                    [
                        'label' => '2000 exemplaires',
                        'price' => 2100
                    ],
                ],
                [
                    'name'    => 'A3 (29,7 x 42 cm)',
                    'features' => [
                        'Support' => '300 g/m² Carton Chromo',
                        'Nombre de page (face)' => '1 page (recto)',
                        'Colorimétrie' => 'CMJN 4/0 (quadri 1 face)',
                        'Orientation' => 'Hauteur (Portrait/vertical)',
                        'Propriété papier' => '- Couché brillant',
                        'Finition' => 'Absence de finition'
                    ],
                    'options' => [
                        'label' => '150 exemplaires',
                        'price' => 370,
                    ],
                    [
                        'label' => '300 exemplaires',
                        'price' => 592,
                    ],
                    [
                        'label' => '500 exemplaires',
                        'price' => 770,
                    ],
                    [
                        'label' => '750 exemplaires',
                        'price' => 1140,
                    ],
                    [
                        'label' => '1000 exemplaires',
                        'price' => 1510,
                    ],
                    [
                        'label' => '1500 exemplaires',
                        'price' => 1880,
                    ],
                    [
                        'label' => '2000 exemplaires',
                        'price' => 2250,
                    ],
                ],

                [
                    'name'    => 'A3 (29,7 x 42 cm) personnalisable',
                    'features' => [
                        'Support' => '300 g/m² Carton Chromo',
                        'Nombre de page (face)' => '1 page (recto)',
                        'Colorimétrie' => 'CMJN 4/0 (quadri 1 face)',
                        'Orientation' => 'Hauteur (Portrait/vertical)',
                        'Propriété papier' => '- Couché brillant',
                        'Finition' => 'Absence de finition'
                    ],
                    'options' => [
                        'label' => '150 exemplaires',
                        'price' => 370,
                    ],
                    [
                        'label' => '300 exemplaires',
                        'price' => 592,
                    ],
                    [
                        'label' => '500 exemplaires',
                        'price' => 770,
                    ],
                    [
                        'label' => '750 exemplaires',
                        'price' => 1140,
                    ],
                    [
                        'label' => '1000 exemplaires',
                        'price' => 1510,
                    ],
                    [
                        'label' => '1500 exemplaires',
                        'price' => 1880,
                    ],
                    [
                        'label' => '2000 exemplaires',
                        'price' => 2250,
                    ],
                ],
                [
                    'name'    => 'A4 (29,7 x 21 cm)',
                    'features' => [
                        'Support' => '450 g/m² Carton Chromo',
                        'Nombre de page (face)' => '1 ou 2 pages',
                        'Orientation' => 'Hauteur (Portrait/vertical)',
                        'Colorimétrie' => 'CMJN 4/0 (quadri 2 face)',
                    ],
                    'options' => [
                        'label' => '100 exemplaires',
                        'price' => 380,
                    ],
                    [
                        'label' => '250 exemplaires',
                        'price' => 684,
                    ],
                    [
                        'label' => '500 exemplaires',
                        'price' => 1090,
                    ],
                    [
                        'label' => '750 exemplaires',
                        'price' => 1400,
                    ],
                    [
                        'label' => '1000 exemplaires',
                        'price' => 1680,
                    ],
                    [
                        'label' => '1500 exemplaires',
                        'price' => 2144,
                    ],
                    [
                        'label' => '2000 exemplaires',
                        'price' => 2400,
                    ],
                    [
                        'label' => '3000 exemplaires',
                        'price' => 2700
                    ]
                ],
                [
                    'name'    => 'A4 (29,7 x 21 cm)',
                    'features' => [
                        'Support' => '450 g/m² Carton Chromo',
                        'Nombre de page (face)' => '1 ou 2 pages',
                        'Orientation' => 'Hauteur (Portrait/vertical)',
                        'Colorimétrie' => 'CMJN 4/0 (quadri 2 face)',
                    ],
                    'options' => [
                        'label' => '100 exemplaires',
                        'price' => 380,
                    ],
                    [
                        'label' => '250 exemplaires',
                        'price' => 684,
                    ],
                    [
                        'label' => '500 exemplaires',
                        'price' => 1090,
                    ],
                    [
                        'label' => '750 exemplaires',
                        'price' => 1400,
                    ],
                    [
                        'label' => '1000 exemplaires',
                        'price' => 1680,
                    ],
                    [
                        'label' => '1500 exemplaires',
                        'price' => 2144,
                    ],
                    [
                        'label' => '2000 exemplaires',
                        'price' => 2400,
                    ],
                    [
                        'label' => '3000 exemplaires',
                        'price' => 2700
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
        $manager->flush();
    }
}
