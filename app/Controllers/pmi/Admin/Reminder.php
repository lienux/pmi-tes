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
use App\Models\IbuttonModel;
// use App\Models\UserRoleModel;
// use App\Models\DriverModel;
// use App\Models\UserDriverModel;
// use App\Models\GpsModel;
// use App\Models\SimcardModel;

use App\Helpers\DorbittHelper;
use App\Helpers\Users\UserHelper;
use App\Helpers\Ibutton\IbuttonHelper;
// use App\Helpers\Gps\GpsHelper;
// use App\Helpers\Simcard\SimcardHelper;

class Reminder extends BaseController
{
    public function __construct()
    {
        $this->dorbitt = new DorbitT();
        $this->admin = $this->dorbitt->admin;

        $this->userModel = new UserModel();
        $this->ibuttonModel = new IbuttonModel();
        // $this->driverModel = new DriverModel();
        // $this->gpsModel = new GpsModel();
        // $this->simcardModel = new SimcardModel();

        $this->dorbitt_helper = new DorbittHelper();
        $this->user_helper = new UserHelper();
        $this->ibutton_helper = new IbuttonHelper();
        // $this->simcard_helper = new SimcardHelper();
        // $this->gps_helper = new GpsHelper();
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

        $ibutton_id_arr = $this->ibutton_helper->ibuttonID_by_userID();
        // $simcard_id_arr = $this->simcard_helper->simcardID_by_userID();
        
        $data = $this->ibuttonModel->find($ibutton_id_arr);
        // $simcardID_isset_on_gps = $this->gps_helper->simcardID_isset_on_gps();
        // $cards = $this->simcardModel->findJoin_for_gps($simcard_id_arr,$simcardID_isset_on_gps);

        foreach ($data as $key => $value) {
            $users = json_decode($value['users']);
            $users_arr = [];
            if ($users) {
                $users_arr = $users;
            }else{
                $users_arr = [0];
            }
            $data[$key]['users_name'] = $this->user_helper->get_users($users_arr);
            $data[$key]['active_name'] = $this->dorbitt_helper->status($value['active']);
        }
        
        $data = [
            'dorbitt'           => $dorbitt,
            'admin'             => $admin,
            'navlink'           => 'reminder',
            'page'              => 'reminder/content',
            'breadcrumb'        => ['Integration','Reminder'],
            'breadcrumb_active' => ['','active'],
            'table_title'       => 'List Reminder',
            'appjs'             => view($admin['pages'].'reminder/appjs'),
            'modal'             => view($admin['pages'].'reminder/modal',['users'=>$user]),
            'data'              => $data,
        ];
        return view($admin['layout'].'main',$data);
    }

    // private function userIdByDriver_arr($id)
    // {
    //     $userDriverModel = new UserDriverModel();

    //     $userIdByDriver = $userDriverModel->findUserByDriver($id);
    //     $users = $this->userModel->findAll();

    //     foreach ($userIdByDriver as $key => $value) {
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
