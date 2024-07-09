<?php

namespace App;

use App\Repository\AddressRepository;
use App\Repository\PropertyImageRepository;
use App\Repository\PropertyRepository;
use App\Repository\PropertyTypeRepository;
use App\Repository\UserRepository;
use Core\Repository\RepositoryManagerTrait;

class AppRepoManager
{
  use RepositoryManagerTrait;

  private UserRepository $userRepository;
  private PropertyRepository $propertyRepository;
  private PropertyTypeRepository $propertyTypeRepository;
  private PropertyImageRepository $propertyImagesRepository;
  private AddressRepository $addressRepository;
  private PropertyImageRepository $propertyImageRepository;

  public function getUserRepository(): UserRepository
  {
      return $this->userRepository;
  }

  public function getPropertyRepository(): PropertyRepository
  {
      return $this->propertyRepository;
  }

  public function getPropertyTypeRepository(): PropertyTypeRepository
  {
      return $this->propertyTypeRepository;
  }

  public function getPropertyImagesRepository(): PropertyImageRepository
  {
    return $this->propertyImageRepository;
  }

  public function getAddressRepository(): AddressRepository
  {
      return $this->addressRepository;
  }

  protected function __construct()
  {
      $config = App::getApp();
      $this->userRepository = new UserRepository($config);
      $this->propertyRepository = new PropertyRepository($config);
      $this->propertyTypeRepository = new PropertyTypeRepository($config);
      $this->propertyImageRepository = new PropertyImageRepository($config);
      $this->addressRepository = new AddressRepository($config);
  }
}