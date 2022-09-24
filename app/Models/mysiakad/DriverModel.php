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

class DriverModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drivers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                'company_id',
                                'user_id',
                                'name',
                                'tempat_lahir',
                                'tanggal_lahir',
                                'no_sim',
                                'masa_sim',
                                'telp',
                                'foto_pengemudi',
                                'foto_sim',
                                'foto_ktp',
                                'ibutton_id',
                                'active',
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
}
