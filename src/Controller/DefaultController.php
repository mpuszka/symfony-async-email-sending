<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Message\EmailMessage;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index(MessageBusInterface $bus)
    {   
        $name = 'John Doe';

        if ($bus->dispatch(new EmailMessage($name))) {
            return new Response(
                'Email was sent'
             );
        }

        return new Response(
          'Email was NOT sent'
       );
    }
}
