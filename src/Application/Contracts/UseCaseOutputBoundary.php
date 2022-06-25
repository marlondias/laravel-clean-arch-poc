<?php

namespace TheSource\Application\Contracts;

interface UseCaseOutputBoundary
{

    public function getMessage(): string;

    public function toArray(): array;
}

