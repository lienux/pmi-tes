<?php

namespace App\Helpers\Simcard;

use App\Models\UserModel;
use App\Models\SimcardModel;

class SimcardHelper {
	public function __construct()
    {
        $this->user_model = new UserModel();
        $this->simcard_model = new SimcardModel();
    }

	public function simcardID_by_userID()
    {
        $data = $this->simcard_model->where('company_id',$this->user_model->companyID())->findAll();
        
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

    public function get_operator()
    {
        
    }
}