<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogController extends Controller
{
    /**
     * @Route("/blog/{page}", requirements={"page" = "\d+"}, defaults={"page" = 1})
     * @Template()
     */
    public function indexAction($page)
    {
        return $this->render('BloggerBlogBundle:Blog:index.html.twig', array('page' => $page));
//      throw $this->createNotFoundException('Il prodotto non esiste');
    }
    
    /**
     * @Route("/blog/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        return $this->render('BloggerBlogBundle:Blog:singlePost.html.twig', array('slug' => $slug));
//      throw $this->createNotFoundException('Il prodotto non esiste');
    }
}
