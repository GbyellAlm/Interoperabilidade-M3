<?php

namespace App\Repository;

use App\Entity\Aeroporto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Aeroporto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aeroporto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aeroporto[]    findAll()
 * @method Aeroporto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AeroportoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aeroporto::class);
    }

    // /**
    //  * @return Aeroporto[] Returns an array of Aeroporto objects
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
    public function findOneBySomeField($value): ?Aeroporto
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
