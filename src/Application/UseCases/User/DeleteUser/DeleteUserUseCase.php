<?php

namespace TheSource\Application\UseCases\User\DeleteUser;

use TheSource\Application\Contracts\UseCaseInteractor;
use TheSource\Domain\Contracts\Repositories\User\UserCommandsRepository;

final class DeleteUserUseCase implements UseCaseInteractor
{
    private UserCommandsRepository $userCommandsRepository;

    public function __construct(
        UserCommandsRepository $userCommandsRepository,
    ) {
        $this->userCommandsRepository = $userCommandsRepository;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $this->userCommandsRepository->deleteById($input->getUserId());
        return new OutputBoundary("Usuário {$input->getUserId()} deletado!");
    }

}
