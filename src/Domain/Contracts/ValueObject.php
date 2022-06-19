<?php

namespace TheSource\Domain\Contracts;

interface ValueObject
{
    /**
     * Get an array with all relevant properties of this value-object.
     *
     * @return array
     */
    public function toArray(): array;
}
