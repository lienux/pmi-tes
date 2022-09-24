<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTahunAjaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'semester' => [
                'type'          => 'VARCHAR',
                'constraint'    => 10,
                'null'          => true
            ],
            'created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at timestamp NULL ON UPDATE CURRENT_TIMESTAMP',
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tahun_ajaran', true);
    }

    public function down()
    {
        $this->forge->dropTable('tahun_ajaran', true);
    }
}
