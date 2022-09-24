<?php

namespace App\Models\tijket;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: Tijket
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\Model;
use \Config\DorbitT;

class PulauModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pulau';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'company_id',
        'user_id',
        'kode_bus',
        'nopol',
        'thn_produksi',
        'merk_tipe',
        'no_rangka',
        'no_stnk',
        'masa_stnk',
        'no_kir',
        'masa_kir',
        'bbm',
        'status',
        'foto',
        'foto_depan',
        'foto_belakang',
        'foto_kanan',
        'foto_kiri',
        'jml_seat',
        'users',
        'installer'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function query()
    {
        $pulau = 'pulau.*,';

        $query = $this->db->table($this->table);
        $query->select($pulau);
        // $builder->where('routes.active',1);
        // $query->orderBy('routes.id','ASC');

        return $query;
    }

    public function getAll($query) 
    {
        $count = $query->countAllResults(false);
        $row = $query->get()->getResult($this->tempReturnType);

        // $qPelabuhan     = $this->db->table('pelabuhan');
        // $qPelabuhan     = $qPelabuhan->select('*');
        // $qPelabuhan     = $qPelabuhan->get()->getResult($this->tempReturnType);

        // foreach ((array) $row as $key => $value) {
        //     $to_id = $value['to_id'];

        //     foreach ($qPelabuhan as $key2 => $value2) {
        //         $id = $value2['id'];
        //         if ($id==$to_id) {
        //             $to_name = $value2['name'];
        //         }
        //     }

        //     $row[$key]['to_name'] = $to_name;
        // }

        return [
            'count'=>$count,
            'data'=>$row,
        ];
    }
}


