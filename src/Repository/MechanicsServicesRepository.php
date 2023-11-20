<?php

namespace App\Repository;

use App\Entity\MechanicsServices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MechanicsServices>
 *
 * @method MechanicsServices|null find($id, $lockMode = null, $lockVersion = null)
 * @method MechanicsServices|null findOneBy(array $criteria, array $orderBy = null)
 * @method MechanicsServices[]    findAll()
 * @method MechanicsServices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MechanicsServicesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MechanicsServices::class);
    }

//    /**
//     * @return MechanicsServices[] Returns an array of MechanicsServices objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MechanicsServices
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
