<?php

namespace App\Repository;

use App\Entity\Aeronave;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Aeronave|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aeronave|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aeronave[]    findAll()
 * @method Aeronave[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AeronaveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aeronave::class);
    }

    // /**
    //  * @return Aeronave[] Returns an array of Aeronave objects
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
    public function findOneBySomeField($value): ?Aeronave
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
