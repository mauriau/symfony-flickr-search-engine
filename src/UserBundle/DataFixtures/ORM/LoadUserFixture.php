<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUserFixture extends AbstractFixture implements OrderedFixtureInterface
{
    function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('john');
        $admin->setEmail('admin@example.com');
        $admin->setPassword('secret');
        $admin->setRoles(array('ROLE_ADMIN'));
        $this->addReference('anna-user', $admin);
        $manager->persist($admin);
        $manager->flush();
        $this->addReference('admin-user', $admin);

        $moiseAdmin = new User();
        $moiseAdmin->setUsername('moise');
        $moiseAdmin->setEmail('anna_admin@symfony.com');
        $moiseAdmin->setRoles(array('ROLE_USER'));
        $moiseAdmin->setPassword('030784');
        $manager->persist($moiseAdmin);
        $manager->flush();
        $this->addReference('moise-user', $moiseAdmin);
    }

    public function getOrder()
    {
        return 1;
    }
}
