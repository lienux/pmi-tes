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

class Geofence extends BaseController
{
    // protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->driverModel = new DriverModel();
        $this->geofenceModel = new GeofenceModel();
        $this->dorbitt = new DorbitT();
        $this->admin = $this->dorbitt->admin;

        $userModel = new UserModel();
        $info = $userModel->info();
        $this->info = $userModel->info();
        $driverModel = new DriverModel();
    }

    public function index()
    {
        $dorbitt = $this->dorbitt;
        $admin = $this->dorbitt->admin;
        $userGeofenceModel = new UserGeofenceModel();
        $userModel = new UserModel();

        $user = [];
        if ($userModel->levelID()==1) {
            $user = $userModel->where('admin', $userModel->userID())->findAll();
        }else if ($userModel->levelID()==2) {
            $user = $userModel->where('parent', $userModel->userID())->findAll();
        }
        $users = $this->userModel->findAll();
        $geofence_byUser = $userGeofenceModel->findGeofenceByUser();

        $geofences = [];
        if ($geofence_byUser) {
            foreach ($geofence_byUser as $key => $value) {
                $geofenceId_Arr[] = $value['geofence_id'];
            }

            $ids = array_map('intval', $geofenceId_Arr);
            $geofences = $this->geofenceModel->find($ids);

            foreach ($geofences as $keyd => $value_geofence) {
                $userIdByDriver = $this->userIdByGeofence_arr($value_geofence['id']);
                $geofences[$keyd]['user_arr'] = $userIdByDriver;
                $geofences[$keyd]['latitude'] = json_decode($value_geofence['center'],true)['lat'];
                $geofences[$keyd]['longitude'] = json_decode($value_geofence['center'],true)['lng'];
            }
        }
        
        $data = [
            'dorbitt'       => $dorbitt,
            'admin'         => $admin,
            'navlink'       => 'geofence',
            'page'          => 'geofence/geofences',
            'breadcrumb'    => ['Geofence',''],
            'table_title'   => 'List Geofence',
            'appjs'         => view($admin['pages'].'geofence/appjs'),
            'modal'         => view($admin['pages'].'geofence/modal',['users'=>$user]),
            'geofences'       => $geofences
        ];
        return view($admin['layout'].'main',$data);
    }

    private function userIdByGeofence_arr($id)
    {
        $userGeofenceModel = new UserGeofenceModel();

        $userIdByDriver = $userGeofenceModel->findUserByGeofence($id);
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
