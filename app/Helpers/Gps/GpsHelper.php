<?php

namespace App\Helpers\Gps;

use App\Models\UserModel;
use App\Models\GpsModel;

class GpsHelper {
	public function __construct()
    {
        $this->user_model = new UserModel();
        $this->gps_model = new GpsModel();
    }

	public function get_users()
    {
        $routes = $this->gps_model->where('company_id',$this->user_model->companyID())->findAll();
        
        $users_new = [""];
        foreach ((array) $routes as $key => $value) {
            $users = json_decode($value['users']);
            if ($users) {
                if (in_array($this->user_model->userID(),$users)) {
                    $users_new[] = $value['id'];
                }
            }
        }

        return $users_new;
    }

    public function gpsID_by_userID()
    {
        $data = $this->gps_model->where('company_id',$this->user_model->companyID())->findAll();
        
        $id_arr = [""];
        foreach ((array) $data as $key => $value) {
            $users = json_decode($value['users']);
            if ($users) {
                if (in_array($this->user_model->userID(),$users)) {
                    $id_arr[] = $value['id'];
                }
            }
        }

        return $id_arr;
    }

    public function simcardID_isset_on_gps()
    {
        $data = $this->gps_model->where('company_id',$this->user_model->companyID())->findAll();

        $simcard_id_arr = [""];
        foreach ((array) $data as $key => $value) {
            $simcard_id_arr[] = $value['simcard_id'];
        }

        return $simcard_id_arr;
    }
}