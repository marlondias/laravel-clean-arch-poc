<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use TheSource\Domain\Contracts\Services\StringHashingService;

final class StringHashingServiceImpl implements StringHashingService
{
    public function getPasswordHash(string $password): string
    {
        return Hash::make($password);
    }

    public function checkPasswordHashMatches(string $password, string $hashedPassword): bool
    {
        return Hash::check($password, $hashedPassword);
    }
}
