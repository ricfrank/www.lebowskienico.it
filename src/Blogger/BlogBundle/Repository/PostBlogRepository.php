<?php

namespace Blogger\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BlogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostBlogRepository extends EntityRepository
{
    public function findAllOrderedByDateDesc($limit = null)
    {
        $em = $this->getEntityManager();
        
        $qb = $em->createQueryBuilder()
                  ->select('b')
                  ->from('BloggerBlogBundle:PostBlog',  'b')
                  ->addOrderBy('b.created', 'DESC');
        
        if (false === is_null($limit)){
            $qb->setMaxResults($limit);
        }

        return $qb->getQuery()
                  ->getResult();
        
//        return $this->getEntityManager()
//            ->createQuery('SELECT b FROM BloggerBlogBundle:PostBlog b ORDER BY b.created DESC')
//            ->getResult();
    }
}