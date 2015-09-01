<?php

namespace TaskBundle\FilterChain;

use TaskBundle\FilterChain\FilterChain;
use TaskBundle\FilterChain\ValidPost;

class SpamPost extends FilterChain
{   
    public function _proceed($job)
    {
        // Do what is required for Spam posts (Do Nothing)
        if ( $job->getStatus() !== 2 ) {
            $this->setNext(new ValidPost());
        }        
    }
}
