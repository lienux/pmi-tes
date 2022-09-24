<?php

namespace App\Controllers\Admin;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: https://trackingnesia.com/
* Directur: https://ummukhairiyahyusna.com/
*/

use App\Controllers\BaseController;
use \Config\DorbitT;

use App\Models\UserModel;
use App\Models\UserRoleModel;
use App\Models\DriverModel;
use App\Models\UserDriverModel;

use App\Helpers\DorbittHelper;
use App\Helpers\Users\UserHelper;
use App\Helpers\Drivers\DriverHelper;

class Driver extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->driverModel = new DriverModel();

        $this->dorbitt = new DorbitT();
        $this->admin = $this->dorbitt->admin;

        $this->dorbitt_helper = new DorbittHelper();
        $this->user_helper = new UserHelper();
        $this->driver_helper = new DriverHelper();
    }

    public function index()
    {
        $dorbitt = $this->dorbitt;
        $admin = $this->dorbitt->admin;

        $userModel = new UserModel();

        $user = [];
        if ($userModel->levelID()==1) {
            $user = $userModel->where('admin', $userModel->userID())->findAll();
        }else if ($userModel->levelID()==2) {
            $user = $userModel->where('parent', $userModel->userID())->findAll();
        }

        $users_id_arr = $this->driver_helper->get_users();
        
        $drivers = $this->driverModel->find($users_id_arr);

        foreach ($drivers as $key => $value) {
            $users = json_decode($value['users']);
            $users_arr = [];
            if ($users) {
                $users_arr = $users;
            }else{
                $users_arr = [0];
            }
            $drivers[$key]['users_name'] = $this->user_helper->get_users($users_arr);
            $drivers[$key]['active_name'] = $this->dorbitt_helper->status($value['active']);
        }
        
        $data = [
            'dorbitt'       => $dorbitt,
            'admin'         => $admin,
            'navlink'       => 'driver',
            'page'          => 'driver/drivers',
            'breadcrumb'    => ['Driver',''],
            'breadcrumb_active' => ['active',''],
            'table_title'   => 'List Driver',
            'appjs'         => view($admin['pages'].'driver/appjs'),
            'modal'         => view($admin['pages'].'driver/modal',['users'=>$user]),
            'drivers'       => $drivers
        ];
        return view($admin['layout'].'main',$data);
    }

    private function userIdByDriver_arr($id)
    {
        $userDriverModel = new UserDriverModel();

        $userIdByDriver = $userDriverModel->findUserByDriver($id);
        $users = $this->userModel->findAll();

        foreach ($userIdByDriver as $key => $value) {
            foreach ($users as $keyU => $value_user) {
                if ($value['user_id']==$value_user['id']) {
                    $email = $value_user['email'];
                }
            }
            $email_arr[] = '<span class="badge bg-secondary">'.$email.'</span>';
        }

        return implode(" ",$email_arr);
    }
}
