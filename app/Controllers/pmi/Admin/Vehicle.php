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
use App\Models\VehicleModel;
use App\Models\VehicleUserModel;
use App\Helpers\Users\UserHelper;
use App\Helpers\Vehicles\VehicleHelper;

class Vehicle extends BaseController
{
    // protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();

        $this->vehicleModel = new VehicleModel();
        $this->vehicleUserModel = new VehicleUserModel();

        $this->dorbitt = new DorbitT();
        $this->admin = $this->dorbitt->admin;

        $this->user_helper = new UserHelper();
        $this->vehicle_helper = new VehicleHelper();
    }

    public function index()
    {
        $dorbitt = $this->dorbitt;
        $admin = $this->dorbitt->admin;

        $vehicle_type = $this->dorbitt->vehicle_type;
        $vehicle_status = $this->dorbitt->vehicle_status;

        $userModel = new UserModel();

        $user = [];
        if ($userModel->levelID()==1) {
            $user = $userModel->where('admin', $userModel->userID())->findAll();
        }else if ($userModel->levelID()==2) {
            $user = $userModel->where('parent', $userModel->userID())->findAll();
        }

        $users_id_arr = $this->vehicle_helper->get_users();
        
        $vehicles = $this->vehicleModel->find($users_id_arr);

        foreach ($vehicles as $keyd => $value_vehicle) {
            $users = json_decode($value_vehicle['users']);
            $users_arr = [];
            if ($users) {
                $users_arr = $users;
            }else{
                $users_arr = [0];
            }
            $vehicles[$keyd]['users_name'] = $this->user_helper->get_users($users_arr);
        }

        $data = [
            'dorbitt'       => $dorbitt,
            'admin'         => $admin,
            'navlink'       => 'vehicle',
            'page'          => 'vehicle/content',
            'breadcrumb'    => ['Vehicles',''],
            'breadcrumb_active' => ['active',''],
            'table_title'   => 'List Vehicle',
            'appjs'         => view($admin['pages'].'vehicle/appjs'),
            'modal'         => view($admin['pages'].'vehicle/modal',['users'=>$user, 'type'=>$vehicle_type, 'vehicle_status'=>$vehicle_status]),
            'vehicles'      => $vehicles
        ];
        return view($admin['layout'].'main',$data);
    }

    // private function userIdByVehicle_arr($id)
    // {
    //     $vehicleUserModel = new VehicleUserModel();

    //     $userVehicle = $vehicleUserModel->userIdByVehicle($id);
    //     $users = $this->userModel->findAll();

    //     foreach ($userVehicle as $key => $value) {
    //         foreach ($users as $keyU => $value_user) {
    //             if ($value['user_id']==$value_user['id']) {
    //                 $email = $value_user['email'];
    //             }
    //         }
    //         $email_arr[] = '<span class="badge bg-secondary">'.$email.'</span>';
    //     }

    //     return implode(" ",$email_arr);
    // }
}
