<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    public function run()
    {
        // for ($a = 2007; $a <= date('Y'); $a++){
        //     $aa = $a+1;
        //     $data = [
        //         [
        //             'name' => $a.'/'.$aa,
        //             'semester' => 1
        //         ],
        //         [
        //             'name' => $a.'/'.$aa,
        //             'semester' => 2                
        //         ]
        //     ];           

        //     $this->db->table('tahun_ajaran')->insertBatch($data);
        // }

        for ($a = 2007; $a <= date('Y'); $a++){
            $aa = $a+1;
            $data = [
                'name' => $a.'/'.$aa
            ];           

            $this->db->table('tahun_ajaran')->insert($data);
        }
    }
}
