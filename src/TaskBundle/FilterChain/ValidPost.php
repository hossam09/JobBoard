<?php

namespace TaskBundle\FilterChain;
use TaskBundle\Repository\JobRepository;

use TaskBundle\FilterChain\FilterChain;
use TaskBundle\FilterChain\NewPost;

class ValidPost extends FilterChain
{       
    public function _proceed($job)
    {
        // Do what is required for Valid posts (Save Data)
        if ( $job->getStatus() == 1 ) {
            $this->jobRepository->insertPost($job);
        }
        
        $this->setNext(new NewPost());
    }
}
