<?php

namespace Purethink\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\SoftDeleteable;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Sonata\ClassificationBundle\Entity\BaseTag;

/**
 * @ORM\Table(name="cms_tag")
 * @ORM\Entity()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
class Tag extends BaseTag implements SoftDeleteable
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

    public function __construct()
    {
        $this->enabled = true;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}