<?php

namespace Blogger\BlogBundle\Tests\Helper;

use Blogger\BlogBundle\Helper\Slugger;

class SluggerTest extends \PHPUnit_Framework_TestCase 
{
    public function testShouldCreateSlugFromTitle()
    {
        $titleMock = 'Pippo e Pluto vanno a casa';
        $expectedSlug = 'pippo-e-pluto-vanno-a-casa';
        
        $actualSlug = Slugger::createSlugbyTitle($titleMock);
        
        $this->assertEquals($actualSlug, $expectedSlug);
    }
}
