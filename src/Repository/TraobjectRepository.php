<?php


namespace App\Repository;

use App\Entity\Category;
use App\Entity\State;
use App\Entity\Traobject;
use Doctrine\ORM\EntityRepository;


class TraobjectRepository extends EntityRepository
{
    public function findLastTraobjectByState(State $state, int $limit): array
    {
        $qb = $this->createQueryBuilder('t');

        $qb = $qb->select('t', 'c', 's')
            ->innerJoin('t.category', 'c')
            ->innerJoin('t.state', 's')
            ->where($qb->expr()->eq('s.id', ':state'))
            ->orderBy('t.createdAt', 'DESC');


        return $qb->setParameter(':state', $state->getId())
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
    public function findTraobjectByState(State $state): array
    {
        $qb = $this->createQueryBuilder('t');

        $qb = $qb->select('t', 'c', 's')
            ->innerJoin('t.category', 'c')
            ->innerJoin('t.state', 's')
            ->where($qb->expr()->eq('s.id', ':state'))
            ->orderBy('t.createdAt', 'DESC');


        return $qb->setParameter(':state', $state->getId())
            ->getQuery()
            ->getResult();
    }

    public function findTraobjectByCategory(Category $category) : array
    {
        $qb = $this ->createQueryBuilder('t');

        $qb = $qb->select('t', 'c')
            ->innerJoin('t.category', 'c')
            ->where($qb->expr()->eq('t.category', ':category'))
            ->orderBy('t.createdAt', 'DESC');

        return $qb ->setParameter(':category', $category->getId())
            ->getQuery()
            ->getResult();


    }
}