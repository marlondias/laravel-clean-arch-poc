<?php

namespace TheSource\Domain\Contracts;

use InvalidArgumentException;
use TheSource\Domain\Contracts\Exceptions\InconsistentEntityException;

abstract class Entity
{
    protected int $id;

    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function setId(int $value): self
    {
        if ($value < 1) {
            throw new InvalidArgumentException('ID da entidade não pode ser nulo ou negativo.');
        }
        $this->id = $value;
        return $this;
    }

    /**
     * Get an array with all relevant properties of this entity.
     *
     * @return array
     */
    abstract public function toArray(): array;

    /**
     * Validate if this entity's properties are consistent with domain rules.
     * Inconsistent entities must be treated with caution or ignored.
     *
     * @return bool
     */
    // abstract public function checkInternalConsistency(): bool;

}
