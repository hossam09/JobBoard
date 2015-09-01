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
        if ( $job->getStatus() == 0 ) {
            // Insert request
            $this->eventDispatcher->dispatch(JobEvents::JOB_CREATED, new JobEvent($job));
            return "Thanks, Your job post has been sent, it will be in moderation step!";
        }
    }
}
