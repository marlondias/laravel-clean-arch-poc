<?php

namespace TheSource\Application\UseCases\User\CreateUser;

use TheSource\Application\Contracts\UseCaseInteractor;
use TheSource\Domain\Contracts\Repositories\User\UserCommandsRepository;
use TheSource\Domain\Contracts\Services\StringHashingService;
use TheSource\Domain\Entities\User;

final class CreateUserUseCase implements UseCaseInteractor
{
    private UserCommandsRepository $userCommandsRepository;
    private StringHashingService $stringHashingService;

    public function __construct(
        UserCommandsRepository $userCommandsRepository,
        StringHashingService $stringHashingService
    ) {
        $this->userCommandsRepository = $userCommandsRepository;
        $this->stringHashingService = $stringHashingService;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {

        $user = (new User())
            ->setPersonName($input->getFirstName(), $input->getLastName())
            ->setEmailAddress($input->getEmailAddress())
            ->setHashedPasswordFromPlainText($this->stringHashingService, $input->getPassword());

        $this->userCommandsRepository->insert($user);

        return new OutputBoundary('Usuário criado!');
    }

}
