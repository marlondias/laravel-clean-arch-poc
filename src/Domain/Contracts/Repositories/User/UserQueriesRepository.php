<?php

namespace TheSource\Domain\Contracts\Repositories\User;

use TheSource\Domain\Contracts\Exceptions\EntityNotFoundException;
use TheSource\Domain\Contracts\Repositories\QueriesRepository;
use TheSource\Domain\Entities\User;
use TheSource\Domain\ValueObjects\EmailAddress;

interface UserQueriesRepository extends QueriesRepository
{

    /**
     * @param integer $id
     * @return User
     * @throws EntityNotFoundException
     */
    public function findById(int $id): User;

    /**
     * @param EmailAddress $emailAddress
     * @return User
     * @throws EntityNotFoundException
     */
    public function findByEmail(EmailAddress $emailAddress): User;

    /**
     * @return User[]
     */
    public function getAll(): array;

}
