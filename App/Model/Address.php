<?php

namespace App\Model;

use Core\Model\Model;

class Address extends Model
{
  public int $id;
  public string $address;
  public string $zipCode;
  public string $city;
  public string $country;

  public function __construct(array $data)
  {
    $this->id = $data['id'];
    $this->address = $data['address'];
    $this->zipCode = $data['zip_code'];
    $this->city = $data['city'];
    $this->country = $data['country'];
  }
}