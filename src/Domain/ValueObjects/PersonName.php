<?php

namespace TheSource\Domain\ValueObjects;

use InvalidArgumentException;
use TheSource\Domain\Contracts\ValueObject;

final class PersonName implements ValueObject
{
    protected string $firstName;
    protected string $lastName;
    protected string $fullName;

    /**
     * @param string $firstName
     * @param string $lastName
     * @throws InvalidArgumentException
     */
    public function __construct(string $firstName, string $lastName = '')
    {
        $firstName = trim($firstName);
        $lastName = trim($lastName);
        if (empty($firstName)) {
            throw new InvalidArgumentException('Primeiro nome não pode ser string vazia.');
        }
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->fullName = $firstName . (empty($lastName) ? " {$lastName}" : '');
    }

    public function toArray(): array
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'fullName' => $this->fullName,
        ];
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

}
