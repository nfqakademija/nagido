<?php

namespace App\Repository;

use App\Entity\Document;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Document|null find($id, $lockMode = null, $lockVersion = null)
 * @method Document|null findOneBy(array $criteria, array $orderBy = null)
 * @method Document[]    findAll()
 * @method Document[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Document::class);
    }

    /**
     * @param $value
     * @param $id
     * @return mixed
     */
    public function search($value, $id)
    {
        return $this->createQueryBuilder("document")
            ->andWhere('document.documentName LIKE :id')
            ->andWhere('document.user = :user')
            ->setParameter('id', "%".$value."%")
            ->setParameter('user', $id)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function reminderDates($id)
    {
        return $this->createQueryBuilder("document")
            ->andWhere('document.documentReminder IS NOT NULL AND e.user = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
            ;
    }

//    /**
//     * @return Document[] Returns an array of Document objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Document
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
