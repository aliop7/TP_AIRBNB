<?php 

namespace App\Model;

use Core\Model\Model;

class PropertyType extends Model
{
    public int $id;
    public string $label;
    public bool $is_active;
}