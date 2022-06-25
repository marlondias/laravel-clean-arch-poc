<?php

namespace TheSource\Application\UseCases\User\UpdateUser;

use Exception;
use InvalidArgumentException;
use TheSource\Application\Contracts\UseCaseInputBoundary;

final class InputBoundary implements UseCaseInputBoundary
{
    protected int $userId;
    protected ?string $firstName = null;
    protected ?string $lastName = null;
    protected ?string $emailAddress = null;
    protected ?string $password = null;

    public function __construct(int $userId, array $changedAttributes)
    {
        $this->userId = $userId;
        $keys = array_keys($changedAttributes);
        $someValidKeyWasPassed = false;

        if (in_array('firstName', $keys)) {
            $value = $changedAttributes['firstName'];
            if (!is_string($value)) {
                throw new InvalidArgumentException('When attribute "firstName" is present, the value must be a string.');
            }
            $someValidKeyWasPassed = true;
            $this->firstName = $value;
        }

        if (in_array('lastName', $keys)) {
            $value = $changedAttributes['lastName'];
            if (!is_string($value)) {
                throw new InvalidArgumentException('When attribute "lastName" is present, the value must be a string.');
            }
            $someValidKeyWasPassed = true;
            $this->lastName = $value;
        }

        if (in_array('emailAddress', $keys)) {
            $value = $changedAttributes['emailAddress'];
            if (!is_string($value)) {
                throw new InvalidArgumentException('When attribute "emailAddress" is present, the value must be a string.');
            }
            $someValidKeyWasPassed = true;
            $this->emailAddress = $value;
        }

        if (in_array('password', $keys)) {
            $value = $changedAttributes['password'];
            if (!is_string($value)) {
                throw new InvalidArgumentException('When attribute "password" is present, the value must be a string.');
            }
            $someValidKeyWasPassed = true;
            $this->password = $value;
        }

        if (!$someValidKeyWasPassed) {
            throw new Exception('None of the attribute keys are relevant for updating a User.');
        }
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName ?? null;
    }

    public function getLastName(): ?string
    {
        return $this->lastName ?? null;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress ?? null;
    }

    public function getPassword(): ?string
    {
        return $this->password ?? null;
    }

}
