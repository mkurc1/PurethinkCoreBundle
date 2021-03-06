<?php

namespace Purethink\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\SoftDeleteable;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Sonata\ClassificationBundle\Entity\BaseCategory;

/**
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Purethink\CoreBundle\Entity\Repository\CategoryRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
class Category extends BaseCategory implements SoftDeleteable
{
    use SoftDeleteableEntity;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}