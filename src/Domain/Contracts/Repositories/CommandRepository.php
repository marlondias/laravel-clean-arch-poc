<?php

namespace TheSource\Domain\Contracts\Repositories;

interface CommandRepository
{

    /**
     * In CQRS context, there must be a complimentary repository with
     * all the queries for the same aggregate root.
     *
     * @return QueryRepository
     */
    public function getRelatedQueriesRepository(): QueryRepository;
}
