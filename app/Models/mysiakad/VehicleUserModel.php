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

class VehicleUserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users_vehicles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','vehicle_id'];

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

    public function vehicleIdByUser()
    {
        $builder = $this->builder();
        $builder->select('vehicle_id');
        $builder->where('user_id', session()->get('user_id'));
        return $builder->get()->getResultArray();
    }

    public function userIdByVehicle($vehicleID)
    {
        $builder = $this->builder();
        $builder->select('user_id');
        $builder->where('vehicle_id', $vehicleID);
        return $builder->get()->getResultArray();
    }
}
