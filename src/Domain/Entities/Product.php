<?php

namespace TheSource\Domain\Entities;

class Product
{
    protected string $name;
    protected string $barCode;
    protected string $type;

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of barCode
     */
    public function getBarCode()
    {
        return $this->barCode;
    }

    /**
     * Set the value of barCode
     *
     * @return  self
     */
    public function setBarCode($barCode)
    {
        $this->barCode = $barCode;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
