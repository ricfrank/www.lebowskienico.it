<?php

namespace Blogger\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
      * @Route("/user/new")
      * @Template()
      */
    public function createUserAction()
    {
        $factory = $this->get('security.encoder_factory');
        $user = new \Blogger\UserBundle\Entity\User();

        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword('lebowski', $user->getSalt());
        $user->setPassword($password);
var_dump($user);
    }
  
}
