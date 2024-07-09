<?php

namespace App\Repository;

use App\Model\PropertyType;
use Core\Repository\Repository;

class PropertyTypeRepository extends Repository
{
  public function getTableName(): string
  {
    return 'property_types';
  }

  public function getAllPropertyType(): array
  {
    $query = sprintf('SELECT * FROM `%s`', $this->getTableName());

    $stmt = $this->pdo->query($query);

    $fetchAllResult = $stmt->fetchAll();

    return $fetchAllResult ? array_map(fn($row_data) => (new PropertyType($row_data)), $fetchAllResult) : [];
  }

  public function getPropertyType(int $id)
  {
    $query = sprintf(
        'SELECT * FROM `%s` WHERE `id` = :id',
        $this->getTableName()
    );

    $stmt = $this->pdo->prepare($query);

    if($stmt)
    {
      $stmt->execute(['id' => $id]);

      $result = $stmt->fetch();

      return new PropertyType($result);
    }
  }
}