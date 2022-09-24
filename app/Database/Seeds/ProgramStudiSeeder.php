<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'active' => 1,
                'fakultas_id' => 1,
                'kode' => 'TI',
                'name' => 'Teknik Informatika',
                'jenjang'   => 'S1',
                'kaprodi' => 'SUCI ANDRIYANI, M.Kom.',
            ],
            [
                'active' => 1,
                'fakultas_id' => 1,
                'kode' => 'SI',
                'name' => 'Sistem Informatika',
                'jenjang'   => 'S1',
                'kaprodi' => 'Suhendra Anjar Dinata, S.Kom., M.Kom',
            ],
            [
                'active' => 1,
                'fakultas_id' => 2,
                'kode' => 'ME',
                'name' => 'Manajemen',
                'jenjang'   => 'S1',
                'kaprodi' => 'Ferry Wahyu Ardianto, S.E., MM.',
            ],
            [
                'active' => 1,
                'fakultas_id' => 1,
                'kode' => 'ITK',
                'name' => 'Informatika dan Teknisi Komputer',
                'jenjang'   => 'D1',
                'kaprodi' => 'Suhendra Anjar Dinata, S.Kom., M.Kom',
            ],
            [
                'active' => 1,
                'fakultas_id' => 1,
                'kode' => 'ADM',
                'name' => 'Komputer Administrasi Bisnis',
                'jenjang'   => 'D1',
                'kaprodi' => 'Samsuri Yahya, S.Kom., M.Kom.',
            ],
        ];

        $this->db->table('prodi')->insertBatch($data);
    }
}
