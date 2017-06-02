<?php
namespace Users\UsersBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use User\UserBundle\Entity\User;

class UsersData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $role = array('ROLE_ADMIN');


        $user_loic = new User();
        $user_loic->setRoles($role);
        $user_loic->setNom('Oulerich');
        $user_loic->setPrenom('Loic');
        $user_loic->setEmail('loic.oulerich@viacesi.fr');
        $user_loic->setPassword($this->container->get('security.encoder_factory')->getEncoder($user_loic)->encodePassword('titi', $user_loic->getSalt()));
        $user_loic->setEnabled(1);
//        $user_loic->setMedia($this->getReference('oulerich_loic'));
        $manager->persist($user_loic);

        $user_Raph = new User();
        $user_Raph->setRoles($role);
        $user_Raph->setNom('FRITSCH');
        $user_Raph->setPrenom('Raphaël');
        $user_Raph->setEmail('raphael.fritsch@viacesi.fr');
        $user_Raph->setPassword($this->container->get('security.encoder_factory')->getEncoder($user_Raph)->encodePassword('titi', $user_Raph->getSalt()));
        $user_Raph->setEnabled(1);
//        $user_Raph->setMedia($this->getReference('$user_Raph'));
        $manager->persist($user_Raph);




        $manager->flush();

        $this->addReference('user_loic', $user_loic);
        $this->addReference('user_Raph', $user_Raph);
    }
    public function getOrder()
    {
        return 2;
    }
}