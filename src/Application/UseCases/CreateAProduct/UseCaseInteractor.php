<?php

namespace TheSource\Application\UseCases\CreateAProduct;

use TheSource\Application\UseCases\Contracts\UseCaseInteractorInterface;
use TheSource\Domain\Contracts\Repositories\ProductRepository;
use TheSource\Domain\Entities\Product;

class UseCaseInteractor
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $product = new Product();
        $wasInserted = $this->productRepository->insertProduct($product);
        $output = new OutputBoundary();
        $output->setWasInserted($wasInserted);
        return $output;
    }

}
