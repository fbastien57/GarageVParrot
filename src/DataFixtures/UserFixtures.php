<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher){

    }

    public function load(ObjectManager $manager): void
    {

        $admin = new Users();
        $admin->setEmail("admin22@admin.com");
        $admin->setFirstname("Vincent");
        $admin->setLastname("Parrot");
        $admin->setPicture("admin.jpg");
        $admin->setRoles(["ROLE_ADMIN"]);
        $admin->setPassword($this->passwordHasher->hashPassword($admin,"V211123Parrot"));
        $manager->persist($admin);
        $manager->flush();
    }
}
