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
use App\Models\SimcardModel;
use App\Models\SimcardOperatorModel;

use App\Helpers\DorbittHelper;
use App\Helpers\Users\UserHelper;
use App\Helpers\Simcard\SimcardHelper;

class Simcard extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();

        // $this->driverModel = new DriverModel();
        $this->simcardModel = new SimcardModel();
        $this->simcardOperatorModel = new SimcardOperatorModel();

        $this->dorbitt = new DorbitT();
        $this->admin = $this->dorbitt->admin;

        $this->dorbitt_helper = new DorbittHelper();
        $this->user_helper = new UserHelper();
        $this->simcard_helper = new SimcardHelper();
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

        $simcard_id_arr = $this->simcard_helper->simcardID_by_userID();
        
        $cards = $this->simcardModel->findJoin($simcard_id_arr);
        $operator = $this->simcardOperatorModel->findAll();

        foreach ($cards as $key => $value) {
            $users = json_decode($value['users']);
            $users_arr = [];
            if ($users) {
                $users_arr = $users;
            }else{
                $users_arr = [0];
            }

            $cards[$key]['active_name'] = $this->dorbitt_helper->status($value['active']);
            $cards[$key]['users_name'] = $this->user_helper->get_users($users_arr);
        }
        
        $data = [
            'dorbitt'       => $dorbitt,
            'admin'         => $admin,
            'navlink'       => 'simcard',
            'page'          => 'simcard/content',
            'breadcrumb'    => ['Integration','SIM Card'],
            'breadcrumb_active' => ['','active'],
            'table_title'   => 'List SIM Card',
            'appjs'         => view($admin['pages'].'simcard/appjs'),
            'modal'         => view($admin['pages'].'simcard/modal',['users'=>$user, 'operator'=>$operator]),
            'cards'         => $cards,
            'itegrationlink'    => 'show',
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

    public function get()
    {
        return json_encode($this->simcardModel->findJoin());
    }
}
