<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Blogger\BlogBundle\Entity;

class BlogController extends Controller
{
    /**
     * @Route("/blog/{page}", requirements={"page" = "\d+"}, defaults={"page" = 1})
     * @Template()
     */
    public function indexAction($page)
    {
        return $this->render('BloggerBlogBundle:Blog:index.html.twig', array('page' => $page));
    }
    
    /**
     * @Route("/blog/nuovo-post")
     * @Template()
     */
    public function createAction()
    {
        $blogPost = new Entity\Blog();
        $blogPost->setTitle('Pippo Pluto');
        $blogPost->setBlog('Lebowski & Nico');
        $blogPost->setAuthor('Riccardo');
        $blogPost->setCreated(new \DateTime('now'));
        $blogPost->setUpdated(new \DateTime('now'));
        $blogPost->setImage('prova.png');
        $blogPost->setTags('prova, lebowski, musica');
        $blogPost->setSlug('pippo-pluto');

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($blogPost);
        $em->flush();
        
        return $this->render('BloggerBlogBundle:Blog:createPost.html.twig', array('blogpost' => $blogPost));
    }
    
    /**
     * @Route("/blog/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $repository = $this->getDoctrine()->getRepository('BloggerBlogBundle:Blog');

        $blogPost = $repository->findOneBySlug($slug);

        if (!$blogPost) {
            throw $this->createNotFoundException('Nessun post trovato per lo slug '.$slug);
        }
        return $this->render('BloggerBlogBundle:Blog:singlePost.html.twig', array('blogpost' => $blogPost));
    }
}
