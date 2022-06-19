<?php

namespace TheSource\Domain\Contracts\Repositories;

interface QueriesRepository
{

    /**
     * In CQRS context, there must be a complimentary repository with
     * all the commands for the same aggregate root.
     *
     * @return CommandsRepository
     */
    public function getRelatedCommandsRepository(): CommandsRepository;
}
