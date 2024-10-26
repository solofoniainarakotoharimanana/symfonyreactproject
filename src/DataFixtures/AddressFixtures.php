<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class AddressFixtures extends Fixture implements DependentFixtureInterface
{

  public function __construct(private readonly UserRepository $userRepository)
  {}

  public function load(\Doctrine\Persistence\ObjectManager $manager)
  {
    $faker = Factory::create('fr_FR');
    //dd($this->userRepository->findAll());
    for ($i=1; $i < 11 ; $i++) {
      $address = new Address();
      $address->setAddress($faker->address())
        ->setCity($faker->city)
        ->setRoad($faker->word())
        ->setCreatedAt(new \DateTimeImmutable());

      $user = $this->userRepository->find(['id' => mt_rand(1, count($this->userRepository->findAll()))]);
      $address->setUser($user);

      $manager->persist($address);
    }

    $manager->flush();
  }

  public function getDependencies()
  {
    return [UserFixtures::class];
  }
}