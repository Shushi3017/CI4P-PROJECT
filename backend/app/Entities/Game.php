<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Game extends Entity
{
    protected $attributes = [
        'id'            => null,
        'name'          => null,
        'description'   => null,
        'image'         => null,
        'genre'         => null,
        'platform'      => null,
        'release_year'  => null,
        'created_at'    => null,
        'updated_at'    => null,
    ];
}
