<?php

namespace TheSource\Domain\Entities;

use DateTime;
use InvalidArgumentException;
use TheSource\Domain\Contracts\Entity;
use TheSource\Domain\ValueObjects\EmailAddress;
use TheSource\Domain\ValueObjects\PersonGender;
use TheSource\Domain\ValueObjects\PersonName;

class Customer extends Entity
{
    protected PersonName $name;
    protected EmailAddress $email;
    protected DateTime $birthDate;
    protected ?PersonGender $gender = null;
    protected ?DateTime $createdAt = null;
    protected ?DateTime $updatedAt = null;

    public function toArray(): array
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name?->toArray(),
            'email' => $this->email?->toArray(),
            'birthDate' => $this->birthDate?->format('Y-m-d'),
            'createdAt' => $this->createdAt?->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updatedAt?->format('Y-m-d H:i:s'),
            'gender' => $this->gender?->name,
        ];
    }


    public function getName(): PersonName
    {
        return $this->name;
    }

    public function getEmailAddress(): EmailAddress
    {
        return $this->email;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function getPersonGender(): ?PersonGender
    {
        return $this->gender;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setPersonName(string $firstName, string $lastName): self
    {
        $this->name = new PersonName($firstName, $lastName);
        return $this;
    }

    public function setEmailAddress(string $emailAddress): self
    {
        $this->email = new EmailAddress($emailAddress);
        return $this;
    }

    public function setBirthDate(string $date): self
    {
        $birthDate = DateTime::createFromFormat('Y-m-d', $date);
        if ($birthDate === false) {
            throw new InvalidArgumentException('Date string must be in Y-m-d format.');
        }
        $this->birthDate = $birthDate;
        return $this;
    }

    public function setGender(string $gender): self
    {
        $genderEnum = PersonGender::tryFrom($gender);
        if (is_null($genderEnum)) {
            $genderValues = implode(', ', PersonGender::getValues());
            throw new InvalidArgumentException("Gender string must be one of: {$genderValues}");
        }
        $this->gender = $genderEnum;
        return $this;
    }

    public function setCreatedAt(string $dateTimeYMD): self
    {
        $this->createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $dateTimeYMD);
        return $this;
    }

    public function setUpdatedAt(string $dateTimeYMD): self
    {
        $this->updatedAt = DateTime::createFromFormat('Y-m-d H:i:s', $dateTimeYMD);
        return $this;
    }
}
