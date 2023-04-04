<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Partenaire;

#[TargetEntity(entityName: Partenaire::class)]
class PartenaireRepository extends AbstractRepository
{

}