<?php

namespace TheSource\Domain\Contracts\Repositories\Customer;

use TheSource\Domain\Contracts\Exceptions\EntityNotFoundException;
use TheSource\Domain\Contracts\Repositories\QueriesRepository;
use TheSource\Domain\Entities\Customer;
use TheSource\Domain\ValueObjects\EmailAddress;

interface CustomerQueriesRepository extends QueriesRepository
{
    /**
     * @param integer $id
     * @return Customer
     * @throws EntityNotFoundException
     */
    public function findById(int $id): Customer;

    /**
     * @param string $email
     * @return Customer
     * @throws EntityNotFoundException
     */
    public function findByEmail(EmailAddress $email): Customer;
}
