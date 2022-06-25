<?php

namespace TheSource\Application\UseCases\User\CreateUser;

use TheSource\Application\Contracts\UseCaseInputBoundary;

final class InputBoundary implements UseCaseInputBoundary
{
    protected string $firstName;
    protected string $lastName;
    protected string $emailAddress;
    protected string $password;

    public function __construct(
        string $firstName,
        string $lastName,
        string $emailAddress,
        string $password
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->emailAddress = $emailAddress;
        $this->password = $password;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function toArray(): array
    {
        return [
            'firstName' => $this->firstName ?? null,
            'lastName' => $this->lastName ?? null,
            'emailAddress' => $this->emailAddress ?? null,
            'password' => $this->password ?? null,
        ];
    }

}
