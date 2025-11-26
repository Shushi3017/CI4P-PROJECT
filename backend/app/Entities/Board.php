<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Board extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id'          => 'int',
        'user_id'     => 'int',
        'name'        => 'string',
        'description' => 'string',
    ];
}
