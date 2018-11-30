<?php

namespace App\DataFixtures;

use App\Entity\Traobject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;

class TraobjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $portefeuille = new Traobject();
        $portefeuille->setUser($this->getReference('user-2'));
        $portefeuille->setLabel('Portefeuille trouvé');
        $portefeuille->setState($this->getReference('state-trouve'));
        $portefeuille->setCategory($this->getReference('cat-portefeuille'));
        $portefeuille->setpicture('wallet.jpg');
        $portefeuille->setVille('Saint Brieuc');
        $portefeuille->setDepartement($this->getReference('coteArmor'));
        $portefeuille->setAdress('rue Veaugirard');
        $portefeuille->setDescritption('Trouvé portefeuille noir avec plein de billet dedans, près de la station de métro à coté du cinéma');
        $portefeuille->setCreatedAt(new \DateTime('20-02-2018'));
        $portefeuille->setEventAt(new \DateTime('2018-05-20'));
        $manager->persist($portefeuille);

        $cle = new Traobject();
        $cle->setUser($this->getReference('user-1'));
        $cle->setLabel('Trousseau clé trouvé');
        $cle->setState($this->getReference('state-trouve'));
        $cle->setCategory($this->getReference('cat-cle'));
        $cle->setpicture('key.jpg');
        $cle->setVille('Vannes');
        $cle->setDepartement($this->getReference('morbihan'));
        $cle->setAdress('rue Saint Malo');
        $cle->setDescritption('Perdu trousseau de clés');
        $cle->setCreatedAt(new \DateTime('2018-07-28'));
        $cle->setEventAt(new \DateTime('2018-07-28'));
        $manager->persist($cle);

        $jouet = new Traobject();
        $jouet->setUser($this->getReference('user-3'));
        $jouet->setLabel('Retrouvé un jouet');
        $jouet->setState($this->getReference('state-trouve'));
        $jouet->setCategory($this->getReference('cat-jouet'));
        $jouet->setpicture('toy.jpg');
        $jouet->setVille('Brest');
        $jouet->setDepartement($this->getReference('finistere'));
        $jouet->setAdress('Place Villejean');
        $jouet->setDescritption('Trouvé un jouet transformers');
        $jouet->setCreatedAt(new \DateTime('2018-04-16'));
        $jouet->setEventAt(new \DateTime('2018-04-15'));
        $manager->persist($jouet);

        $animal = new Traobject();
        $animal->setUser($this->getReference('user-4'));
        $animal->setLabel('Chien trouvé');
        $animal->setState($this->getReference('state-trouve'));
        $animal->setCategory($this->getReference('cat-animal'));
        $animal->setpicture('chien.jpg');
        $animal->setVille('Rennes');
        $animal->setDepartement($this->getReference('illeVilaine'));
        $animal->setAdress('rue General Choin choin');
        $animal->setDescritption('Trouvé un chien');
        $animal->setCreatedAt(new \DateTime('2018-11-27'));
        $animal->setEventAt(new \DateTime('2018-11-16'));
        $manager->persist($animal);

        $chat = new Traobject();
        $chat->setUser($this->getReference('user-4'));
        $chat->setLabel('chat trouvé');
        $chat->setState($this->getReference('state-perdu'));
        $chat->setCategory($this->getReference('cat-animal'));
        $chat->setpicture('chat.jpg');
        $chat->setVille('Rennes');
        $chat->setDepartement($this->getReference('illeVilaine'));
        $chat->setAdress('rue General Choin choin');
        $chat->setDescritption('Trouvé un chat');
        $chat->setCreatedAt(new \DateTime('2018-11-27'));
        $chat->setEventAt(new \DateTime('2018-11-16'));
        $manager->persist($chat);

        $ironman = new Traobject();
        $ironman->setUser($this->getReference('user-3'));
        $ironman->setLabel('Retrouvé un jouet');
        $ironman->setState($this->getReference('state-perdu'));
        $ironman->setCategory($this->getReference('cat-jouet'));
        $ironman->setVille('Brest');
        $ironman->setDepartement($this->getReference('finistere'));
        $ironman->setAdress('Place Villejean');
        $ironman->setDescritption('Trouvé un jouet transformers');
        $ironman->setCreatedAt(new \DateTime('2018-04-16'));
        $ironman->setEventAt(new \DateTime('2018-04-15'));
        $manager->persist($ironman);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class, DepartementFixtures::class, CategoryFixtures::class, StateFixtures::class];
    }

}
