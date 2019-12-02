<?php

namespace product\productBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('productproductBundle:Default:index.html.twig');
    }
}
