<?php

namespace App\Helpers\Users;

use App\Models\UserModel;

class UserHelper {
	public function __construct()
    {
        $this->user_model = new UserModel();
    }
	
	public function findAll(){
		$model = new UserModel;
		$model->where('company_id',2);
		return $model;
	}

	public function withCompany(){
		
	}

	public function get_users($arr_id)
    {
        $data = $this->user_model->find($arr_id);

        $email = [];
        foreach ((array) $data as $key => $value) {
            $email[] = '<span class="badge bg-secondary">'.$value['email'].'</span>';
        }

        return implode(" ",$email);
    }

    public function parent_name($id)
    {
    	$users = $this->user_model->findAll();

    	$name = '';
        foreach ($users as $value) {
            if ($value['id']==$id) {
                $name = $value['email'];
            }
        }

        return $name;
    }
}