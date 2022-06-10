<?php

namespace App\Repositories;

use TheSource\Domain\Contracts\Repositories\ProductRepository;
use TheSource\Domain\Entities\Product;

class ProductRepositoryImpl implements ProductRepository
{
    /**
     * @param integer $amount
     * @return Product[]
     */
    public function getRandomProducts(int $amount): array
    {
        $products = [];
        while ($amount > 0) {
            $products[] = new Product();
            $amount--;
        }
        return $products;
    }

    public function insertProduct(Product $product): bool
    {
        return boolval(mt_rand(0, 1));
    }

}

