<?php

namespace Rav\SomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RavSomeBundle:Default:index.html.twig', array(
                                    'name' => $this->container->get('rav_config.partner')->getDomain()
                                )
                            );
    }
}
