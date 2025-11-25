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
        'username' => [
            'type'       => 'VARCHAR',
            'constraint' => 100,
            'null'       => false,
        ],
        'firstname' => [
            'type'       => 'VARCHAR',
            'constraint' => 100,
            'null'       => false,
        ],
        'lastname' => [
            'type'       => 'VARCHAR',
            'constraint' => 100,
            'null'       => false,
        ],
        'age' => [
            'type'       => 'INT',
            'constraint' => 3,
            'null'       => true,
        ],
        'email' => [
            'type'       => 'VARCHAR',
            'constraint' => 255,
            'null'       => false,
        ],
        'password' => [
            'type'       => 'VARCHAR',
            'constraint' => 255,
            'null'       => false,
        ],
        'type' => [
            'type'       => 'ENUM',
            'constraint' => ['user', 'admin'],
            'default'    => 'user',
            'null'       => false,
        ],
        'status' => [
            'type'       => 'ENUM',
            'constraint' => ['active', 'deactivated', 'suspended'],
            'default'    => 'active',
            'null'       => false,
        ],
        'created_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        'updated_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        'deleted_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->addUniqueKey('email');
    $this->forge->addUniqueKey('username');
    $this->forge->createTable('users', true);
}

public function down()
{
    $this->forge->dropTable('users', true);
}

}
