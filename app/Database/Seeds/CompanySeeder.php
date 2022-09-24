<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'active' => 1,
                'name' => 'Digital Orbit Technology',
                'email' => 'digitalorbittech@gmail.com',
                'password' => '$2y$10$8wHwXdBKlULEOfZoHPgqDehHSI6h73MgemccLcJFlNiSTi5vDlT5O',
                'image' => '12122012500.jpg'                
            ],
            [
                'active' => 1,
                'name' => 'EL RAHMA EDUCATION CENTRE',
                'email' => 'elrahma@gmail.com',
                'password' => '$2y$10$bMdtrv5MYUh1W5wMVIh.m.dXmw3yEtUlJ28KDlU3QXI/zmuf.9GLG',
                'image' => null
            ]
        ];

        $this->db->table('company')->insertBatch($data);
    }
}
