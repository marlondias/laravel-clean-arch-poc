<?php

namespace TheSource\Domain\Entities;

use DateTime;
use InvalidArgumentException;
use stdClass;
use TheSource\Domain\Contracts\Entity;
use TheSource\Domain\Contracts\Exceptions\EntityNotFoundException;
use TheSource\Domain\Contracts\Repositories\Product\ProductQueriesRepository;

class Product extends Entity
{
    protected int $productCategoryId;
    protected string $barCode;
    protected string $name;
    protected ?DateTime $createdAt = null;
    protected ?DateTime $updatedAt = null;


    public function toArray(): array
    {
        return [
            'id' => $this->id ?? null,
            'productCategoryId' => $this->productCategoryId ?? null,
            'name' => $this->name ?? null,
            'barCode' => $this->barCode ?? null,
            'createdAt' => $this->createdAt?->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updatedAt?->format('Y-m-d H:i:s'),
        ];
    }

    public function setProductCategoryId(int $id): self
    {
        if ($id < 1) {
            throw new InvalidArgumentException('ID de categoria do produto não pode ser nulo ou negativo.');
        }
        $this->productCategoryId = $id;
        return $this;
    }

    public function setName(string $name): self
    {
        $name = trim($name);
        if (empty($name)) {
            throw new InvalidArgumentException('Nome do produto não pode ser string vazia.');
        }
        $this->name = $name;
        return $this;
    }

    public function setBarCode(string $barCode): self
    {
        $barCode = trim($barCode);
        if (empty($barCode)) {
            throw new InvalidArgumentException('Código de barras do produto não pode ser string vazia.');
        }
        $this->barCode = $barCode;
        return $this;
    }

    public function setCreatedAt(string $dateTimeYMD): self
    {
        $this->createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $dateTimeYMD);
        return $this;
    }

    public function setUpdatedAt(string $dateTimeYMD): self
    {
        $this->updatedAt = DateTime::createFromFormat('Y-m-d H:i:s', $dateTimeYMD);
        return $this;
    }

    public function isBarCodeAlreadyInUse(ProductQueriesRepository $repository, string $barCode): bool
    {
        try {
            $repository->findByBarCode($barCode);
            return true;
        } catch (EntityNotFoundException $notFoundEx) {
            return false;
        }
    }
}
