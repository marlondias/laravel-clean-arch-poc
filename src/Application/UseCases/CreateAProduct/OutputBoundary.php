<?php

namespace TheSource\Application\UseCases\CreateAProduct;

use TheSource\Application\UseCases\Contracts\OutputBoundaryInterface;

class OutputBoundary implements OutputBoundaryInterface
{
    protected int $insertedId;

    public function setInsertedId(int $value)
    {
        $this->insertedId = $value;
    }

    public function toArray(): array
    {
        return [
            'insertedId' => $this->insertedId
        ];
    }

}
