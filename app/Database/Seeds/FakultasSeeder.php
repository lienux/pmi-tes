<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FakultasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Ilmu Komputer'
            ],
            [
                'name' => 'Ekonomi'
            ],
        ];

        $this->db->table('fakultas')->insertBatch($data);
    }
}
