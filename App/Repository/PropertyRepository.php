<?php

namespace App\Repository;

use App\Model\Property;
use App\AppRepoManager;
use Core\Repository\Repository;

class PropertyRepository extends Repository
{
  public function getTableName(): string
  {
    return 'properties';
  }

  public function getAllProperties($whereIsActive = true): array
  {
    $query = sprintf('SELECT * FROM `%s` WHERE `is_active` = :whereIsActive', $this->getTableName());

    $stmt = $this->pdo->prepare($query);

    $stmt->execute(['whereIsActive' => $whereIsActive]);

    $fetchAllResult = $stmt->fetchAll();

    return $fetchAllResult ? array_map(fn($row_data) => $this->hydrateProperty(new Property($row_data)), $fetchAllResult) : [];
  }

  public function getProperty(int $id) : ?Property
  {
    $query = sprintf('SELECT * FROM `%s` WHERE `id` = :id', $this->getTableName());

    $stmt = $this->pdo->prepare($query);

    $stmt->execute(['id' => $id]);

    $fetchResult = $stmt->fetch();

    return $fetchResult ? $this->hydrateProperty(new Property($fetchResult)) : null;
  }

  public function insertProperty(array $data): ?Property
  {
    $data = array_merge($data, [ 'address_id' => 1 ]);

    $query = sprintf('INSERT INTO `%s` (`title`, `description`, `price_per_night`, `rooms`, `beds`, `baths`, `max_guests`, `is_active`, `property_type_id`, `user_id`, `address_id`) 
                  VALUES (:title, :description, :price_per_night, :rooms, :beds, :baths, :max_guests, :is_active, :property_type_id, :user_id, :address_id)', $this->getTableName());

    $stmt = $this->pdo->prepare($query);

    $stmt->execute([
      'title' => $data['title'],
      'description' => $data['description'],
      'price_per_night' => $data['price_per_night'],
      'rooms' => $data['rooms'],
      'beds' => $data['beds'],
      'baths' => $data['baths'],
      'max_guests' => $data['max_guests'],
      'is_active' => $data['is_active'],
      'property_type_id' => $data['property_type_id'],
      'user_id' => $data['user_id'],
      'address_id' => $data['address_id']
    ]);

    $id = $this->pdo->lastInsertId();

    return $this->readById(Property::class, $id);
  }

  public function getPropertyByuser(int $id) : array
  {
    $query = sprintf('SELECT * FROM `%s` WHERE `user_id` = :user_id', $this->getTableName());

    $stmt = $this->pdo->prepare($query);

    $stmt->execute(['user_id' => $id]);

    $fetchAllResult = $stmt->fetchAll();

    return $fetchAllResult ? array_map(fn($row_data) => new Property($row_data), $fetchAllResult) : [];
  }

  public function deleteProperty(int $id) : void
  {
    $query = sprintf('DELETE FROM `%s` WHERE `id` = :id', $this->getTableName());

    $stmt = $this->pdo->prepare($query);

    $stmt->execute(['id' => $id]);
  }

  private function hydrateProperty(Property $property): Property
  {
    $rm = AppRepoManager::getRm();

    $property->type = $rm->getPropertyTypeRepository()->getPropertyType($property->propertyTypeId);
    $property->images = $rm->getPropertyImagesRepository()->getImages($property->id);
    $property->user = $rm->getUserRepository()->findUserByID($property->userId);
    $property->address = $rm->getAddressRepository()->getAddress($property->addressId);

    return $property;
  }
}