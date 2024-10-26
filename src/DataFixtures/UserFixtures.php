<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
  public function __construct(private UserPasswordHasherInterface $hash)
  {

  }
  public function load(ObjectManager $manager)
  {
    $faker = Factory::create('fr_FR');

    for ($i=1; $i < 11; $i++) {
      $user = new User();

      $user->setFirstname($faker->firstName)
        ->setLastname($faker->lastName)
        ->setPassword($this->hash->hashPassword($user, "password"))
        ->setProfile($faker->image(null, 360, 360, 'person', true))
        ->setEmail($faker->email)
        //->setSlug($faker->lastName." ".$faker->lastName)
        ->setCreatedAt(new \DateTimeImmutable());

      $manager->persist($user);

    }
    $manager->flush();
  }
}