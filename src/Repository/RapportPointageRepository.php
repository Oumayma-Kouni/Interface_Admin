<?php

namespace App\Repository;

use App\Entity\RapportPointage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RapportPointage|null find($id, $lockMode = null, $lockVersion = null)
 * @method RapportPointage|null findOneBy(array $criteria, array $orderBy = null)
 * @method RapportPointage[]    findAll()
 * @method RapportPointage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RapportPointageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RapportPointage::class);
    }

    // /**
    //  * @return RapportPointage[] Returns an array of RapportPointage objects
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
    public function findOneBySomeField($value): ?RapportPointage
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
