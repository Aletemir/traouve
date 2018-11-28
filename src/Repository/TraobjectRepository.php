<?php


namespace App\Repository;

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
}