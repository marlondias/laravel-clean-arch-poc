<?php

namespace TheSource\Domain\Entities;

use DateTime;
use TheSource\Domain\Contracts\Entity;
use TheSource\Domain\ValueObjects\EmailAddress;
use TheSource\Domain\ValueObjects\PersonName;

class User extends Entity
{
    protected PersonName $name;
    protected EmailAddress $email;
    protected string $obfuscatedPassword;
    protected ?DateTime $emailVerifiedAt = null;
    protected ?DateTime $createdAt = null;
    protected ?DateTime $updatedAt = null;


    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name->toArray(),
            'email' => $this->email->toArray(),
            'obfuscatedPassword' => $this->obfuscatedPassword,
            'emailVerifiedAt' => $this->emailVerifiedAt->format('Y-m-d H:i:s'),
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updatedAt->format('Y-m-d H:i:s'),
        ];
    }

    public function getPersonName(): PersonName
    {
        return $this->name;
    }

    public function getEmail(): EmailAddress
    {
        return $this->email;
    }

    public function getObfuscatedPassword(): string
    {
        return $this->obfuscatedPassword;
    }

    public function getEmailVerifiedAt(): ?DateTime
    {
        return $this->emailVerifiedAt;
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

    public function setObfuscatedPassword(string $value): self
    {
        $this->obfuscatedPassword = $value;
        return $this;
    }

    public function setEmailVerifiedAt(string $dateTimeYMD): self
    {
        $this->emailVerifiedAt = DateTime::createFromFormat('Y-m-d', $dateTimeYMD);
        return $this;
    }

    public function setCreatedAt(string $dateTimeYMD): self
    {
        $this->createdAt = DateTime::createFromFormat('Y-m-d', $dateTimeYMD);
        return $this;
    }

    public function setUpdatedAt(string $dateTimeYMD): self
    {
        $this->updatedAt = DateTime::createFromFormat('Y-m-d', $dateTimeYMD);
        return $this;
    }
}
