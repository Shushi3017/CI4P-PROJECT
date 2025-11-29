<?php
namespace App\Models;

use CodeIgniter\Model;

class BoardDetailModel extends Model
{
    protected $table = 'boarddetail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['board_id','game_id','created_at','deleted_at'];
}
