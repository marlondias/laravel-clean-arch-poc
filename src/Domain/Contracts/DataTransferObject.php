<?php

namespace TheSource\Domain\Contracts;

interface DataTransferObject
{

    /**
     * Uses associative array to set values for properties of this DTO.
     *
     * @param array $fillData
     * @return void
     */
    public function fill(array $fillData): void;

    /**
     * Get an array with all relevant properties of this DTO.
     *
     * @return array
     */
    public function toArray(): array;
}
