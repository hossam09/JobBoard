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
        // Do what is required for new posts (Save and Send mails)
        if ( $job->getStatus() == 0 ) {            
            $this->eventDispatcher->dispatch(JobEvents::JOB_CREATED, new JobEvent($job));
        }
    }
}
