<?php

namespace Dojo\DojoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('DojoBundle:Default:index.html.twig', array('name' => $name));
    }
}
