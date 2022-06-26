<?php

namespace TheSource\Application\UseCases\User\GetAllUsers;

use TheSource\Application\Contracts\UseCaseInteractor;
use TheSource\Domain\Contracts\Repositories\User\UserQueriesRepository;

final class GetAllUsersUseCase implements UseCaseInteractor
{
    private UserQueriesRepository $userQueriesRepository;

    public function __construct(
        UserQueriesRepository $userQueriesRepository,
    ) {
        $this->userQueriesRepository = $userQueriesRepository;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $users = $this->userQueriesRepository->getAll();
        if (empty($users)) {
            return new OutputBoundary("Nenhum usuário encontrado!");
        }
        $output = new OutputBoundary(count($users) . ' usuários encontrados!');
        foreach ($users as $user) {
            $output->addUser($user);
        }
        return $output;
    }
}
