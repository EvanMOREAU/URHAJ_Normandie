<?php

namespace App\DataFixtures;

use App\Entity\Departement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class DepFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manche = new Departement();
        $manche->setName('Manche');
        $manche->setNum('50');
        $manager->persist($manche);

        $calvados = new Departement();
        $calvados->setName('Calvados');
        $calvados->setNum('14');
        $manager->persist($calvados);

        $orne = new Departement();
        $orne->setName('Orne');
        $orne->setNum('61');
        $manager->persist($orne);

        $eure = new Departement();
        $eure->setName('Eure');
        $eure->setNum('27');
        $manager->persist($eure);

        $seine = new Departement();
        $seine->setName('Seine-Maritime');
        $seine->setNum('76');
        $manager->persist($seine);

        $manager->flush();
    }


}