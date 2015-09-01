<?php

namespace TaskBundle\UserPost;

use TaskBundle\UserPost\UserPostChain;
use TaskBundle\JobEvents;
use TaskBundle\Event\JobEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;

class NewPost extends UserPostChain
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
