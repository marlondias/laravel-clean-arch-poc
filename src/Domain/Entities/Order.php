<?php

namespace TheSource\Domain\Entities;

use DateTime;
use InvalidArgumentException;
use stdClass;
use TheSource\Domain\Contracts\Entity;
use TheSource\Domain\Contracts\Exceptions\EntityNotFoundException;
use TheSource\Domain\Contracts\Repositories\Order\OrderQueriesRepository;

class Order extends Entity
{
    protected int $customerId;
    protected string $invoiceNumber;
    protected string $destinationAddress;
    protected ?DateTime $shippedAt = null;
    protected ?DateTime $deliveredAt = null;
    protected ?DateTime $createdAt = null;
    protected ?DateTime $updatedAt = null;


    public function toArray(): array
    {
        //TODO
        return [];
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    public function getDestinationAddress(): string
    {
        return $this->destinationAddress;
    }

    public function getShippedAt(): ?DateTime
    {
        return $this->shippedAt;
    }

    public function getDeliveredAt(): ?DateTime
    {
        return $this->deliveredAt;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setCustomerId(int $id): self
    {
        if ($id < 1) {
            throw new InvalidArgumentException('Customer ID must be positive number.');
        }
        $this->customerId = $id;
        return $this;
    }

    public function setInvoiceNumber(string $value): self
    {
        $value = trim($value);
        $regex = '/^\n{4}\-\n{4}\-\n{1}/'; //9999-9999-9
        if (preg_match($regex, $value) === false) {
            throw new InvalidArgumentException('Invoice number must be in format like "9999-9999-9".');
        }
        $this->invoiceNumber = $value;
        return $this;
    }

    public function setDestinationAddress(string $value): self
    {
        $value = trim($value);
        if (empty($value)) {
            throw new InvalidArgumentException('Destination address must not be empty.');
        }
        $this->destinationAddress = $value;
        return $this;
    }

    public function setShippedAt(string $dateTimeYMD): self
    {
        $shippedAt = DateTime::createFromFormat('Y-m-d H:i:s', $dateTimeYMD);
        if (!is_object($shippedAt)) {
            throw new InvalidArgumentException('Could not parse argument as timestamp for "ShippedAt".');
        }
        $this->shippedAt = $shippedAt;
        return $this;
    }

    public function setDeliveredAt(string $dateTimeYMD): self
    {
        if (!isset($this->shippedAt)) {
            throw new InvalidArgumentException('Cannot set "DeliveredAt" when order has no value for "ShippedAt".');
        }
        $deliveredAt = DateTime::createFromFormat('Y-m-d H:i:s', $dateTimeYMD);
        if (!is_object($shippedAt)) {
            throw new InvalidArgumentException('Could not parse argument as timestamp for "DeliveredAt".');
        }
        if ($deliveredAt < $this->shippedAt) {
            throw new InvalidArgumentException('Timestamp for "DeliveredAt" cannot be before "ShippedAt".');
        }
        $this->deliveredAt = $deliveredAt;
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

    public function isInvoiceNumberAlreadyInUse(OrderQueriesRepository $repository, string $invoiceNumber): bool
    {
        try {
            $repository->findByInvoiceNumber($invoiceNumber);
            return true;
        } catch (EntityNotFoundException $notFoundEx) {
            return false;
        }
    }
}
