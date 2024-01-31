<?php

namespace App\DataFixtures;

use App\Entity\Spot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpotFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $spot = new Spot();
        $spot->setSpotName('La Gravière');
        $spot->setDescription('La Gravière est réputée pour ses vagues puissantes et son atmosphère électrique.
        Un spot incontournable pour les surfeurs expérimentés.');
        $spot->setPicture('https://petitsfrenchies.com/wp-content/uploads/2016/07/hossegor-heade.jpg');
        $spot->setMapLink('https://maps.app.goo.gl/uXTnZZUHzoNxDEsq6');
        $manager->persist($spot);
        $manager->flush();
    }
}
