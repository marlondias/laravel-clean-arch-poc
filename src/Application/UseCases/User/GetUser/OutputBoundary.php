<?php

namespace TheSource\Application\UseCases\User\GetUser;

use TheSource\Application\Contracts\UseCaseOutputBoundary;
use TheSource\Domain\Entities\User;

final class OutputBoundary implements UseCaseOutputBoundary
{
    private string $message = '';
    private User $user;

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
        return [
            'user' => $this->user->toArray(),
        ];
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }
}
