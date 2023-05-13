<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Item>
 *
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    public function save(Item $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Item $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Item[] Returns an array of Item objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField(string $search = null)
//    {
//         $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $search)
//            ->getQuery()
//            ->getOneOrNullResult();
//    }

   public function findItems(string $query = null): array
   {
    $results = $this->createQueryBuilder('inventorius')
        ->select('i')
        ->from(Item::class,'i')
        ->where('i.title LIKE :search OR i.id LIKE :search')
        ->setParameter(':search', "%$query%")
        ->getQuery()
        ->getResult();

    return $results;
   }

   public function findItem(string $query = null, $constraint): array
   {

    $results = $this->createQueryBuilder('inventorius')
        ->select('i')
        ->from(Item::class,'i')
        ->where("i.$constraint LIKE :search")
        ->setParameters(array(":search" => "%$query%"))
        // ->setParameter(':search', "%$query%")
        ->getQuery()
        ->getResult();

    return $results;
   }

}
