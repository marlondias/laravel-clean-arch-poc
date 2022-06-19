<?php

namespace TheSource\Domain\Contracts;

abstract class Entity
{
    protected int $id;

    public function getId(): ?int
    {
        return isset($this->id) ? $this->id : null;
    }

    public function setId(int $value): self
    {
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
