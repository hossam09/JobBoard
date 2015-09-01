<?php

namespace TaskBundle\FilterChain;

use TaskBundle\FilterChain\FilterChain;
use TaskBundle\FilterChain\ValidPost;

class SpamPost extends FilterChain
{   
    public function _proceed($job)
    {
        // I do what is required for Spam posts (Do not create it and notify by an output message)
        if ( $job->getStatus() !== 2 ) {
            $this->setNext(new ValidPost());
        }        
        $msg = "Sorry, your email account has been suspended!"  ;
        return array('msg' => $msg, 'is_spam' => true);
}
}
