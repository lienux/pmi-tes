<?php

namespace App\Controllers\Admin;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: https://trackingnesia.com/
* Directur: https://ummukhairiyahyusna.com/
*/

use App\Controllers\BaseController;
// use App\Helpers\Users\User as UserHelper;
use \Config\DorbitT;

use App\Models\UserModel;
use App\Models\UserAdminModel;
use App\Models\UserRoleModel;

use App\Helpers\DorbittHelper;
use App\Helpers\Users\UserHelper;

class User extends BaseController
{
    // protected $userModel;

    public function __construct()
    {
        $this->dorbitt = new DorbitT();
        $this->admin = $this->dorbitt->admin;

        $userModel = new UserModel();
        $info = $userModel->info();
        $this->info = $userModel->info();

        $this->userModel = new UserModel();
        $this->userRoleModel = new UserRoleModel();

        $this->user_helper = new UserHelper();
        $this->dorbitt_helper = new DorbittHelper();
    }

    public function index()
    {
        $dorbitt = $this->dorbitt;
        $admin = $this->dorbitt->admin;

        if ($this->info['level_id']==1) {
            $user = $this->userModel->where('id',$this->info['user_id'])->findAll();
            $users = $this->userModel->where('admin',$this->info['user_id'])->findAll();
            $users = array_merge($user,$users);
        }else if ($this->info['level_id']==2) {
            $user = $this->userModel->where('id',$this->info['user_id'])->findAll();
            $users = $this->userModel->where('parent',$this->info['user_id'])->findAll();
            $users = array_merge($user,$users);
        }else if ($this->info['level_id']==3){
            $users = $this->userModel->where('id',$this->info['user_id'])->findAll();
        }

        $userForParent = $this->userModel->findWithCompanyWithLevel(2);

        foreach ($users as $key => $value) {
            $users[$key]['active_name'] = $this->dorbitt_helper->status($value['active']);
            $users[$key]['level_name'] = $this->dorbitt_helper->level($value['level_id']);
            $users[$key]['parent_name'] = $this->user_helper->parent_name($value['parent']);
        }


        $data = [
            'dorbitt'       => $this->dorbitt,
            'admin'         => $this->admin,
            'navlink'       => 'user',
            'page'          => 'user/users',
            'breadcrumb'    => ['Users',''],
            'breadcrumb_active' => ['active',''],
            'table_title'   => 'List User',
            'appjs'         => view($admin['pages'].'user/appjs'),
            'modal'         => view($admin['pages'].'user/modal',['users'=>$users,'user'=>$userForParent]),
            'datausers'     => $users
        ];
        return view($admin['layout'].'main',$data);
        // // echo json_encode(session()->get());
    }
}
