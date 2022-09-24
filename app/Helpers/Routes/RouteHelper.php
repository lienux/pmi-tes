<?php

namespace App\Helpers\Routes;

use App\Models\UserModel;
use App\Models\RouteModel;

class RouteHelper {
	public function __construct()
    {
        $this->user_model = new UserModel();
        $this->route_model = new RouteModel();
    }

	public function get_users()
    {
        $routes = $this->route_model->where('company_id',$this->user_model->companyID())->findAll();
        
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
}