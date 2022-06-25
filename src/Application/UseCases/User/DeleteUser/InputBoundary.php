<?php

namespace TheSource\Application\UseCases\User\DeleteUser;

use TheSource\Application\Contracts\UseCaseInputBoundary;

final class InputBoundary implements UseCaseInputBoundary
{
    protected int $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
