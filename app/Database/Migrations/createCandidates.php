<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCandidates extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'election_id'   => ['type' => 'INT', 'unsigned' => true],
            'name'          => ['type' => 'VARCHAR', 'constraint' => '255'],
            'description'   => ['type' => 'TEXT', 'null' => true],
            'photo'         => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('election_id', 'elections', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('candidates');
    }

    public function down()
    {
        $this->forge->dropTable('candidates');
    }
}
