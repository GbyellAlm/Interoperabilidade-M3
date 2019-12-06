<?php

namespace App\Repository;

use App\Entity\Assento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Assento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Assento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Assento[]    findAll()
 * @method Assento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Assento::class);
    }

    // /**
    //  * @return Assento[] Returns an array of Assento objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Assento
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
