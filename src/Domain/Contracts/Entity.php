<?php

namespace TheSource\Domain\Contracts;

use stdClass;

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

    abstract public function toArray(): array;

}
