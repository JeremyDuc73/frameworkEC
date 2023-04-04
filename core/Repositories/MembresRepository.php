<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Membre;

#[TargetEntity(entityName: Membre::class)]
class MembresRepository extends AbstractRepository
{

}