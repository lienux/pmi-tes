<?php

namespace App\Models\Tijket;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: Tijket
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\Model;
use \Config\DorbitT;

class NewsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'news';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'active',
        'pulau_id',
        'parent',
        'level_id',
        'name',
        'email',
        'password',
        'image',
        'active'
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

    public function info()
    {
        $user_id = session()->get('user_id');
        $level_id = session()->get('level_id');
        $company = session()->get('company');
        $admin = session()->get('admin');
        $parent = session()->get('parent');

        return [
            "user_id" => $user_id,
            "level_id" => $level_id,
            "company_id" => session()->get('company_id'),
            "company" => $company,
            "admin" => $admin,
            "parent" => $parent
        ];
    }

    public function userID()
    {
        return session()->get('user_id');
    }

    public function levelID()
    {
        return session()->get('level_id');
    }

    public function companyID()
    {
        return session()->get('company_id');
    }

    public function companyName()
    {
        return session()->get('company_name');
    }

    public function adminID()
    {
        return session()->get('admin');
    }

    public function parentID()
    {
        return session()->get('parent');
    }

    public function conn()
    {
        $users = 'users.id,users.name,users.email,users.status,users.created_at,';
        $user_roles = 'user_roles.user_id,user_roles.role';

        $builder = $this->db->table($this->table);
        $builder->select($users.$user_roles);
        $builder->join('user_roles', 'user_roles.user_id = users.id', 'left');
        $builder->orderBy('users.id','ASC');

        return $builder;
    }

    public function user_findAll() {
        $builder = $this->conn();
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function user_find($id) {
        $builder = $this->conn();
        $builder->where('users.id',$id);
        $query = $builder->get()->getResultArray();

        return $query;
    }


    public function getUserRole($query)
    {
        $dorbitt = new DorbitT();
        $roles = $dorbitt->userRoles;
        $status = $dorbitt->userStatus;

        $role_name = null;
        $status_name = null;

        foreach ($query as $key => $value) {
            foreach ($roles as $keyd => $role_item) {
                if ($value['role']==$role_item['id']) {
                    $role_name = $role_item['role_name'];
                }
            }

            foreach ($status as $key_status => $status_item) {
                if ($value['status']==$key_status) {
                    $status_name = $status_item;
                }
            }
            $query[$key]['role_name'] = $role_name;
            $query[$key]['status_name'] = $status_name;
        }
        return $query;
    }

    public function user_deleteIn($id)
    {

    }

    public function user_whereRole($id) {
        $builder = $this->conn();
        $builder->where('user_roles.role',$id);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function user_whereIn($arr) {
        $builder = $this->conn();
        $builder->whereIn('id',$arr);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function findWithCompany(){
        $builder = $this->builder();
        $builder->where('company_id',session()->get('company_id'));
        return $builder->get()->getResultArray();
    }

    public function findWithCompanyWithLevel($id){
        $builder = $this->builder();
        $builder->where('company_id',session()->get('company_id'))->where('level_id',$id);
        return $builder->get()->getResultArray();
    }
}
