<?php

namespace App\Repository;

use App\Entity\RentEquipments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RentEquipments|null find($id, $lockMode = null, $lockVersion = null)
 * @method RentEquipments|null findOneBy(array $criteria, array $orderBy = null)
 * @method RentEquipments[]    findAll()
 * @method RentEquipments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RentEquipmentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RentEquipments::class);
    }

    // /**
    //  * @return RentEquipments[] Returns an array of RentEquipments objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RentEquipments
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
