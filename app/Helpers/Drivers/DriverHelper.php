<?php

namespace App\Helpers\Drivers;

use App\Models\UserModel;
use App\Models\DriverModel;

class DriverHelper {
	public function __construct()
    {
        $this->user_model = new UserModel();
        $this->driver_model = new DriverModel();
    }

	public function get_users()
    {
        $drivers = $this->driver_model->where('company_id',$this->user_model->companyID())->findAll();
        
        $users_new = [""];
        foreach ((array) $drivers as $key => $value) {
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