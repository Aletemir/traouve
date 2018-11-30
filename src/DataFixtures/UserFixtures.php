<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setFirstname('Thibault');
        $user1->setLastname('Tregret');
        $user1->setEmail('thibault.tregret@gmail.com');
        $user1->setPhone('0607155463');
        $user1->setPassword($this->passwordEncoder->encodePassword($user1, "1234"));
        $user1->setRoles(['ROLE_USER']);
        $manager->persist($user1);
        $this->addReference('user-1', $user1);

        $user2 = new User();
        $user2->setFirstname('Pierre');
        $user2->setLastname('Jehan');
        $user2->setEmail('pjehan@gmail.com');
        $user2->setPassword("1234");
        $user2->setRoles(['ROLE_USER']);
        $user2->setPicture('user-2.jpg');
        $user2->setPhone('0607080905');
        $manager->persist($user2);
        $this->addReference('user-2', $user2);

        $user3 = new User();
        $user3->setFirstname('Lecrique');
        $user3->setLastname('Julien');
        $user3->setEmail('jlecrique@gmail.com');
        $user3->setPassword("1234");
        $user3->setRoles(['ROLE_USER']);
        $manager->persist($user3);
        $this->addReference('user-3', $user3);

        $user4 = new User();
        $user4->setFirstname('Barrier');
        $user4->setLastname('Antoine');
        $user4->setEmail('a.barrier@gmail.com');
        $user4->setPassword($this->passwordEncoder->encodePassword($user4, "1234"));
        $user4->setPicture('photoMistyMJ.jgp');
        $user4->setRoles(['ROLE_ADMIN']);
        $manager->persist($user4);
        $this->addReference('user-4', $user4);

        $manager->flush();
    }

}