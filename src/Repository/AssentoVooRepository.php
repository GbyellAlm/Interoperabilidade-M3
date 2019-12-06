<?php

namespace App\Repository;

use App\Entity\AssentoVoo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AssentoVoo|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssentoVoo|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssentoVoo[]    findAll()
 * @method AssentoVoo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssentoVooRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssentoVoo::class);
    }

    // /**
    //  * @return AssentoVoo[] Returns an array of AssentoVoo objects
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
    public function findOneBySomeField($value): ?AssentoVoo
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
