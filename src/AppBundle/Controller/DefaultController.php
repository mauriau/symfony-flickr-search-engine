<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/gallery", name="gallery")
     * @Template("AppBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        $flickService = $this->get('flickr.search');
        $result = $flickService->search();

        return ['images'=> $result];
    }

    /**
     * @Route("/mywall", name="mywall")
     * @Template("AppBundle:Content:galleryperso.html.twig")
     */
    public function myWallAction()
    {

    }


}
