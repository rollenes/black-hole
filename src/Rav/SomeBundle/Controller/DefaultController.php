<?php

namespace Rav\SomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RavSomeBundle:Default:index.html.twig', array('name' => $name));
    }
}
