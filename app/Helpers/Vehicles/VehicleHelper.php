<?php

namespace App\Helpers\Vehicles;

use App\Models\UserModel;
use App\Helpers\Users\UserHelper;
use App\Models\VehicleModel;

class VehicleHelper {
	public function __construct()
    {
        $this->user_model = new UserModel();
        $this->user_helper = new UserHelper();
        $this->vehicle_model = new VehicleModel();
    }

	public function get_users()
    {
        $vehicles = $this->vehicle_model->where('company_id',$this->user_model->companyID())->findAll();
        
        $users_new = [""];
        foreach ((array) $vehicles as $key => $value) {
            $users = json_decode($value['users']);
            if ($users) {
                if (in_array($this->user_model->userID(),$users)) {
                    $users_new[] = $value['id'];
                }
            }
        }

        return $users_new;
    }
}