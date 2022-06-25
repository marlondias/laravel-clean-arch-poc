<?php

namespace TheSource\Application\UseCases\User\CreateUser;

use Exception;
use TheSource\Application\Contracts\UseCaseInputBoundary;

final class InputBoundary implements UseCaseInputBoundary
{
    protected int $userId;
    protected ?string $firstName;
    protected ?string $lastName;
    protected ?string $emailAddress;
    protected ?string $password;

    public function __construct(int $userId, array $changedAttributes)
    {
        $this->userId = $userId;
        $keys = array_keys($changedAttributes);
        $someValidKeyWasPassed = false;

        if (in_array('firstName', $keys)) {
            $someValidKeyWasPassed = true;
            $this->firstName = $changedAttributes['firstName'];
        }
        if (in_array('lastName', $keys)) {
            $someValidKeyWasPassed = true;
            $this->lastName = $changedAttributes['lastName'];
        }
        if (in_array('emailAddress', $keys)) {
            $someValidKeyWasPassed = true;
            $this->emailAddress = $changedAttributes['emailAddress'];
        }
        if (in_array('password', $keys)) {
            $someValidKeyWasPassed = true;
            $this->password = $changedAttributes['password'];
        }

        if (!$someValidKeyWasPassed) {
            throw new Exception('None of the attribute keys are relevant for updating a User.');
        }
    }

    public function getUserId(): int
    {
        return $this->userId;
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
}
