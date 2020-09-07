<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findLike(string $string, $category)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.name LIKE :string')
            ->andWhere('p.category = :category')
            ->setParameter('string', "%$string%")
            ->setParameter('category', $category)
            ->getQuery()
            ->getResult();
    }

    public function findOthers(string $string, $category)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.name NOT LIKE :string')
            ->andWhere('p.category = :category')
            ->setParameter('string', "%$string%")
            ->setParameter('category', $category)
            ->getQuery()
            ->getResult();
    }

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
