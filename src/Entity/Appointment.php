<?php

namespace App\Entity;

use App\Entity\Trait\Timestampable;
use App\Repository\AppointmentRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    use Timestampable;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateAppointment = null;

    #[ORM\Column]
    private ?int $startTime = null;

    #[ORM\Column]
    private ?int $endTime = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $patient = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?User $doctor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAppointment(): ?\DateTimeImmutable
    {
        return $this->dateAppointment;
    }

    public function setDateAppointment(\DateTimeImmutable $dateAppointment): static
    {
        $this->dateAppointment = $dateAppointment;

        return $this;
    }

    public function getStartTime(): ?int
    {
        return $this->startTime;
    }

    public function setStartTime(int $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?int
    {
        return $this->endTime;
    }

    public function setEndTime(int $endTime): static
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPatient(): ?User
    {
        return $this->patient;
    }

    public function setPatient(?User $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getDoctor(): ?User
    {
        return $this->doctor;
    }

    public function setDoctor(?User $doctor): static
    {
        $this->doctor = $doctor;

        return $this;
    }
}
