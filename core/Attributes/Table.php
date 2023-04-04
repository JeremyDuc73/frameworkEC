<?php

namespace Attributes;

use Attribute;

#[Attribute]
class Table
{

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

}