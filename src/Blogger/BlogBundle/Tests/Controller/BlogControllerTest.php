<?php
namespace Blogger\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/blog');

        $this->assertGreaterThan(0, $crawler->filter('html:contains("The pool on the roof must have a leak")')->count());
    }
    
    public function testUpdated()
    {
        $client = static::createClient();
//        $client->insulate(); //isolamento del client - esclude ogni altra richiesta in quel processo per evitare side effets

        $client->request('GET', '/blog/modifica-post/titolo:-fonzi-cicic');
        
        $this->assertTrue($client->getResponse()->isRedirect('/blog'));
    }
}
