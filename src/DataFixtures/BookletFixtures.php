<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Options;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookletFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categoryRepository = $manager->getRepository(Category::class);
        $productRepository = $manager->getRepository(Product::class);
        $category = $categoryRepository->findOneBy(['slug' => Category::BOOKLET]);
        if ($category) {
            $objects = $productRepository->findBy(['category' => $category]);
            foreach ($objects as $object) {
                /**
                 * @var Product $object
                 */
                $manager->remove($object);
            }
            $manager->remove($category);
            $manager->flush();
        }
            $category = new Category;
            $category
                ->setLabel('Brochures')
                ->setSlug(Category::BOOKLET)
            ;
            $manager->persist($category);

        $product = new Product;
        $features = [
            'Support' => '(Best Of) 135 g/m² papier couché',
            'Orientation' => 'Hauteur (Portrait/vertical)',
            'Colorimétrie' => 'CMJN 4/4 (quadri 2 faces)',
            'Propriété papier' => '- Couché brillant',
            'Nombre de page (face)' => '12 pages',
            'Couverture' => 'Sans couverture',
            'Mode de reliure' => 'Agrafage'
        ];
        $product
            ->setCategory($category)
            ->setName('Brochure A5 (14,8 x 21 cm) Livre brochure piquée agrafes avec couverture 12 pages - Quadri')
            ->setFeatures($features);
        $manager->persist($product);

        $option = new Options;
        $option
            ->setLabel('50 exemplaires')
            ->setPrice(95)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('100 exemplaires')
            ->setPrice(110.5)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('200 exemplaires')
            ->setPrice(143)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('300 exemplaires')
            ->setPrice(173)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('400 exemplaires')
            ->setPrice(197)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('500 exemplaires')
            ->setPrice(332)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('1000 exemplaires')
            ->setPrice(375)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('2000 exemplaires')
            ->setPrice(460)
            ->setProduct($product);
        $manager->persist($option);

        $product = new Product;
        $features = [
            'Support' => '(Best Of) 135 g/m² papier couché',
            'Orientation' => 'Hauteur (Portrait/vertical)',
            'Colorimétrie' => 'CMJN 4/4 (quadri 2 faces)',
            'Propriété papier' => '- Couché brillant',
            'Nombre de page (face)' => '24 pages',
            'Couverture' => 'Sans couverture',
            'Mode de reliure' => 'Agrafage'
        ];
        $product
            ->setCategory($category)
            ->setName('Brochure A4 (21 x 29,7) Livre brochure piquée agrafes 24 pages avec couverture pelliculée Quadri');
        $manager->persist($product);

        $option = new Options;
        $option
            ->setLabel('50 exemplaires')
            ->setPrice(204)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('100 exemplaires')
            ->setPrice(276)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('200 exemplaires')
            ->setPrice(423)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('300 exemplaires')
            ->setPrice(540)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('400 exemplaires')
            ->setPrice(613)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('500 exemplaires')
            ->setPrice(760)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('1000 exemplaires')
            ->setPrice(986)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('2000 exemplaires')
            ->setPrice(1340)
            ->setProduct($product);
        $manager->persist($option);

        $manager->flush();
    }

    public static function getGroups()
    {
        return ['products1'];
    }
}
