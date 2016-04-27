<?php

namespace MailerBundle\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendSpamCommand extends ContainerAwareCommand
{
    private $container;
    protected function configure()
    {
        $this
            ->setName('send:spam')
            ->setDescription('Envoi email')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->container = $this->getApplication()->getKernel()->getContainer();
        $message = \Swift_Message::newInstance()
            ->setSubject('Contact enquiry from symblog')
            ->setFrom('mrakotomizao@gmail.com')
            ->setTo('moise_rako@yahoo.fr')
            ->setContentType('text/html')
            ->setBody("YES");
        $this->container->get('mailer')->send($message);

        echo "DONE";

    }

}
?>