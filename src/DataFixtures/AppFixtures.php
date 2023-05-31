<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setUsername('minisushi');
        $user->setPassword('ptitlou');
        // ... Définissez d'autres propriétés
    
        $manager->persist($user);
        $manager->flush();
    }
}
