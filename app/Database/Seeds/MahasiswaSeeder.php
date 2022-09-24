<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'active' => 1,
                'prodi' => '1',
                'nim' => '21302060200',
                'name' => 'Luthfan Fatih Al Islamy',
                'password' => '$2y$10$8wHwXdBKlULEOfZoHPgqDehHSI6h73MgemccLcJFlNiSTi5vDlT5O',
                'image' => null                
            ],
            [
                'active' => 1,
                'prodi' => '1',
                'nim' => '21302060201',
                'name' => 'Fina Faulina',
                'password' => '$2y$10$bMdtrv5MYUh1W5wMVIh.m.dXmw3yEtUlJ28KDlU3QXI/zmuf.9GLG',
                'image' => null
            ],
            [
                'active' => 1,
                'prodi' => '1',
                'nim' => '21302060202',
                'name' => 'Nurwaliyah',
                'password' => '$2y$10$bMdtrv5MYUh1W5wMVIh.m.dXmw3yEtUlJ28KDlU3QXI/zmuf.9GLG',
                'image' => null
            ],
            [
                'active' => 1,
                'prodi' => '1',
                'nim' => '21302060203',
                'name' => 'Bagus Dwi Fachrizki',
                'password' => '$2y$10$bMdtrv5MYUh1W5wMVIh.m.dXmw3yEtUlJ28KDlU3QXI/zmuf.9GLG',
                'image' => null
            ],
            [
                'active' => 1,
                'prodi' => '1',
                'nim' => '21302060204',
                'name' => 'Esparansa',
                'password' => '$2y$10$bMdtrv5MYUh1W5wMVIh.m.dXmw3yEtUlJ28KDlU3QXI/zmuf.9GLG',
                'image' => null
            ]
        ];

        $this->db->table('mahasiswa')->insertBatch($data);
    }
}
