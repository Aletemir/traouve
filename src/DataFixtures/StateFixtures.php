<?php

namespace App\DataFixtures;

use App\Entity\State;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

            $trouve= new State();
            $trouve->setLabel('trouve');
            $trouve->setColor('badge-found');
            $manager->persist($trouve);
            $this->setReference('state-trouve' , $trouve);

            $perdu= new State();
            $perdu->setLabel('perdu');
            $perdu->setColor('badge-lost');
            $manager->persist($perdu);
            $this->setReference('state-perdu' , $perdu);


        $manager->flush();
    }
}
