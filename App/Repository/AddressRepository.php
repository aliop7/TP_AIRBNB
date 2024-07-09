<?php

namespace App\Repository;

use App\Model\Address;
use Core\Repository\Repository;

class AddressRepository extends Repository
{
  public function getTableName(): string
  {
      return 'addresses';
  }

  public function getAddress(int $id) : ?Address
  {
    $query = sprintf('SELECT * FROM `%s` WHERE `id` = :id', $this->getTableName());

    $stmt = $this->pdo->prepare($query);

    $stmt->execute(['id' => $id]);

    $fetchResult = $stmt->fetch();

    return $fetchResult ? new Address($fetchResult) : null ;
  }

  public function insertAddress(array $data) : ?Address
  {
    $query = sprintf('INSERT INTO `%s` (`address`, `zip_code`, `city`, `country`) VALUES (:address, :zip_code, :city, :country)', $this->getTableName());

    $stmt = $this->pdo->prepare($query);

    $stmt->execute([
      'address' => $data['address'],
      'zip_code' => $data['zip_code'],
      'city' => $data['city'],
      'country' => $data['country']
    ]);

    $id = $this->pdo->lastInsertId();

    return $this->readById(Address::class, $id);
  }
}