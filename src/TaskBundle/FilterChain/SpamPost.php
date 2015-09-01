<?php

namespace TaskBundle\FilterChain;

use TaskBundle\FilterChain\FilterChain;
use TaskBundle\FilterChain\ValidPost;

class SpamPost extends FilterChain
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
