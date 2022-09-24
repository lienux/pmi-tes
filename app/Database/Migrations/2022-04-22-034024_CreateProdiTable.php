<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdiTable extends Migration
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
            'active' => [
                'type'          => 'TINYINT',
                'constraint'    => 1,
            ],
            'fakultas_id' => [
                'type'          => 'INT',
                'constraint'    => 2,
            ],
            'kode' => [
                'type'          => 'VARCHAR',
                'constraint'    => 10,
                'unique'        => true,
            ],          
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'kaprodi' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
                'null'          => true,
            ],
            'created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at timestamp NULL ON UPDATE CURRENT_TIMESTAMP',
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('prodi', true);
    }

    public function down()
    {
        $this->forge->dropTable('prodi', true);
    }
}
