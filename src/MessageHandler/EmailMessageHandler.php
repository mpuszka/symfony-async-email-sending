<?php

namespace App\MessageHandler;

use App\Message\EmailMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Mailer\MailerInterface;

final class EmailMessageHandler implements MessageHandlerInterface
{   
    /**
     * mailer variable
     *
     * @var object
     */
    private $mailer;

    /**
     * Constructor
     *
     * @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer) {
        $this->mailer = $mailer;
    }

    /**
     * invoke method
     *
     * @param EmailMessage $message
     * @return void
     */
    public function __invoke(EmailMessage $message): void
    {   
       $email = $message->sendEmail();

       $this->mailer->send($email);
    }
}
