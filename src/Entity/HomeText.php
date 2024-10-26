<?php

namespace App\Entity;

use App\Repository\HomeTextRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HomeTextRepository::class)]
class HomeText
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $patient = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $doctor = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $speciality = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $appointment = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $services = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?string
    {
        return $this->patient;
    }

    public function setPatient(string $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getDoctor(): ?string
    {
        return $this->doctor;
    }

    public function setDoctor(string $doctor): static
    {
        $this->doctor = $doctor;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(string $speciality): static
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getAppointment(): ?string
    {
        return $this->appointment;
    }

    public function setAppointment(string $appointment): static
    {
        $this->appointment = $appointment;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->services;
    }

    public function setServices(string $services): static
    {
        $this->services = $services;

        return $this;
    }
}
