<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UserBundle\Entity\User;

class LoadUserFixture extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    function load(ObjectManager $manager)
    {
        $passwordEncoder = $this->container->get('security.password_encoder');

        $admin = new User();
        $admin->setUsername('john');
        $admin->setEmail('admin@example.com');
        $encodedPassword = $passwordEncoder->encodePassword($admin, 'secret');
        $admin->setPassword($encodedPassword);
        $admin->setEnabled(true);
        $admin->setRoles(array('ROLE_ADMIN'));
        $this->addReference('admin-user', $admin);
        $manager->persist($admin);
        $manager->flush();

        $moiseAdmin = new User();
        $moiseAdmin->setUsername('moise');
        $moiseAdmin->setEmail('anna_admin@symfony.com');
        $moiseAdmin->setEnabled(true);
        $moiseAdmin->setRoles(array('ROLE_USER'));
        $encodedPassword = $passwordEncoder->encodePassword($admin, '030784');
        $moiseAdmin->setPassword($encodedPassword);
        $manager->persist($moiseAdmin);
        $manager->flush();
        $this->addReference('moise-user', $moiseAdmin);
    }

    public function getOrder()
    {
        return 1;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
