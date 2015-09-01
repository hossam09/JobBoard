<?php

namespace TaskBundle\FilterChain;

use TaskBundle\FilterChain\FilterChain;
use TaskBundle\FilterChain\NewPost;

class ValidPost extends FilterChain
{
    public function _proceed($job)
    {
        if ( $job->getStatus() == 1 ) {
            
            return "Thanks, Your job post has been published!";
        }
        print 0;
        $this->setNext(new NewPost());
    }
}
