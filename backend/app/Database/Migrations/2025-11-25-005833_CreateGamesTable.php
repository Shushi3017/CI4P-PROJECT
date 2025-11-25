<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGamesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'board_id'    => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'name'        => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'release_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('board_id', 'boards', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('games');
    }

    public function down()
    {
        $this->forge->dropTable('games');
    }
}
