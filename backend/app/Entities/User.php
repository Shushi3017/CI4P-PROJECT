<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id'       => 'int',
        'age'      => 'int',
        'username' => 'string',
        'firstname'=> 'string',
        'lastname' => 'string',
        'email'    => 'string',
        'type'     => 'string',
        'status'   => 'string',
    ];
}
