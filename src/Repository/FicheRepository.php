<?php

namespace App\Repository;

use App\Entity\Fiche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fiche|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fiche|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fiche[]    findAll()
 * @method Fiche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fiche::class);
    }
    

    // /**
    //  * @return Fiche[] Returns an array of Fiche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField(): ?Fiche
    {
        $value = $this-> getIndemniteSupplementaires() + $this-> getIndemniteDeTransport() + $this-> getPrime();
        return $this->createQueryBuilder('f')
            ->andWhere('f.Total_IndemnitesSupplementaires = NULL ')
            ->setParameter('NULL', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }*/
    
/*
      /**
     * @return int|mixed|string|float|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    /*
    public function countTotalIndemnitesSupplementaires()
    {
        $queryBuilder = $this->createQueryBuilder('f');
        $queryBuilder->select('SUM(Prime) as value');

        return $queryBuilder->getQuery()->getOneOrNullResult();

    }*/
}
