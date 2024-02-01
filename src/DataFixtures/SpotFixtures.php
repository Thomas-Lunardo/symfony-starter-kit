<?php

namespace App\DataFixtures;

use App\Entity\Spot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpotFixtures extends Fixture
{
    public const SPOTS = [
        [
            'spotName' => 'La Gravière',
            'description' => 'La Gravière est réputée pour ses vagues puissantes et son atmosphère électrique.
            Un spot incontournable pour les surfeurs expérimentés.',
            'picture' => 'https://petitsfrenchies.com/wp-content/uploads/2016/07/hossegor-heade.jpg',
            'mapLink' => 'https://maps.app.goo.gl/uXTnZZUHzoNxDEsq6',
        ],
        [
            'spotName' => 'Les Cavaliers',
            'description' => 'Situé au cœur de la nature, Les Cavaliers offre un paysage spectaculaire et des 
            vagues adaptées à tous les niveaux.
            Idéal pour les amateurs de tranquillité.',
            'picture' => 'https://cdt64.media.tourinsoft.eu/upload/spot-les-cavaliers-2.jpg?width=800',
            'mapLink' => 'https://maps.app.goo.gl/KW8eVrQSR92cd8Pv6',
        ],
        [
            'spotName' => 'La Nord',
            'description' => 'La Nord est réputée pour ses grosses vagues et son ambiance vibrante. Un défi 
            pour les surfeurs chevronnés à la recherche d\'adrénaline.',
            'picture' => 'https://sportihome.com/uploads/spots/59a70f35b27eb115986b6247/large/1504121018914.jpg',
            'mapLink' => 'https://maps.app.goo.gl/RmzEALPzNM2QYrAc6',
        ],
        [
            'spotName' => 'La Torche',
            'description' => 'La Torche, célèbre pour son ambiance conviviale, attire des surfeurs du monde entier.
             Ses vagues constantes en font un spot apprécié de tous.',
            'picture' => 'https://media-cdn.tripadvisor.com/media/photo-s/0d/65/91/47/surfer-an-la-torche.jpg',
            'mapLink' => 'https://maps.app.goo.gl/Vtm97FLP3QTNUocDA',
        ],
        [
            'spotName' => 'Biarritz Côte des Basques',
            'description' => 'Biarritz Côte des Basques est un mélange parfait de beauté naturelle et de vagues
             douces, idéal pour les débutants et les amoureux de la mer.',
            'picture' => 'https://oceanadventure.surf/wp-content/uploads/2023/05/biarritz_cote_des_basques.jpg',
            'mapLink' => 'https://maps.app.goo.gl/m1GnApkCtR6kaG8f9',
        ],
        [
            'spotName' => 'Capbreton Santocha',
            'description' => 'Capbreton Santocha offre des vagues de classe mondiale dans un cadre pittoresque.
             Un spot prisé par les surfeurs cherchant une expérience exceptionnelle.',
            'picture' => 'https://www.plages-landes.info/app/uploads/2023/03/plage-santocha-savane-scaled.webp',
            'mapLink' => 'https://maps.app.goo.gl/7mMp15Zcpu6YtyMt9',
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::SPOTS as $spotFixture) {
            $spot = new Spot();
            $spot->setSpotName($spotFixture['spotName']);
            $spot->setDescription($spotFixture['description']);
            $spot->setPicture($spotFixture['picture']);
            $spot->setMapLink($spotFixture['mapLink']);
            $manager->persist($spot);
            $this->addReference('spot_' . $spotFixture['spotName'], $spot);
        }
        $manager->flush();
    }
}
