<?php

namespace TheSource\Domain\Contracts;

use stdClass;

interface ValueObject
{
    public function toArray(): array;
}
