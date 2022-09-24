<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'active' => 1,
                'company_id' => 1,
                'admin' => null,
                'manager' => 4,
                'parent' => null,
                'level_id' => null,
                'role_id' => null,
                'username' => '',
                'email' => 'admin@mysiakad.com',
                'password' => '$2y$10$bMdtrv5MYUh1W5wMVIh.m.dXmw3yEtUlJ28KDlU3QXI/zmuf.9GLG',
                'name' => 'MY SIAKAD',
                'image' => null
            ],
            [
                'active' => 1,
                'company_id' => 1,
                'admin' => null,
                'manager' => 4,
                'parent' => null,
                'level_id' => null,
                'role_id' => 2,
                'username' => '02032213003',
                'email' => '',
                'password' => '$2y$10$8wHwXdBKlULEOfZoHPgqDehHSI6h73MgemccLcJFlNiSTi5vDlT5O',
                'name' => 'M. Ali Imron',
                'image' => '12122012500.jpg'                
            ],
            [
                'active' => 1,
                'company_id' => 1,
                'admin' => null,
                'manager' => 4,
                'parent' => null,
                'level_id' => null,
                'role_id' => 1,
                'username' => '',
                'email' => 'susenokh@gmail.com',
                'password' => '$2y$10$AxnC80nVmxsmxIqWykFnLOrgD.9kBtIYTAXEb9K9h2kbzx.F3Al0m',
                'name' => 'Suseno KH, S.Kom',
                'image' => 'bptj.jpeg'
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
