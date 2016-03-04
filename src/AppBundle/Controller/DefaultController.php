<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

    /**
     * @Route("/gallery", name="gallery")
     * @Template()
     */
    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if (is_a($user, 'UserBundle\Entity\User')) {
            $flickService = $this->get('flickr.search');
            $result = $flickService->search();
            return ['images' => $result];
        } else {
            throw $this->createAccessDeniedException('You can\'t acces this part without being login');
        }
    }

    /**
     * @Route("/mywall", name="mywall")
     * @Template("AppBundle:Content:galleryperso.html.twig")
     */
    public function myWallAction()
    {
        return array('id' => 1);
    }

    public function createFavoris()
    {
        $user = $this->getDoctrine()
                ->getRepository('UserBundle:User')
                ->find(44);
        $test = $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle:Bookmark');
        $result = $test->findAllBookmarkForUser($user);
    }

    public function showFavoris($id)
    {
        $session = $this->get('session');
        $session->start();
        $user_id = $session->getId();
        $user = $this->getDoctrine()
                ->getRepository('UserBundle:User')
                ->find(44);
        $test = $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle:Bookmark');
        $result = $test->findAllBookmarkForUser($user);
    }

}
