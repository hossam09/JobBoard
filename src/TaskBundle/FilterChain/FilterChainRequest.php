<?php

namespace TaskBundle\FilterChain;

use TaskBundle\FilterChain\SpamPost;

class FilterChainRequest 
{

    public function proceed($job) 
    {
        $postChain = new SpamPost();
        $postChain->proceed($job);
    }
}
