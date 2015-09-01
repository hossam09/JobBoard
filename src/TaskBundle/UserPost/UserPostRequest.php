<?php

namespace TaskBundle\UserPost;

use TaskBundle\UserPost\SpamPost;

class UserPostRequest 
{
    public function proceed($job) 
    {
        $postChain = new SpamPost();
        $postChain->proceed($job);
    }
}
