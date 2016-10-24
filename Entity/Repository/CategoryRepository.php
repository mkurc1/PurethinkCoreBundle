<?php

namespace Purethink\CoreBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    public function findActiveCategoryBySlug(string $slug)
    {
        return $this->createQueryBuilder('c')
            ->where('c.slug = :slug')
            ->setParameter('slug', $slug)
            ->andWhere('c.enabled = true')
            ->getQuery()
            ->getOneOrNullResult();
    }
}