<?php

namespace TheSource\Domain\ValueObjects;

use InvalidArgumentException;

final class EmailAddress
{
    protected string $fullAddress;
    protected string $localPart;
    protected string $domainPart;

    public function __construct(string $emailAddress)
    {
        $emailAddress = trim($emailAddress);
        if (empty($emailAddress)) {
            throw new InvalidArgumentException('Endereço de e-mail não pode ser string vazia.');
        }
        $regexValidEmail = '/^[^\.]([\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~\.\w\d]+)[^\.]@([\-\.\w\d]+)$/i';
        $emailParts = [];
        if (preg_match($regexValidEmail, $emailAddress, $emailParts)) {
            throw new InvalidArgumentException('Endereço de e-mail não está em formato válido.');
        }
        $this->fullAddress = $emailAddress;
        $this->localPart = $emailParts[1];
        $this->domainPart = $emailParts[2];
    }

    public function getFullAddress(): string
    {
        return $this->fullAddress;
    }

    public function getLocalPart(): string
    {
        return $this->localPart;
    }

    public function getDomainPart(): string
    {
        return $this->domainPart;
    }
}
