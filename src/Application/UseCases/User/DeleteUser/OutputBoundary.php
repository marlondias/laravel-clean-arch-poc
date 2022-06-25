<?php

namespace TheSource\Application\UseCases\User\DeleteUser;

use TheSource\Application\Contracts\UseCaseOutputBoundary;

final class OutputBoundary implements UseCaseOutputBoundary
{
    private string $message = '';

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [];
    }
}
