<?php

namespace App\Controllers\pmi\Authentication;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: PMI
* Directur: https://ummukhairiyahyusna.com/
*/

use App\Controllers\BaseController;
use \Config\DorbitT;
use App\Models\tijket\UserModel;
use App\Models\tijket\CompanyModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->dorbitt = new DorbitT();
        $this->userModel = new UserModel();
        $this->companyModel = new CompanyModel();
    }

    public function index()
    {
        $identity = $this->dorbitt->identity;
        $authentication = $this->dorbitt->authentication;

        $data = [
            'authentication'    => $authentication,
            // 'template'      => $frontend['template']['mobile'],
            // 'view'          => $frontend['view'],
            'identity'          => $identity,
            // 'navlink'       => 'dashboard',
            // 'page_title'    => 'Dashboard',
            'page'              => 'login',
            // 'breadcrumb'    => ['Dashboard',''],
            // 'breadcrumb_active' => ['active',''],
            // 'header'        => 'header_auth',
            // 'header_image'  => 'default.png',
        ];
        
        return view($authentication['layout'].'main',$data);
    }

    public function do_login()
    {
        $session = session();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where('email', $email)->first();
        $company = $this->companyModel->where('email', $email)->first();

        if ($user) {
            $verify_pass = password_verify($password, $user['password']);
            if($verify_pass){
                // echo "password OK dan saya adalah Admin dari User";
                $ses_data = [
                    'user_id'       => $user['id'],
                    'user_email'    => $email,
                    'user_role'     => $user['role_name'],
                    'user_name'     => $user['name'],
                    'user_image'    => $user['avatar'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/authentication');
            }
        }elseif ($company) {
            $verify_pass = password_verify($password, $company['password']);
            if($verify_pass){
                echo "password OK dan saya adalah Company";
                $ses_data = [
                    'user_id'       => $company['id'],
                    'user_email'    => $email,
                    'user_role'     => 'company',
                    'user_name'     => $company['name'],
                    'user_image'    => $company['image'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/company');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/authentication');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/authentication');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/authentication');
    }
}
