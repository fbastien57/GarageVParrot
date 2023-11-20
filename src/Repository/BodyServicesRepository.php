<?php

namespace App\Repository;

use App\Entity\BodyServices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BodyServices>
 *
 * @method BodyServices|null find($id, $lockMode = null, $lockVersion = null)
 * @method BodyServices|null findOneBy(array $criteria, array $orderBy = null)
 * @method BodyServices[]    findAll()
 * @method BodyServices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BodyServicesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BodyServices::class);
    }

//    /**
//     * @return BodyServices[] Returns an array of BodyServices objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BodyServices
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
