<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldToProdiTable extends Migration
{
    public function up()
    {
        $fields = [
            'jenjang' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'after' => 'name',
            ]
        ];
        $this->forge->addColumn('prodi', $fields);
    }

    public function down()
    {
        //
    }
}
