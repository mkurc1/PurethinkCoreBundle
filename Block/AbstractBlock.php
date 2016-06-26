<?php

namespace Purethink\CoreBundle\Block;

use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BaseBlockService;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class AbstractBlock extends BaseBlockService
{
    public function __construct($name, EngineInterface $templating)
    {
        parent::__construct($name, $templating);
    }

    /**
     * @param BlockInterface $block
     * @return array|void
     */
    public function getCacheKeys(BlockInterface $block)
    {
        return ['type' => $this->name];
    }

    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['template' => null]);
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        return $this->renderResponse($blockContext->getTemplate(),
            ['settings' => $blockContext->getSettings()], $response)->setTtl(3600);
    }
}
