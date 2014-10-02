<?php

namespace Rav\ConfigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RavConfigBundle:Default:index.html.twig', array('name' => $name));
    }
}
