<?php

namespace TheSource\Application\UseCases\User\CreateUser;

use DomainException;
use TheSource\Application\Contracts\UseCaseInteractor;
use TheSource\Domain\Contracts\Repositories\User\UserCommandsRepository;
use TheSource\Domain\Contracts\Repositories\User\UserQueriesRepository;
use TheSource\Domain\Contracts\Services\StringHashingService;
use TheSource\Domain\Entities\User;

final class CreateUserUseCase implements UseCaseInteractor
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

        $user = (new User())
            ->setPersonName($input->getFirstName(), $input->getLastName())
            ->setEmailAddress($input->getEmailAddress())
            ->setHashedPasswordFromPlainText($this->stringHashingService, $input->getPassword());

        $isEmailInUse = $user->isEmailAddressAlreadyInUse(
            $this->userQueriesRepository,
            $user->getEmailAddress()
        );

        if ($isEmailInUse) {
            throw new DomainException('Já existe um usuário com o e-mail informado.');
        }

        $this->userCommandsRepository->insert($user);

        return new OutputBoundary('Usuário criado!');
    }

}
