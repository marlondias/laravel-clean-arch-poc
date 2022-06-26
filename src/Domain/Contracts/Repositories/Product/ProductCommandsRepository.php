<?php

namespace TheSource\Domain\Contracts\Repositories\Product;

use Exception;
use TheSource\Domain\Contracts\Repositories\CommandsRepository;
use TheSource\Domain\Entities\Product;

interface ProductCommandsRepository extends CommandsRepository
{
    /**
     * @param Product $product
     * @return void
     * @throws Exception
     */
    public function insert(Product $product): void;

    /**
     * @param Product $product
     * @return void
     * @throws Exception
     */
    public function update(Product $product): void;

    /**
     * @param integer $id
     * @return void
     * @throws Exception
     */
    public function deleteById(int $id): void;

    /**
     * @param Product $product
     * @return void
     * @throws Exception
     */
    public function deleteByEntity(Product $product): void;
}
