<?php

namespace TaskBundle\UserPost;

use TaskBundle\UserPost\UserPostChain;
use TaskBundle\UserPost\NewPost;

class ValidPost extends UserPostChain
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
