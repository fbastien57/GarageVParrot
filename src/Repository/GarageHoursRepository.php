<?php

namespace App\Repository;

use App\Entity\GarageHours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GarageHours>
 *
 * @method GarageHours|null find($id, $lockMode = null, $lockVersion = null)
 * @method GarageHours|null findOneBy(array $criteria, array $orderBy = null)
 * @method GarageHours[]    findAll()
 * @method GarageHours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GarageHoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GarageHours::class);
    }

//    /**
//     * @return GarageHours[] Returns an array of GarageHours objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GarageHours
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
