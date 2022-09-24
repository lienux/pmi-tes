<?php

namespace App\Models\pmi;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: Tijket
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\Model;
use \Config\DorbitT;

class DdsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dds';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nik',
        'no_hp',
        'lokasi',
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
        $pelabuhan = 'pelabuhan.*,';
        $pulau = 'pulau.name as pulau_name,';

        $query = $this->db->table($this->table);
        $query->select("*")->from('pasien');
        // $query->join('pulau', 'pulau.id = pelabuhan.pulau_id', 'left');
        // $builder->where('routes.active',1);
        // $query->orderBy('routes.id','ASC');

        return $query;
    }

    public function getAll($query) 
    {
        $count = $query->countAllResults(false);
        $row = $query->get()->getResult($this->tempReturnType);

        return [
            'count'=>$count,
            'data'=>$row,
        ];
    }
}
