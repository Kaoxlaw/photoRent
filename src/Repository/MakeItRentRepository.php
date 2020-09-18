<?php

namespace App\Repository;

use App\Entity\MakeItRent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MakeItRent|null find($id, $lockMode = null, $lockVersion = null)
 * @method MakeItRent|null findOneBy(array $criteria, array $orderBy = null)
 * @method MakeItRent[]    findAll()
 * @method MakeItRent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MakeItRentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MakeItRent::class);
    }

    // /**
    //  * @return MakeItRent[] Returns an array of MakeItRent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MakeItRent
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
