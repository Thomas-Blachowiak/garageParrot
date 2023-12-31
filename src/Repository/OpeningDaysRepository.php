<?php

namespace App\Repository;

use App\Entity\OpeningDays;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OpeningDays>
 *
 * @method OpeningDays|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpeningDays|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpeningDays[]    findAll()
 * @method OpeningDays[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpeningDaysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpeningDays::class);
    }

    public function save(OpeningDays $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OpeningDays $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
