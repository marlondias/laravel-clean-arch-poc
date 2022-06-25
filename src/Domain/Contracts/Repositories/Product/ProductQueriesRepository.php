<?php

namespace TheSource\Domain\Contracts\Repositories\Product;

use TheSource\Domain\Contracts\Exceptions\EntityNotFoundException;
use TheSource\Domain\Contracts\Repositories\QueriesRepository;
use TheSource\Domain\Entities\Product;

interface ProductQueriesRepository extends QueriesRepository
{
    /**
     * @param integer $id
     * @return Product
     * @throws EntityNotFoundException
     */
    public function findById(int $id): Product;

    /**
     * @param string $barCode
     * @return Product
     * @throws EntityNotFoundException
     */
    public function findByBarCode(string $barCode): Product;

    /**
     * @param integer $id
     * @return Product[]
     */
    public function findByProductCategoryId(int $id): array;

    /**
     * @param string $name
     * @return Product[]
     */
    public function findByName(string $name): array;

    /**
     * @param string[] $terms
     * @return Product[]
     */
    public function findByNameTerms(array $terms): array;
}
