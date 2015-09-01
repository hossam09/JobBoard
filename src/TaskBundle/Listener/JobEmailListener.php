<?php
namespace TaskBundle\Listener;

use TaskBundle\Mailer\JobBoardMailer;
use TaskBundle\Event\JobEvent;

class JobEmailListener
{
    /**
     * @var JobBoardMailer
     */
    protected $jobBoardMailer;

    /**
     * @var RouterInterface
     */
    protected $templating;

    /**
     * @param JobBoardMailer    $jobBoardMailer
     * @param RouterInterface   $router
     */
    public function __construct(JobBoardMailer $jobBoardMailer)
    {
        $this->jobBoardMailer = $jobBoardMailer;
    }

    /**
     * @param JobEvent $jobEvent
     */
    public function onJobCreated(JobEvent $jobEvent)
    {
        $job = $jobEvent->getJob();
        // Notification message to User
        $this->jobBoardMailer->sendMessage(
            sprintf('The job %s has been Sent', $job->getTitle()),
            'no-reply@job-board.com',
            $job->getEmail(),
            'Test'
        );
        
        // Notification message to Job-Board Moderator
        $this->jobBoardMailer->sendMessage(
            sprintf('The job %s has been created', $job->getTitle()),
            'no-reply@job-board.com',
            'admin@job-board.com',
            'Test'
        );
    }
}
