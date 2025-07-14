<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'   => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'password'   => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'email'      => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'picture'    => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'bio'        => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'role'       => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'voter'],
                'default'    => 'voter',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
