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
        $picture = new Picture();


        $picture->setFlickrId();
        $picture->setFlickrSecret();
        $picture->setFlickrFarmid();
        $picture->setFlickrServid();
        $i = 1;

/*        while ($i <= 100) {
            $post = new Post();
            $post->setTitle('Titre du post n°'.$i);
            $post->setBody('Corps du post');
            $post->setIsPublished($i%2);
            $manager->persist($post);

            $i++;
        }

        $manager->flush();*/
    }

    public function getOrder()
    {
        return 3;
    }
}
