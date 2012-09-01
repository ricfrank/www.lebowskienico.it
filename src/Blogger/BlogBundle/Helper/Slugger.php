<?php

namespace Blogger\BlogBundle\Helper;

class Slugger 
{
    public static function createSlugbyTitle($title)
    {
        return  trim(strtolower(str_replace(' ', '-', $title)));
    }
}
