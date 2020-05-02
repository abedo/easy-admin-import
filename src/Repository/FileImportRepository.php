<?php

namespace App\Repository;

use App\Entity\FileImport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FileImport|null find($id, $lockMode = null, $lockVersion = null)
 * @method FileImport|null findOneBy(array $criteria, array $orderBy = null)
 * @method FileImport[]    findAll()
 * @method FileImport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FileImportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FileImport::class);
    }

    // /**
    //  * @return FileImport[] Returns an array of FileImport objects
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
    public function findOneBySomeField($value): ?FileImport
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
