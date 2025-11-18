<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
           $this->forge->addField([
       'id' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
    ],
      'email' => [
        'type'       => 'VARCHAR',
        'constraint' => 255,
        'null'       => false,
    ],
        'password_hash' => [
        'type'       => 'VARCHAR',
        'constraint' => 255,
        'null'       => false,
    ],
        'type' => [
        'type'       => 'VARCHAR',
        'constraint' => 50,
        'default'    => 'client',
        'null'       => false,
    ],
        'gender' => [
        'type'       => 'VARCHAR',
        'constraint' => 20,
        'null'       => true,
    ],
            'created_at' => [
        'type' => 'DATETIME',
        'null' => true,
    ],
    'updated_at' => [
        'type' => 'DATETIME',
        'null' => true,
    ],
    // Soft Delete
    'deleted_at' => [
        'type' => 'DATETIME',
        'null' => true,
    ],
    ]);

$this->forge->addKey('id', true);
$this->forge->addUniqueKey('email');
$this->forge->createTable('users',true);


    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
