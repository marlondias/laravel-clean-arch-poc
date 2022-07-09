<?php

namespace TheSource\Domain\Contracts\Repositories\User;

use Exception;
use TheSource\Domain\Contracts\Repositories\CommandsRepository;
use TheSource\Domain\Entities\User;

interface UserCommandsRepository extends CommandsRepository
{

    /**
     * @param User $user
     * @return void
     * @throws Exception
     */
    public function insert(User $user): void;

    /**
     * @param User $user
     * @return void
     * @throws Exception
     */
    public function update(User $user): void;

    /**
     * @param integer $id
     * @return void
     * @throws Exception
     */
    public function deleteById(int $id): void;

}
