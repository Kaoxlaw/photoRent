<?php

namespace App\Repository;

use App\Entity\SellEquipments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SellEquipments|null find($id, $lockMode = null, $lockVersion = null)
 * @method SellEquipments|null findOneBy(array $criteria, array $orderBy = null)
 * @method SellEquipments[]    findAll()
 * @method SellEquipments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SellEquipmentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SellEquipments::class);
    }

    // /**
    //  * @return SellEquipments[] Returns an array of SellEquipments objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SellEquipments
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
