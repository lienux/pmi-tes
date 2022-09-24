<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldCompanyToMahasiswaTable extends Migration
{
    public function up()
    {
        $fields = [
            'company_id' => [
                'type' => 'TINYINT',
                'constraint' => 2,
                'after' => 'active',
            ]
        ];
        $this->forge->addColumn('mahasiswa', $fields);
    }

    public function down()
    {
        //
    }
}
