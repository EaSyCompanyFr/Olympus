<?php

namespace Easy\TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EasyTicketBundle:Default:index.html.twig', array('name' => $name));
    }
}