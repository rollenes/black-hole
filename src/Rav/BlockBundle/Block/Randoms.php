<?php

namespace Rav\BlockBundle\Block;

use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Randoms extends BaseBlockService
{
    /**
     * {@inheritdoc}
     */
    public function configureSettings(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'template' => 'RavBlockBundle:Block:block_randoms.html.twig',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        $randoms = [];

        for ($i = 0; $i< rand(10, 50); $i++) {
            $randoms[] = rand(0, 1000);
        }

        return $this->renderResponse($blockContext->getTemplate(), array(
            'randoms' => $randoms,
            'block_context'  => $blockContext,
            'block'          => $blockContext->getBlock(),
        ), $response);
    }
} 