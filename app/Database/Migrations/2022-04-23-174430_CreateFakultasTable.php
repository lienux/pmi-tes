<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFakultasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at timestamp NULL ON UPDATE CURRENT_TIMESTAMP',
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('fakultas', true);
    }

    public function down()
    {
        $this->forge->dropTable('fakultas', true);
    }
}
