<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Picture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Bookmark;

class LoadBookmarkFixture extends AbstractFixture implements OrderedFixtureInterface
{
    function load(ObjectManager $manager)
    {
        $johnbookmark = new Bookmark();
        $johnbookmark->setTitle('BITCHES');
        $johnbookmark->setUser($this->getReference('admin-user'));
        $johnbookmark->setIsActive(true);
        $johnbookmark->addPicture($this->getReference('picture-1'));
        $johnbookmark->addPicture($this->getReference('picture-2'));
        $johnbookmark->addPicture($this->getReference('picture-3'));

        $manager->persist($johnbookmark);
        $manager->flush();

        $moiseBookmark = new Bookmark();
        $moiseBookmark->setTitle('pretty');
        $moiseBookmark->setUser($this->getReference('moise-user'));
        $moiseBookmark->setIsActive(true);
        $moiseBookmark->addPicture($this->getReference('picture-25'));
        $moiseBookmark->addPicture($this->getReference('picture-18'));

        $manager->persist($moiseBookmark);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
