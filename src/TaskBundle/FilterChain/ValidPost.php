<?php

namespace TaskBundle\FilterChain;

use TaskBundle\FilterChain\FilterChain;
use TaskBundle\FilterChain\NewPost;

class ValidPost extends FilterChain
{       
    public function _proceed($job)
    {
        // I do what is required for Valid posts (return Job to save its data)
        if ( $job->getStatus() == 1 ) {
            $msg = "Thanks, your job Post has been created and published"  ;
            return array('job' => $job,
                'msg' => $msg,
                'is_spam' => false
                    );
        }
        
        $this->setNext(new NewPost());
    }
}
