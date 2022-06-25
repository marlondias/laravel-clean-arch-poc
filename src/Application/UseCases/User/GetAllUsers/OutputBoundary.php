<?php

namespace TheSource\Application\UseCases\User\GetAllUsers;

use TheSource\Application\Contracts\UseCaseOutputBoundary;
use TheSource\Domain\Entities\User;

final class OutputBoundary implements UseCaseOutputBoundary
{
    private string $message = '';

    /** @var User[] */
    private array $users = [];

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
            'users' => array_map(function (User $user) {
                return $user->toArray();
            }, $this->users),
        ];
    }

    public function addUser(User $user): self
    {
        $this->users[] = $user;
        return $this;
    }
}
