<?php

namespace TheSource\Domain\Contracts\Repositories\Order;

use Exception;
use TheSource\Domain\Contracts\Repositories\CommandsRepository;
use TheSource\Domain\Entities\Order;

interface OrderCommandsRepository extends CommandsRepository
{
    /**
     * @param Order $order
     * @return void
     * @throws Exception
     */
    public function insert(Order $order): void;

    /**
     * @param Order $order
     * @return void
     * @throws Exception
     */
    public function update(Order $order): void;

    /**
     * @param integer $id
     * @return void
     * @throws Exception
     */
    public function deleteById(int $id): void;

    /**
     * @param Order $order
     * @return void
     * @throws Exception
     */
    public function deleteByEntity(Order $order): void;
    //TODO
}
