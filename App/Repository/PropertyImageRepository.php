<?php

namespace App\Repository;

use App\Model\PropertyImage;
use Core\Repository\Repository;

class PropertyImageRepository extends Repository
{
  public function getTableName(): string
  {
    return 'property_images';
  }

  public function getImages(int $propertyID): array
  {
    $query = sprintf('SELECT * FROM `%s` WHERE `property_id` = :id', $this->getTableName());

    $stmt = $this->pdo->prepare($query);

    $stmt->execute(['id' => $propertyID]);

    return $stmt ? array_map(fn($row_data) => new PropertyImage($row_data), $stmt->fetchAll()) : [];
  }
}