<?php

namespace Rav\BlockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlockController extends Controller
{
    public function displayAction($name)
    {
        return $this->render('RavBlockBundle:Block:display.html.twig', [
            'name' => $name
        ]);
    }
} 