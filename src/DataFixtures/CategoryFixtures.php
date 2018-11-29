<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


        $cle = new Category();
        $cle->setLabel('Clé');
        $cle->setIcon('fa-key');
        $cle->setColor('blue');
        $manager->persist($cle);
        $this->addReference('cat-cle', $cle);

        $portefeuille = new Category();
        $portefeuille->setLabel('Portefeuille');
        $portefeuille->setIcon('fa-money');
        $portefeuille->setColor('green');
        $manager->persist($portefeuille);
        $this->addReference('cat-portefeuille', $portefeuille);

        $jouet = new Category();
        $jouet->setLabel('Jouet');
        $jouet->setIcon('fa-gamepad');
        $jouet->setColor('yellow');
        $manager->persist($jouet);
        $this->addReference('cat-jouet', $jouet);

        $animal = new Category();
        $animal->setLabel('Animal');
        $animal->setIcon('fa-paw');
        $animal->setColor('red');
        $manager->persist($animal);
        $this->addReference('cat-animal', $animal);


        $manager->flush();
    }
}
