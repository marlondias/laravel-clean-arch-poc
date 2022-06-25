<?php

namespace TheSource\Application\UseCases\User\UpdateUser;

use TheSource\Application\Contracts\UseCaseInteractor;
use TheSource\Domain\Contracts\Repositories\User\UserCommandsRepository;
use TheSource\Domain\Contracts\Repositories\User\UserQueriesRepository;
use TheSource\Domain\Contracts\Services\StringHashingService;
use TheSource\Domain\Entities\User;

final class DeleteUserUseCase implements UseCaseInteractor
{
    private UserCommandsRepository $userCommandsRepository;
    private UserQueriesRepository $userQueriesRepository;
    private StringHashingService $stringHashingService;

    public function __construct(
        UserCommandsRepository $userCommandsRepository,
        UserQueriesRepository $userQueriesRepository,
        StringHashingService $stringHashingService
    ) {
        $this->userCommandsRepository = $userCommandsRepository;
        $this->userQueriesRepository = $userQueriesRepository;
        $this->stringHashingService = $stringHashingService;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $user = $this->userQueriesRepository->findById($input->getUserId());
        $this->replaceUserAttributes($input, $user);
        $this->userCommandsRepository->update($user);
        return new OutputBoundary("Usuário {$input->getUserId()} atualizado!");
    }

    private function replaceUserAttributes(InputBoundary $input, User $user): void
    {
        if (!is_null($input->getEmailAddress())) {
            $user->setEmailAddress($input->getEmailAddress());
        }
        if (!is_null($input->getPassword())) {
            $user->setHashedPasswordFromPlainText($this->stringHashingService, $input->getPassword());
        }
        $newFirstName = $input->getFirstName();
        $newLastName = $input->getLastName();
        if (!is_null($newFirstName) || !is_null($newLastName)) {
            $oldName = $user->getPersonName();
            $user->setPersonName(
                $newFirstName ?? $oldName->getFirstName(),
                $newLastName ?? $oldName->getLastName()
            );
        }
    }
}
