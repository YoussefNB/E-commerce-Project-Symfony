<?php

namespace App\Repository;

use App\Entity\ComicBookImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ComicBookImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComicBookImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComicBookImage[]    findAll()
 * @method ComicBookImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComicBookImageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ComicBookImage::class);
    }

    // /**
    //  * @return ComicBookImage[] Returns an array of ComicBookImage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ComicBookImage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
