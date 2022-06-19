<?php

namespace TheSource\Domain\Contracts\Repositories;

interface QueryRepository
{

    /**
     * In CQRS context, there must be a complimentary repository with
     * all the commands for the same aggregate root.
     *
     * @return CommandRepository
     */
    public function getRelatedCommandsRepository(): CommandRepository;
}
