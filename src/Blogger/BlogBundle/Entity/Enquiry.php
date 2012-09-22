<?php
// src/Blogger/BlogBundle/Entity/Enquiry.php

namespace Blogger\BlogBundle\Entity;

//validatori
//use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
//use Symfony\Component\Validator\Constraints\Email;
//use Symfony\Component\Validator\Constraints\MinLength;
//use Symfony\Component\Validator\Constraints\MaxLength;

class Enquiry
{
  
//    CONST NOT_BLANK_MESSAGGE = 'Questo campo non dovrebbe essere vuoto';
//    CONST NOT_EMAIL_VALID_MESSAGE = 'Questa non è una mail valida. Inseriscine una valida.';
  
    /**
     * @Assert\NotBlank(message = "Questo campo non dovrebbe essere vuoto")
     */
    protected $name;

    /**
     * @Assert\Email(
     *     message = "Indirizzo '{{ value }}' non è una mail valida.",
     *     checkMX = true
     * ) 
     */
    protected $email;

    /**
     * @Assert\NotBlank(message = "Questo campo non dovrebbe essere vuoto")
     */
    protected $subject;

    /**
     * @Assert\NotBlank(message = "Questo campo non dovrebbe essere vuoto")
     */
    protected $body;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }
    
//    public static function loadValidatorMetadata(ClassMetadata $metadata)
//    {
//        $metadata->addPropertyConstraint('name', new NotBlank(array(self::NOT_BLANK_MESSAGGE)));
//
//        $metadata->addPropertyConstraint('email',new Email(array(self::NOT_EMAIL_VALID_MESSAGE)));
//
//        $metadata->addPropertyConstraint('subject', new NotBlank(array(self::NOT_BLANK_MESSAGGE)));
//        $metadata->addPropertyConstraint('subject', new MaxLength(50));
//
//        $metadata->addPropertyConstraint('body', new MinLength(50));
//    }
}
