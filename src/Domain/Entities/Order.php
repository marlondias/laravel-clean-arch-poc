<?php

namespace TheSource\Domain\Entities;

use DateTime;
use InvalidArgumentException;
use stdClass;
use TheSource\Domain\Contracts\Entity;

class Order extends Entity
{
    protected int $customerId; //TODO: fk
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

    public function toObject(): stdClass
    {
        //TODO
        return new stdClass();
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

    public function setCustomerId(int $value): self
    {
        if ($value < 1) {
            throw new InvalidArgumentException('Foreign ID must be positive integer.');
        }
        $this->customerId = $value;
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
            throw new InvalidArgumentException('Destination address must cannot be empty.');
        }
        $this->destinationAddress = $value;
        return $this;
    }

    public function setShippedAt(DateTime $value): self
    {
        $this->shippedAt = $value;
        return $this;
    }

    public function setDeliveredAt(DateTime $value): self
    {
        // TIP: This is a smart setter method, ensures consistency
        if (!isset($this->shippedAt)) {
            throw new InvalidArgumentException('Cannot set "DeliveredAt" when order has no value for "ShippedAt".');
        }
        if ($value < $this->shippedAt) {
            throw new InvalidArgumentException('DateTime for "DeliveredAt" cannot be before "ShippedAt".');
        }
        $this->deliveredAt = $value;
        return $this;
    }

    public function setCreatedAt(DateTime $value): self
    {
        $this->createdAt = $value;
        return $this;
    }

    public function setUpdatedAt(DateTime $value): self
    {
        $this->updatedAt = $value;
        return $this;
    }

}
