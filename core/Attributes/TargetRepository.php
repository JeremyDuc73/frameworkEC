<?php

namespace Attributes;

use Attribute;

#[Attribute]
class TargetRepository
{
    private string $repositoryName;

    public function __construct($repositoryName)
    {
        $this->repositoryName = $repositoryName;
    }
}