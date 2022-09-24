<?php

namespace App\Helpers\Stops;

use App\Models\UserModel;
use App\Models\StopModel;

class StopHelper {
	public function __construct()
    {
        $this->user_model = new UserModel();
        $this->stop_model = new StopModel();
    }

	public function get_users()
    {
        $stops = $this->stop_model->where('company_id',$this->user_model->companyID())->findAll();
        
        $users_new = [""];
        foreach ((array) $stops as $key => $value) {
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