<?php
namespace TheSource\Domain\Contracts\Services;

interface StringHashingService
{

    // public function getWeakHash(string $originalValue): string;

    // public function getRegularHash(string $originalValue): string;

    // public function getStrongHash(string $originalValue): string;

    public function getPasswordHash(string $password): string;

    // public function checkWeakHashMatches(string $originalValue): string;

    // public function checkRegularHashMatches(string $originalValue): string;

    // public function checkStrongHashMatches(string $originalValue): string;

    public function checkPasswordHashMatches(string $password, string $hashedPassword): bool;

}
