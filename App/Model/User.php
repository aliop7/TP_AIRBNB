<?php 

namespace App\Model;

use Core\Model\Model;
use DateTime;

class User extends Model
{
    public int $id;
    public string $email;
    public string $password;
    public string $lastname;
    public string $firstname;
    public string $phone;
    public int $address_id;
}