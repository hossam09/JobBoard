<?php
namespace TaskBundle\Listener;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use TaskBundle\Mailer\JobBoardMailer;
use TaskBundle\Event\JobEvent;

class JobEmailListener
{
    /**
     * @var JobBoardMailer
     */
    protected $jobBoardMailer;

    /**
     * @var EngineInterface
     */
    protected $templating;

    /**
     * @param JobBoardMailer    $jobBoardMailer
     * @param EngineInterface   $templating
     */
    public function __construct(JobBoardMailer $jobBoardMailer, EngineInterface $templating)
    {
        $this->jobBoardMailer = $jobBoardMailer;
        $this->templating = $templating;
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
            'no-reply@hossamyoussef.com',
            $job->getEmail(),
            $this->templating->renderResponse('Email/user.html.twig',
                array('job' => $job)
                    )
        );
        
        // Notification message to Job-Board Moderator
        $this->jobBoardMailer->sendMessage(
            sprintf('The job %s has been created', $job->getTitle()),
            'no-reply@hossamyoussef.com',
            'admin@hossamyoussef.com',
            $this->templating->renderResponse('Email/moderator.html.twig',
                array('job' => $job)
                    )
        ); 
    }
}
