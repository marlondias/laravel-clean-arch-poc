<?php

namespace TheSource\Domain\Entities;

use DateTime;
use stdClass;
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
    // TODO $table->rememberToken();


    public function toArray(): array
    {
        return [];
    }

    public function toObject(): stdClass
    {
        return new stdClass();
    }

    public function getName(): PersonName
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

}
