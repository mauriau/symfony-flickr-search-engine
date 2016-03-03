<?php

namespace FlickrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class FlickrController extends Controller
{

    /**
     * @Template()
     * @Route("/")
     */
    public function indexAction()
    {
        return [
            'title' => 'Recherche Flickr'
        ];
    }

    /**
     * @Template()
     * @param type $tag
     * @Route("/search/{tag}")
     */
    public function searchAction($tag)
    {
        $FlickrServices = $this->get('flickr.search');
        $request = $this->getRequest();
        $result = $FlickrServices->searchByTag($tag);

        if ($request->isXmlHttpRequest()) {
            $response = new Response();
            $response->setContent(json_encode($result));
            return $response;
        }
        return [
            'results' => $result,
            'title' => 'Search my boobs'
        ];
    }

}
