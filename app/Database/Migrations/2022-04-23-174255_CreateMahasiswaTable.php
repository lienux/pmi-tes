<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswaTable extends Migration
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
            'prodi' => [
                'type'          => 'TINYINT',
                'constraint'    => 2,
            ],
            'nim' => [
                'type'          => 'VARCHAR',
                'constraint'    => 15,
                'unique'        => true,
            ],          
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'image' => [
                'type'          => 'VARCHAR',
                'constraint'    => 254,
                'null'          => true,
            ],
            'created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at timestamp NULL ON UPDATE CURRENT_TIMESTAMP',
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('mahasiswa', true);
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa', true);
    }
}
