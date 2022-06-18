<?php

namespace TheSource\Domain\Entities;

use DateTime;
use DomainException;
use TheSource\Domain\Contracts\Entity;
use TheSource\Domain\Contracts\Services\StringHashingService;
use TheSource\Domain\ValueObjects\EmailAddress;
use TheSource\Domain\ValueObjects\PersonName;

final class User extends Entity
{
    private StringHashingService $stringHashingService;

    protected PersonName $name;
    protected EmailAddress $email;
    protected string $hashedPassword;
    protected ?DateTime $emailVerifiedAt = null;
    protected ?DateTime $createdAt = null;
    protected ?DateTime $updatedAt = null;


    public function __construct(StringHashingService $stringHashingService)
    {
        $this->stringHashingService = $stringHashingService;
    }


    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name->toArray(),
            'email' => $this->email->toArray(),
            'hashedPassword' => $this->hashedPassword,
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

    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
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
        if (strlen($firstName) > 40) {
            throw new DomainException('Primeiro nome não pode ter mais de 40 caracteres.');
        }
        $this->name = new PersonName($firstName, $lastName);
        return $this;
    }

    public function setEmailAddress(string $emailAddress): self
    {
        $this->email = new EmailAddress($emailAddress);
        return $this;
    }

    /**
     * Atenção: passar apenas um valor gerado pelo serviço de Hash, ou obtido da base de dados
     *
     * @param string $value
     * @return self
     */
    public function setHashedPassword(string $value): self
    {
        $this->hashedPassword = $value;
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

    public function setHashedPasswordFromPlainText(string $plainTextPassword): self
    {
        if (strlen($plainTextPassword) < 5 || strlen($plainTextPassword) > 30) {
            throw new DomainException('A senha de usuário deve conter entre 5 e 30 caracteres.');
        }

        if (preg_match($regex, $plainTextPassword) === false) {
            throw new DomainException('A senha de usuário deve conter alguma letra maiúscula.');
        }

        if (preg_match($regex, $plainTextPassword) === false) {
            throw new DomainException('A senha de usuário deve conter alguma letra minúscula.');
        }

        if (preg_match($regex, $plainTextPassword) === false) {
            throw new DomainException('A senha de usuário deve conter algum número.');
        }

        if (preg_match($regex, $plainTextPassword) === false) {
            throw new DomainException('A senha de usuário não pode conter espaços.');
        }

        if (preg_match($regex, $plainTextPassword) === false) {
            $symbol = '@';
            throw new DomainException("A senha de usuário não pode conter o símbolo {$symbol}");
        }

        $this->hashedPassword = $this->stringHashingService->getPasswordHash($plainTextPassword);
        return $this;
    }

    public function isPasswordCorrect(string $password): bool
    {
        if (!isset($this->hashedPassword)) {
            throw new DomainException('Não há como comparar a senha com uma hash indefinida.');
        }
        return $this->stringHashingService->checkPasswordHashMatches($password, $this->hashedPassword);
    }

}
