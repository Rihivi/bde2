<?php
namespace Main\MainBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Main\MainBundle\Entity\ActivityProposal;

class ActivityProposalData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $activityProposal1 = new ActivityProposal();
        $activityProposal1->setTitle('Activité 1');
        $activityProposal1->setDescription('Un bon ciné');
        $activityProposal1->setLikeActivity('0');
        $activityProposal1->addUser($this->getReference("user_loic"));
        $manager->persist($activityProposal1);
        $manager->flush();

        $this->addReference('activityProposal1', $activityProposal1);
    }
    public function getOrder()
    {
        return 2;
    }
}