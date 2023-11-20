<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Cars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cars>
 *
 * @method Cars|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cars|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cars[]    findAll()
 * @method Cars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cars::class);
    }
    
   
    public function findSearch(SearchData $search): array
    {

        $query = $this
            ->createQueryBuilder("c");

            if(!empty($search->minPrice)){
                $query = $query
                 ->andWhere("c.price >= :minPrice")
                 ->setParameter("minPrice", $search->minPrice);
            }

            if(!empty($search->maxPrice)){
                $query = $query
                 ->andWhere("c.price <= :maxPrice")
                 ->setParameter("maxPrice", $search->maxPrice);
            }

            if(!empty($search->minKilometers)){
                $query = $query
                 ->andWhere("c.kilometers >= :minKilometers")
                 ->setParameter("minKilometers", $search->minKilometers);
            }

            if(!empty($search->maxKilometers)){
                $query = $query
                 ->andWhere("c.kilometers <= :maxKilometers")
                 ->setParameter("maxKilometers", $search->maxKilometers);
            }

            if(!empty($search->minYear)){
                $query = $query
                 ->andWhere("c.year >= :minYear")
                 ->setParameter("minYear", $search->minYear);
            }

            if(!empty($search->maxYear)){
                $query = $query
                 ->andWhere("c.year <= :maxYear")
                 ->setParameter("maxYear", $search->maxYear);
            }
       
            return $query->getQuery()->getResult();
    }

//    
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cars
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
