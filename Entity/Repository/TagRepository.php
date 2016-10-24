<?php

namespace Purethink\CoreBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository
{
    public function findActiveTagBySlug(string $slug)
    {
        return $this->createQueryBuilder('t')
            ->where('t.slug = :slug')
            ->setParameter('slug', $slug)
            ->andWhere('t.enabled = true')
            ->getQuery()
            ->getOneOrNullResult();
    }
}