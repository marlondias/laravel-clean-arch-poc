<?php

namespace TheSource\Domain\Contracts\Repositories\Order;

use TheSource\Domain\Contracts\Exceptions\EntityNotFoundException;
use TheSource\Domain\Contracts\Repositories\QueriesRepository;
use TheSource\Domain\Entities\Order;

interface OrderQueriesRepository extends QueriesRepository
{
    /**
     * @param integer $id
     * @return Order
     * @throws EntityNotFoundException
     */
    public function findById(int $id): Order;

    /**
     * @param integer $id
     * @return Order[]
     */
    public function findByCustomerId(int $id): array;

    /**
     * @param string $id
     * @return Order
     * @throws EntityNotFoundException
     */
    public function findByInvoiceNumber(string $id): Order;
}
