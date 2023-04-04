<?php

namespace Attributes;

use Attribute;

#[Attribute]
class UsesEntity
{
    private bool $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

}