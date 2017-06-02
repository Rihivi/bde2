<?php
namespace Main\MainBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Main\MainBundle\Entity\Media;

class MediaData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $media1 = new Media();
        $media1->setPath('img/UGC.png');
        $media1->setUrl('png');
        $manager->persist($media1);

        $media2 = new Media();
        $media2->setPath('img/acrobranche.png');
        $media2->setUrl('png');
        $manager->persist($media2);

        $manager->flush();

        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
    }
    public function getOrder()
    {
        return 1;
    }
}