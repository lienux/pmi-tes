<?php

namespace App\Models;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: https://trackingnesia.com/
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\Model;
use \Config\DorbitT;

class SimcardModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'simcard';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['active','company_id','user_id','installer','operator_id','gsm_no','msidn','imsi_no','users'];

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

    public function findJoin($simcard_id_arr)
    {
        $builder = $this->builder();
        $builder->select('simcard.*, simcard_operator.name as operator_name');
        // $builder->where('user_id', session()->get('user_id'));
        $builder->join('simcard_operator', 'simcard_operator.id = simcard.operator_id', 'left');
        $builder->whereIn('simcard.id', $simcard_id_arr);
        return $builder->get()->getResultArray();
    }

    public function findJoin_for_gps($simcard_id_arr,$simcardID_isset_on_gps)
    {
        $builder = $this->builder();
        $builder->select('simcard.*, simcard_operator.name as operator_name');
        // $builder->where('user_id', session()->get('user_id'));
        $builder->join('simcard_operator', 'simcard_operator.id = simcard.operator_id', 'left');
        $builder->whereIn('simcard.id', $simcard_id_arr);
        $builder->whereNotIn('simcard.id',$simcardID_isset_on_gps);
        return $builder->get()->getResultArray();
    }
}
