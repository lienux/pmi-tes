<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCompany extends Migration
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
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'email' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
                'unique'        => true,
            ],
            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => 200,
            ],
            'image' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
                'null'          => true,
            ],
            'created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at timestamp NULL ON UPDATE CURRENT_TIMESTAMP',
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('company', true);
    }

    public function down()
    {
        $this->forge->dropTable('company', true);
    }
}
