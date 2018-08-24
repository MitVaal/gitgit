<?php

namespace BlogDoctrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogDoctrineBundle:Default:authors.html.twig');
    }
}
