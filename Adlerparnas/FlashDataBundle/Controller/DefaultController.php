<?php

namespace Adlerparnas\FlashDataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        $flashdata = $this->get('adlerparnas.flashdata');
        return $this->render('AdlerparnasFlashDataBundle:Default:index.html.twig', array('name' => $name));
    }
}
