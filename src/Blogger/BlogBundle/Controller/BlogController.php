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
        $em = $this->getDoctrine()->getEntityManager();
        $allBlogPost = $em->getRepository('BloggerBlogBundle:PostBlog')->findAllOrderedByDateDesc();
        return $this->render('BloggerBlogBundle:PostBlog:index.html.twig', array('posts' => $allBlogPost));
    }
    
    /**
     * @Route("/blog/nuovo-post/{slug}")
     * @Template()
     */
    public function createAction($slug)
    {
        $blogPost = new Entity\PostBlog();
        $blogPost->setTitle('titolo: '.$slug);
        $blogPost->setBlog('Lebowski & Nico');
        $blogPost->setAuthor('Riccardo');

        $blogPost->setImage('prova.png');
        $blogPost->setTags('prova, lebowski, musica');

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($blogPost);
        $em->flush();
        
        return $this->render('BloggerBlogBundle:PostBlog:createPost.html.twig', array('blogpost' => $blogPost));
    }
    
    /**
     * @Route("/blog/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blogPost = $em->getRepository('BloggerBlogBundle:PostBlog')->findOneBySlug($slug);
//var_dump($blogPost->getComments()->first()->getComment() );
        if (!$blogPost) {
            throw $this->createNotFoundException('Nessun post trovato per lo slug '.$slug);
        }
        
        $comments = $em->getRepository('BloggerBlogBundle:Comment')
                    ->getCommentsForBlog($blogPost->getId());

        
        return $this->render('BloggerBlogBundle:PostBlog:singlePost.html.twig', array(
            'blogpost' => $blogPost,
            'comments'  => $comments
        ));
    }
    
    /**
     *
     * @Route("/blog/modifica-post/{slug}")
     * @Template()
     */
    public function updateAction($slug)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $blogPost = $em->getRepository('BloggerBlogBundle:PostBlog')->findOneBySlug($slug);

        if (!$blogPost) {
            throw $this->createNotFoundException('Nessun post trovato per lo slug '.$slug);
        }

        $blogPost->setTitle('Nome del nuovo post!');
        $blogPost->setUpdated(new \DateTime('now'));
        $em->flush();

        return $this->redirect($this->generateUrl('blogger_blog_blog_index'));
    }
    
    /**
     * @Route("/blog/rimuovi-post/{slug}")
     * @Template()
     */
    public function removeAction($slug)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $blogPost = $em->getRepository('BloggerBlogBundle:PostBlog')->findOneBySlug($slug);

        if (!$blogPost) {
            throw $this->createNotFoundException('Nessun post trovato per lo slug '.$slug);
        }

        $em->remove($blogPost);
        $em->flush();
        
        return $this->redirect($this->generateUrl('blogger_blog_blog_index'));
    }
}
