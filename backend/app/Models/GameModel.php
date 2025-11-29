<?php

namespace App\Models;

use CodeIgniter\Model;

class GameModel extends Model
{
    protected $table      = 'games';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'description',
        'image',
        'genre',
        'platform',
        'release_year',
        'created_at',
        'updated_at'
    ];
protected $returnType = 'App\Entities\Game';
protected $useTimestamps = true;

}
