<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
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
            'company_id' => [
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'null'          => true,
            ],
            'admin' => [
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'null'          => true,
            ],
            'manager' => [
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'null'          => true,
            ],
            'parent' => [
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'null'          => true,
            ],
            'level_id' => [
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'null'          => true,
            ],
            'role_id' => [
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'null'          => true,
            ],
            'username' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
                'unique'        => true
            ],
            'email' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
                'unique'        => true
            ],
            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => 200,
            ],
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'image' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
                'null'          => true,
            ],
            'created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at timestamp NULL ON UPDATE CURRENT_TIMESTAMP',

            // 'updated_at timestamp DEFAULT CURRENT_TIMESTAMP NULL',
            // 'created_at' => [
            //     'type'          => 'TIMESTAMP',
            //     'default'       => 'CURRENT_TIMESTAMP',
            // ],
            // 'updated_at' => [
            //     'type'          => 'TIMESTAMP',
            //     'default'       => 'NULL',
            //     'null'          => true,
            // ],

            // 'title'       => [
            //     'type'           => 'VARCHAR',
            //     'constraint'     => '100',
            //     'unique'         => true,
            // ],
            // 'author'      => [
            //     'type'           =>'VARCHAR',
            //     'constraint'     => 100,
            //     'default'        => 'King of Town',
            // ],
            // 'description' => [
            //     'type'           => 'TEXT',
            //     'null'           => true,
            // ],
            // 'status'      => [
            //     'type'           => 'ENUM',
            //     'constraint'     => ['publish', 'pending', 'draft'],
            //     'default'        => 'pending',
            // ],

            // 'id'            => ['type' => 'INT', 'constraint' => 128, 'null' => false],
            // 'ip_address'    => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => false],
            // 'timestamp timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            // 'data'          => ['type' => 'BLOB', 'null' => false],
         ]);
        $this->forge->addKey('id', true);
        // $this->forge->addKey('timestamp');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
