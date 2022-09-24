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

class GeofenceModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'geofences';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['company_id','name','latitude','longitude','radius'];

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

    // public function dorbittWhere()
    // {
    //     $builder = $this->builder();
    //     $builder->where('id',21);
    //     // $builder->findAll();
    //     $builder->get()->getResultArray();

    //     return $builder;
    // }

    // public function conn()
    // {
    //     $users = 'users.id,users.name,users.email,users.status,users.created_at,';
    //     $user_roles = 'user_roles.user_id,user_roles.role';

    //     $builder = $this->db->table($this->table);
    //     $builder->select($users.$user_roles);
    //     $builder->join('user_roles', 'user_roles.user_id = users.id', 'left');
    //     $builder->orderBy('users.id','ASC');

    //     return $builder;
    // }

    // public function user_findAll() {
    //     $builder = $this->conn();
    //     $query = $builder->get()->getResultArray();

    //     return $query;
    // }

    // public function user_find($id) {
    //     $builder = $this->conn();
    //     $builder->where('users.id',$id);
    //     $query = $builder->get()->getResultArray();

    //     return $query;
    // }


    // public function getUserRole($query)
    // {
    //     $dorbitt = new DorbitT();
    //     $roles = $dorbitt->userRoles;
    //     $status = $dorbitt->userStatus;

    //     $role_name = null;
    //     $status_name = null;

    //     foreach ($query as $key => $value) {
    //         foreach ($roles as $keyd => $role_item) {
    //             if ($value['role']==$role_item['id']) {
    //                 $role_name = $role_item['role_name'];
    //             }
    //         }

    //         foreach ($status as $key_status => $status_item) {
    //             if ($value['status']==$key_status) {
    //                 $status_name = $status_item;
    //             }
    //         }
    //         $query[$key]['role_name'] = $role_name;
    //         $query[$key]['status_name'] = $status_name;
    //     }
    //     return $query;
    // }

    public function user_deleteIn($id)
    {

    }
}
