<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\CategorieProduit;

#[TargetEntity(entityName: CategorieProduit::class)]
class CategoriesProduitsRepository extends AbstractRepository
{

}