<?php

namespace App\DataFixtures;

use App\Entity\Departement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DepartementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $coteArmor = new Departement();
        $coteArmor->setLabel('Côtes d\'Armor');
        $coteArmor->setZipcode('22');
        $manager->persist($coteArmor);
        $this->setReference('coteArmor' , $coteArmor);


        $vilaine = new Departement();
        $vilaine->setLabel('Ille et Vilaine');
        $vilaine->setZipcode('35');
        $manager->persist($vilaine);
        $this->setReference('illeVilaine' , $vilaine);

        $finistere = new Departement();
        $finistere->setLabel('Finistère');
        $finistere->setZipcode('29');
        $manager->persist($vilaine);
        $this->setReference('finistere' , $finistere);

        $morbihan = new Departement();
        $morbihan->setLabel('Morbihan');
        $morbihan->setZipcode('56');
        $manager->persist($morbihan);
        $this->setReference('morbihan' , $morbihan);

        $manager->flush();
    }
}
