<?php
namespace TaskBundle\Mailer;

class JobBoardMailer
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @param \Swift_Mailer $mailer The swift mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param string $object
     * @param string $fromEmail
     * @param string $toEmail
     * @param string $content
     */
    public function sendMessage($object, $fromEmail, $toEmail, $content)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($object)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            ->setBody($content, 'text/html')
        ;

        $this->mailer->send($message);
    }
}
