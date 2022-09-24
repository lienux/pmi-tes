<?php

namespace App\Helpers\Authentication;

class Session {
	public function get(){
		$user_id = session()->get('user_id');
        $level_id = session()->get('level_id');
        $company = session()->get('company');
        $admin = session()->get('admin');
        $parent = session()->get('parent');

        return [
            "user_id" => $user_id,
            "level_id" => $level_id,
            "company_id" => session()->get('company_id'),
            "company" => $company,
            "admin" => $admin,
            "parent" => $parent
        ];
	}

    public function company(){
        return [
            'id'=>session()->get('company_id'),
            'name'=>session()->get('company')
        ];
    }
}