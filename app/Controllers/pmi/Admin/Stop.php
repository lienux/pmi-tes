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
use App\Models\GeofenceModel;
use App\Models\UserGeofenceModel;
use App\Models\StopModel;
use App\Models\UserStopModel;

use App\Helpers\DorbittHelper;
use App\Helpers\Users\UserHelper;
use App\Helpers\Stops\StopHelper;

class Stop extends BaseController
{
    // protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->stopModel = new StopModel();
        
        $this->dorbitt = new DorbitT();
        $this->admin = $this->dorbitt->admin;

        $this->dorbitt_helper = new DorbittHelper();
        $this->user_helper = new UserHelper();
        $this->stop_helper = new StopHelper();
    }

    public function index()
    {
        $dorbitt = $this->dorbitt;
        $admin = $this->dorbitt->admin;

        $userModel = $this->userModel;

        $user = [];
        if ($userModel->levelID()==1) {
            $user = $userModel->where('admin', $userModel->userID())->findAll();
        }else if ($userModel->levelID()==2) {
            $user = $userModel->where('parent', $userModel->userID())->findAll();
        }

        $users_id_arr = $this->stop_helper->get_users();
        
        $stops = $this->stopModel->find($users_id_arr);

        foreach ($stops as $key => $value) {
            $users = json_decode($value['users']);
            $users_arr = [];
            if ($users) {
                $users_arr = $users;
            }else{
                $users_arr = [0];
            }
            $stops[$key]['users_name'] = $this->user_helper->get_users($users_arr);
            $stops[$key]['active_name'] = $this->dorbitt_helper->status($value['active']);
        }
        
        $data = [
            'dorbitt'       => $dorbitt,
            'admin'         => $admin,
            'navlink'       => 'stop',
            'page'          => 'stop/stops',
            'breadcrumb'    => ['Stop',''],
            'breadcrumb_active' => ['active',''],
            'table_title'   => 'List Stop',
            'appjs'         => view($admin['pages'].'stop/appjs'),
            'modal'         => view($admin['pages'].'stop/modal',['users'=>$user]),
            'stops'         => $stops
        ];
        return view($admin['layout'].'main',$data);
    }
}
