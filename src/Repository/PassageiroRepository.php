<?php

namespace App\Repository;

use App\Entity\Passageiro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Passageiro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Passageiro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Passageiro[]    findAll()
 * @method Passageiro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PassageiroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Passageiro::class);
    }

    // /**
    //  * @return Passageiro[] Returns an array of Passageiro objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Passageiro
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
