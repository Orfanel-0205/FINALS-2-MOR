<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateElections extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'start_time'  => [
                'type' => 'DATETIME',
            ],
            'end_time'    => [
                'type' => 'DATETIME',
            ],
            'status'      => [
                'type'       => 'ENUM',
                'constraint' => ['scheduled', 'ongoing', 'completed'],
                'default'    => 'scheduled',
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
        $this->forge->createTable('elections');
    }

    public function down()
    {
        $this->forge->dropTable('elections');
    }
}
