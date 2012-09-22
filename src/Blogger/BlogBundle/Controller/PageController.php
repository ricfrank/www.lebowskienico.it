<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;

class PageController extends Controller
{
    
   /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('BloggerBlogBundle:Page:index.html.twig');
    }
  
  
    /**
     * @Route("/contatti")
     * @Template()
     */
    public function contactAction()
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request); //binda la richiesta con sull'oggetto enquiry in modo che venga popolato
                                          //con i dati arrivati in post

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Richiesta di contatto arrivata dal sito Lebowski & Nico')
                    ->setFrom('info@lebowskienico.com')
                    ->setTo($enquiry->getEmail())
                    ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                
                $this->get('mailer')->send($message);
                
                $message = \Swift_Message::newInstance()
                    ->setSubject('Qualcuno ci ha scritto dal sito Lebowski & Nico')
                    ->setFrom($enquiry->getEmail())
                    ->setTo($this->container->getParameter('blogger_blog.emails.contact_email'))
                    ->setBody($this->renderView('BloggerBlogBundle:Page:contactAdminEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);
        

                $this->get('session')->setFlash('blogger-notice', 'La tua richiesta è stata inviata. Grazie!');
                
                return $this->redirect($this->generateUrl('blogger_blog_page_contact'));
            }
        }

        return $this->render('BloggerBlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
