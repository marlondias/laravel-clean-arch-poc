<?php

namespace TheSource\Application\UseCases\CreateAProduct;

use TheSource\Application\UseCases\Contracts\OutputBoundaryInterface;

class OutputBoundary implements OutputBoundaryInterface
{
    protected bool $wasInserted;

    public function toArray(): array
    {
        return [
            'wasInserted' => $this->wasInserted
        ];
    }

    public function setWasInserted(bool $value)
    {
        $this->wasInserted = $value;
    }

}
