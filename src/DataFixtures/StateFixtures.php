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
            $trouve->setLabel('Trouvé');
            $trouve->setColor('orange');
            $manager->persist($trouve);
            $this->setReference('state-trouve' , $trouve);

            $perdu= new State();
            $perdu->setLabel('Perdu');
            $perdu->setColor('grey');
            $manager->persist($perdu);
            $this->setReference('state-trouve' , $perdu);


        $manager->flush();
    }
}
