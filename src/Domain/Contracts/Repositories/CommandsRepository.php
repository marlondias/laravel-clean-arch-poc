<?php

namespace TheSource\Domain\Contracts\Repositories;

interface CommandsRepository
{

    /**
     * In CQRS context, there must be a complimentary repository with
     * all the queries for the same aggregate root.
     *
     * @return QueriesRepository
     */
    public function getRelatedQueriesRepository(): QueriesRepository;
}
