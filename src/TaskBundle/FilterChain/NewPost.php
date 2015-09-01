<?php

namespace TaskBundle\FilterChain;

use TaskBundle\FilterChain\FilterChain;
use TaskBundle\JobEvents;
use TaskBundle\Event\JobEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;

class NewPost extends FilterChain
{
    private $eventDispatcher;
    
    public function __construct()
    {
        $this->eventDispatcher = new EventDispatcher();
    }
    
    public function _proceed($job)
    {
        // I do what is required for new posts (Send mail to user and job board moderator)
        if ( $job->getStatus() == 0 ) {            
            $this->eventDispatcher->dispatch(JobEvents::JOB_CREATED, new JobEvent($job));
            $msg = "Thanks, your job Post has been created and in moderation review"  ;
            return array('job' => $job,
                'msg' => $msg,
                'is_spam' => false
                    );
        }
    }
}
