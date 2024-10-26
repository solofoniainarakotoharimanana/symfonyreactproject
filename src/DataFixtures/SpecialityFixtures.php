<?php

namespace App\DataFixtures;

use App\Entity\Speciality;
use App\Repository\UserRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SpecialityFixtures extends Fixture implements DependentFixtureInterface
{

  public function __construct(private UserRepository $userRepository)
  {}

  public function load(ObjectManager $manager): void{
    $faker = Factory::create('fr_FR');
    $users = $this->userRepository->findAll();
    $specialities = [];
    for ($i=1; $i < 15; $i++) {
      $speciality = new Speciality();
      $speciality->setName($faker->word())
        ->setCreatedAt(new \DateTimeImmutable());
      $specialities[] = $speciality;

      $manager->persist($speciality);
    }

    foreach($users as $user){
      for ($i=0; $i < mt_rand(1, 20); $i++) {
        $user->addSpeciality(
          $specialities[mt_rand(1, count($specialities) - 1)]
        );
      }
    }

    $manager->flush();
  }

  public function getDependencies()
  {
    return [UserFixtures::class];   
  }
}