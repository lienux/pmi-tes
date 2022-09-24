<?php

namespace App\Helpers;

// use App\Models\UserModel;
// use App\Models\DriverModel;
use \Config\DorbitT;
// use CodeIgniter\Controller;
// use CodeIgniter\HTTP\RequestInterface;

class DorbittHelper {
    
	public function __construct()
    {
        $request = \Config\Services::request();
        $this->request = $request;
        $this->dorbitt = new DorbitT();
    }

    public function agent()
    {
        $agent = $this->request->getUserAgent();

        if ($agent->isMobile()) {
            $agent = 'mobile';
        } else {
            $agent = 'web';
        }

        return $agent;
    }

    public function is_mobile()
    {
        $agent = $this->request->getUserAgent();

        if ($agent->isMobile()) {
            $isMobile = TRUE;
        } else {
            $isMobile = FALSE;
        }

        return $isMobile;
    }

    public function template()
    {
        $frontend = $this->dorbitt->frontend;
        $agent = $this->request->getUserAgent();

        if ($agent->isMobile()) {
            $template = $frontend['template']['mobile'];
        } else {
            $template = $frontend['template']['web'];
        }

        return $template;
    }

    public function level($id)
    {
        $name = '';
        foreach ($this->dorbitt->user_level as $value) {
            if ($value['id']==$id) {
                $name = $value['name'];
            }
        }

        return $name;
    }

    public function status($id)
    {
        $name = '';
        foreach ($this->dorbitt->status as $value) {
            if ($value['id']==$id) {
                $name = $value['name'];
            }
        }

        return $name;
    }
}