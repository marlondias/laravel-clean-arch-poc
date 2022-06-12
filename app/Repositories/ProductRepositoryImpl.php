<?php

namespace App\Repositories;

use App\Repositories\Traits\CachesMethodReturnsTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use TheSource\Domain\Contracts\Repositories\ProductRepository;
use TheSource\Domain\Entities\Product;

class ProductRepositoryImpl implements ProductRepository
{
    use CachesMethodReturnsTrait;

    public function getRandomProducts(int $amount): array
    {
        $products = [];
        while ($amount > 0) {
            $products[] = new Product();
            $amount--;
        }
        return $products;
    }

    public function insertProduct(Product $product): int
    {
        $id = DB::table('products')->insertGetId([
            'name' => $product->getName(),
            'bar_code' => $product->getBarCode(),
            'type' => $product->getType(),
        ])





        $inputVariant = json_encode($product);
        $cacheKey = $this->getCacheKey(__FUNCTION__, $inputVariant);

        $cachedValue = Cache::store('database2')->get($cacheKey);
        if (!is_null($cachedValue)) {
            return $cachedValue;
        }

        sleep(1);
        $fakeId = mt_rand(1000, 9999);
        Cache::store('database2')->put($cacheKey, $fakeId, 15);

        return $fakeId;
    }

}
