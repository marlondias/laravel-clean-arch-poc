<?php

namespace TheSource\Application\UseCases\User\GetUser;

use TheSource\Application\Contracts\UseCaseInteractor;
use TheSource\Domain\Contracts\Repositories\User\UserQueriesRepository;

final class GetUserUseCase implements UseCaseInteractor
{
    private UserQueriesRepository $userQueriesRepository;

    public function __construct(
        UserQueriesRepository $userQueriesRepository,
    ) {
        $this->userQueriesRepository = $userQueriesRepository;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $user = $this->userQueriesRepository->findById($input->getUserId());
        $output = new OutputBoundary("Usuário encontrado!");
        $output->setUser($user);
        return $output;
    }

}
