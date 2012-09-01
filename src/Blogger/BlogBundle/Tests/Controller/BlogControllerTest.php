<?php
namespace Blogger\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/blog');

        $this->assertGreaterThan(0, $crawler->filter('html:contains("titolo: ciccio-mario")')->count());
    }
}
