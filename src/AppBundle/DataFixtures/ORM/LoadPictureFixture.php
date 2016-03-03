<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Picture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadPictureFixture extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    function load(ObjectManager $manager)
    {
        $flkrService = $this->container->get('flickr.search');
        $result = $flkrService->search('voyage');
        $photos = $result['photos']['photo'];
        $nbtotPhoto = count($photos);

        $i = 1;

        while ($i <= 30) {
            $randValue = rand(0, $nbtotPhoto - 1);
            $picture = new Picture();
            $picture->setFlickrId($photos[$randValue]['id']);
            $picture->setFlickrSecret($photos[$randValue]['secret']);
            $picture->setFlickrFarmid($photos[$randValue]['farm']);
            $picture->setFlickrServid($photos[$randValue]['server']);
            $manager->persist($picture);
            $this->addReference('picture-' . $i, $picture);

            $i++;
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
