<?php

namespace FlickrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FlickrController extends Controller
{

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('FlickrBundle:Flickr:index.html.twig');
    }

    /**
     * @Route("/search/{tag}", defaults={"tag" = null})
     */
    public function searchAction($tag)
    {
        $instgramSearvices = $this->get('flickr.search');
        $result = $instgramSearvices->search($tag);
//        return [
//          'result' => $result,
//            'title' => 'Search my boobs'
//        ];
        return $this->render('FlickrBundle:Flickr:search.html.twig', array(
            'results' => $result,
            'title' => 'Search my boobs',
        ));
    }

}
