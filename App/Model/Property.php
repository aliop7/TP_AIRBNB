<?php 

namespace App\Model;

use Core\Model\Model;

class Property extends Model
{
  public int $id;
  public string $title;
  public string $description;
  public float $pricePerNight;
  public int $rooms;
  public int $beds;
  public int $baths;
  public int $maxGuests;
  public bool $isActive;
  public int $propertyTypeId;
  public int $userId;
  public int $addressId;

  public PropertyType $type;
  public array $images = [];
  public User $user;
  public Address $address;

  public function __construct(array $data)
  {
    $this->id = $data['id'];
    $this->title = $data['title'];
    $this->description = $data['description'];
    $this->pricePerNight = (float) $data['price_per_night'];
    $this->rooms = (int) $data['rooms'];
    $this->beds = (int) $data['beds'];
    $this->baths = (int) $data['baths'];
    $this->maxGuests = (int) $data['max_guests'];
    $this->isActive = (bool) $data['is_active'];
    $this->propertyTypeId = (int) $data['property_type_id'];
    $this->userId = (int) $data['user_id'];
    $this->addressId = (int) $data['address_id'];
  }
}