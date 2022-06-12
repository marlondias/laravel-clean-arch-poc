<?php

namespace TheSource\Domain\Contracts\Repositories;

use TheSource\Domain\Entities\Product;

interface ProductRepository
{
    /**
     * @param integer $amount
     * @return Product[]
     */
    public function getRandomProducts(int $amount): array;

    public function insertProduct(Product $product): int;
}
