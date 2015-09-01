<?php

namespace TaskBundle\UserPost;

use TaskBundle\UserPost\UserPostChain;
use TaskBundle\UserPost\ValidPost;

class SpamPost extends UserPostChain
{

    public function _proceed($job)
    {
        if ( $job->getStatus() == 2 ) {
            return "Sorry, You can not add any job posts. your account has been suspended!";
        }
                print 1;
        $this->setNext(new ValidPost());
    }
}
