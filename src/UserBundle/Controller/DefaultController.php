<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        if($this->getUser()){
            $url = $this->get('router')->generate('gallery');
        } else {
            $url = $this->get('router')->generate('fos_user_security_login');
        }

        return $this->redirect($url);
    }
}
