<?php

namespace App\Repository;

use App\Entity\Managers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Managers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Managers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Managers[]    findAll()
 * @method Managers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GestionnairesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Managers::class);
    }

    // /**
    //  * @return Managers[] Returns an array of Managers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Managers
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
