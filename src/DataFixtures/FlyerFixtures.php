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
        $categoryRepository = $manager->getRepository(Category::class);
        $productRepository = $manager->getRepository(Product::class);
        $category = $categoryRepository->findOneBy(['slug' => Category::FLYER]);
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
            ->setLabel('Flyers')
            ->setSlug(Category::FLYER);
        $manager->persist($category);

        $product = new Product;
        $product
            ->setName('Flyer A6 (10 x 15 cm) 100 g/m² papier couché brillant 1 recto - Quadri')
            ->setCategory($category);
        $manager->persist($product);

        $option = new Options;
        $option
            ->setLabel('100 exemplaires')
            ->setPrice(18)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('250 exemplaires')
            ->setPrice(20)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('500 exemplaires')
            ->setPrice(23)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('1000 exemplaires')
            ->setPrice(27)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('2500 exemplaires')
            ->setPrice(32)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 exemplaires 000')
            ->setPrice(67)
            ->setProduct($product);
        $manager->persist($option);

        $product = new Product;
        $product
            ->setName('Flyer A5 (15 x 15 cm) 135 g/m² papier couché brillant 1 recto - Quadri')
            ->setCategory($category);
        $manager->persist($product);

        $option = new Options;
        $option
            ->setLabel('100 exemplaires')
            ->setPrice(23)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('250 exemplaires')
            ->setPrice(26)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('500 exemplaires')
            ->setPrice(28)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('1000 exemplaires')
            ->setPrice(33)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('2 500 exemplaires')
            ->setPrice(42)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('5 000 exemplaires')
            ->setPrice(60)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 000 exemplaires')
            ->setPrice(120)
            ->setProduct($product);
        $manager->persist($option);

        $product = new Product;
        $product
            ->setName('Flyer A4 (21 x 29,7 cm) 135 g/m² papier couché brillant 1 recto - Quadri')
            ->setCategory($category);
        $manager->persist($product);

        $option = new Options;
        $option
            ->setLabel('100 exemplaires')
            ->setPrice(36)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('250 exemplaires')
            ->setPrice(47)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('500 exemplaires')
            ->setPrice(52)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('1000 exemplaires')
            ->setPrice(64)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('2 500 exemplaires')
            ->setPrice(86)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('5 000 exemplaires')
            ->setPrice(157)
            ->setProduct($product);
        $manager->persist($option);

        $option = new Options;
        $option
            ->setLabel('10 000 exemplaires')
            ->setPrice(288)
            ->setProduct($product);
        $manager->persist($option);

        $manager->flush();
    }

    public static function getGroups()
    {
        return ['products1'];
    }
}
