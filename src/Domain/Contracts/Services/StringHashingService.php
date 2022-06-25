<?php

namespace TheSource\Domain\Contracts\Services;

interface StringHashingService
{

    public function getPasswordHash(string $password): string;

    public function checkPasswordHashMatches(string $password, string $hashedPassword): bool;
}
