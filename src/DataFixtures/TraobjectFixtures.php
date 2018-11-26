<?php

namespace App\DataFixtures;

use App\Entity\Traobject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TraobjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $portefeuille = new Traobject();
        $portefeuille->setUser($this->getReference('user-2'));
        $portefeuille->setLabel('Portefeuille trouvé');
        $portefeuille->setState($this->getReference('state-trouve'));
        $portefeuille->setCategory($this->getReference('cat-portefeuille'));
        $portefeuille->setImage('wallet.jpg');
        $portefeuille->setVille('Saint Brieuc');
        $portefeuille->setDepartement($this->getReference('coteArmor'));
        $portefeuille->setAdress('rue Veaugirard');
        $portefeuille->setDescritption('Trouvé portefeuille noir avec plein de billet dedans, près de la station de métro à coté du cinéma');
        $portefeuille->setCreatedAt('2018-06-25');
        $portefeuille->setEventAt(new \DateTime('2018-05-20'));
        $manager->persist($portefeuille);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class, DepartementFixtures::class, CategoryFixtures::class, StateFixtures::class];
    }

}
