<?php

namespace TheSource\Domain\Entities;

use DateTime;
use TheSource\Domain\Contracts\Entity;
use TheSource\Domain\Contracts\Exceptions\EntityNotFoundException;
use TheSource\Domain\Contracts\Repositories\ProductCategory\ProductCategoryQueriesRepository;

class ProductCategory extends Entity
{
    protected string $name;
    protected ?DateTime $createdAt = null;
    protected ?DateTime $updatedAt = null;


    public function toArray(): array
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'createdAt' => $this->createdAt?->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updatedAt?->format('Y-m-d H:i:s'),
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
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

    public function isNameAlreadyInUse(ProductCategoryQueriesRepository $repository, string $name): bool
    {
        try {
            $repository->findByName($name);
            return true;
        } catch (EntityNotFoundException $notFoundEx) {
            return false;
        }
    }
}
