<?php

namespace App\Controllers\tijket\Authentication;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: Tijket
* Directur: https://ummukhairiyahyusna.com/
*/

use App\Controllers\BaseController;
use \Config\DorbitT;
use App\Models\UserModel;

class Register extends BaseController
{
    public function __construct()
    {
        $this->dorbitt = new DorbitT();
        $this->layout = $this->dorbitt->layout;
    }

    public function index()
    {
        $dorbitt = $this->dorbitt;
        $authentication = $this->dorbitt->authentication;
        $data = [
            'dorbitt' => $dorbitt,
            'authentication' => $authentication,
            'form' => 'register',
        ];

        return view($authentication.'layout/main',$data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[6]|max_length[200]'
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            // $data['validation'] = $this->validator;
            $dorbitt = $this->dorbitt;
            $authentication = $this->dorbitt->authentication;
            $data = [
                'dorbitt' => $dorbitt,
                'authentication' => $authentication,
                'form' => 'register',
                'validation' => $this->validator,
            ];
            return view($authentication.'layout/main',$data);
        }
         
    }
}
