<?php
namespace MailerBundle\Services;

use Symfony\Component\Templating\EngineInterface;

class Mailer
{
    protected $mailer;

    protected $templating;

    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendContactMessage($user)
    {
        $template = 'MailerBundle:Mail:contact.html.twig';

        //$from = $user->getEmail();

        $from = 'mrakotomizao@gmail.com';

        $to = 'mrakotomizao@gmail.com';

        $subject = 'Formulaire de contact';

        $body = $this->templating->render($template, array('$user' => $user));

        $this->sendMessage($from, $to, $subject, $body);
    }

    protected function sendMessage($from, $to, $subject, $body)
    {
        $mail = \Swift_Message::newInstance();

        $mail
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setContentType('text/html');

        $this->mailer->send($mail);
    }
}