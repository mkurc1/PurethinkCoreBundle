<?php

namespace Purethink\CoreBundle\Entity;

use Sonata\UserBundle\Entity\BaseGroup as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_group")
 */
class Group extends BaseGroup
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}