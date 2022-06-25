<?php

namespace TheSource\Domain\Contracts\Repositories\Customer;

use Exception;
use TheSource\Domain\Contracts\Repositories\CommandsRepository;
use TheSource\Domain\Entities\Customer;

interface CustomerCommandsRepository extends CommandsRepository
{
    /**
     * @param Customer $customer
     * @return void
     * @throws Exception
     */
    public function insert(Customer $customer): void;

    /**
     * @param Customer $customer
     * @return void
     * @throws Exception
     */
    public function update(Customer $customer): void;

    /**
     * @param integer $id
     * @return void
     * @throws Exception
     */
    public function deleteById(int $id): void;

    /**
     * @param Customer $customer
     * @return void
     * @throws Exception
     */
    public function deleteByEntity(Customer $customer): void;
}
