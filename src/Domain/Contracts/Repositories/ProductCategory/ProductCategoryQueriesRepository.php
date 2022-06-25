<?php

namespace TheSource\Domain\Contracts\Repositories\ProductCategory;

use TheSource\Domain\Contracts\Exceptions\EntityNotFoundException;
use TheSource\Domain\Contracts\Repositories\QueriesRepository;
use TheSource\Domain\Entities\ProductCategory;

interface ProductCategoryQueriesRepository extends QueriesRepository
{
    /**
     * @param integer $id
     * @return ProductCategory
     * @throws EntityNotFoundException
     */
    public function findById(int $id): ProductCategory;

    /**
     * @param string $name
     * @return ProductCategory
     * @throws EntityNotFoundException
     */
    public function findByName(string $name): ProductCategory;
}
