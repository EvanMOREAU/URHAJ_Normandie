<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher) {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        /* Utilisateur Dev Début */
        $superAdmin = new User();
        $superAdmin->setEmail('minisushi@domaine.tld');
        $superAdmin->setName('Evan MOREAU');
        $plaintextPassword = "ptitlou";
        $hashedPassword = $this->passwordHasher->hashPassword(
            $superAdmin,
            $plaintextPassword
        );
        $superAdmin->setPassword($hashedPassword);
        $superAdmin->setRoles([
            "ROLE_SUPER_ADMIN",
        ]);
        $manager->persist($superAdmin);
        $manager->flush();
        /* Utilisateur Dev fin */

        /* Utilisateur Dev2 Début */
        $utilisateurModel = new User();
        $utilisateurModel->setEmail('usermodal@domaine.tld');
        $utilisateurModel->setName('Albert Girard');
        $plaintextPassword = "usermodal";
        $hashedPassword = $this->passwordHasher->hashPassword(
            $superAdmin,
            $plaintextPassword
        );
        $utilisateurModel->setPassword($hashedPassword);
        $utilisateurModel->setRoles([
            "ROLE_SUPER_ADMIN",
        ]);
        $manager->persist($utilisateurModel);
        $manager->flush();
        /* Utilisateur Dev2 Fin */


    }
}