<?php

namespace Attributes;


use Attribute;

#[Attribute]

class DefaultEntity
{
    private string $entityName;

    public function __construct($entityName)
    {
        $this->entityName = $entityName;
    }

}