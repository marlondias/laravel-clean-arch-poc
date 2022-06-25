<?php

namespace TheSource\Domain\Contracts\Repositories\ProductCategory;

use Exception;
use TheSource\Domain\Contracts\Repositories\CommandsRepository;
use TheSource\Domain\Entities\ProductCategory;

interface ProductCategoryCommandsRepository extends CommandsRepository
{
    /**
     * @param ProductCategory $productCategory
     * @return void
     * @throws Exception
     */
    public function insert(ProductCategory $productCategory): void;

    /**
     * @param ProductCategory $productCategory
     * @return void
     * @throws Exception
     */
    public function update(ProductCategory $productCategory): void;

    /**
     * @param integer $id
     * @return void
     * @throws Exception
     */
    public function deleteById(int $id): void;

    /**
     * @param ProductCategory $productCategory
     * @return void
     * @throws Exception
     */
    public function deleteByEntity(ProductCategory $productCategory): void;
}
