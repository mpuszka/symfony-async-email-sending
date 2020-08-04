<?php

namespace App\Message;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
/**
 * Email message class
 */
final class EmailMessage
{   
    /**
     * User name
     *
     * @var string
     */
    private $name;

    /**
     * Constructor
     *
     * @param string $name
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * Send email method
     *
     * @return object
     */
    public function sendEmail(): object {
       
        $email = (new TemplatedEmail())
            ->from('hello@example.com')
            ->to('you@example.com')
            ->subject('Time for Symfony Mailer!')
            ->htmlTemplate('emails/basic.html.twig')
            ->context([
                'name' => $this->name
            ]);

        return $email;
   }
}
