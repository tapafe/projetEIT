<?php
// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\departement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $departement = new Departement();
        $departement->setNom('Direction');
        $departement->setEmail('Direction@projet.fr');
        $manager->persist($departement);

        $departement = new Departement();
        $departement->setNom('rh');
        $departement->setEmail('rh@projet.fr');
        $manager->persist($departement);

        $departement = new Departement();
        $departement->setNom('com');
        $departement->setEmail('com@projet.fr');
        $manager->persist($departement);

        $departement = new Departement();
        $departement->setNom('dev');
        $departement->setEmail('dev@projet.fr');
        $manager->persist($departement);

        $manager->flush();
    }
}
