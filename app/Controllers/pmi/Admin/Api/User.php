<?php

namespace App\Controllers\Admin\Api;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: https://trackingnesia.com/
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\UserRoleModel;

class User extends ResourceController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userRoleModel = new UserRoleModel();

        $userModel = new UserModel();
        $info = $userModel->info();
        $this->info = $userModel->info();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $modelUser = new UserModel;
        
        $user = $modelUser->find($id);
        if ($user) {
            $data = array(
                "status" => true,
                "trackingnesia" => $user
            );            
        }else{
            $data = array(
                "status" => false,
                "trackingnesia" => null
            );
        }
        return $this->respond($data, 200);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);

        if ($this->userModel->levelID()==1) {
            $admin = $this->userModel->userID();
        }else{
            $admin = $this->userModel->adminID();
        }

        $data = [
            'company_id' => $this->userModel->companyID(),
            'admin'    => $admin,
            'parent'   => $this->request->getVar('parent'),
            'level_id' => $this->request->getVar('level'),
            'name'     => $this->request->getVar('name'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'active'   => $this->request->getVar('active')
        ];

        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[5]|max_length[200]',
            'level'         => 'required',
            'active'        => 'required'
        ];
         
        if($this->validate($rules)){
            $insertUser = $this->userModel->insert($data);
            if ($insertUser){
                $data = array_merge($data,['user_id'=>$insertUser]);
                $insertRole = $this->userRoleModel->save($data);
                
                $response = array(
                    "status" => true,
                    "message" => "Insert data success.",
                    "trackingnesia" => ["id"=>$insertUser]
                );
            }else{
                $response = array(
                    "status" => false,
                    "message" => "Insert data error!",
                    "trackingnesia" => null
                );
            }
        }else{
            $response = array(
                "status" => false,
                "message" => "Validation error! <br>".$this->validator->listErrors(),
                "trackingnesia" => null
            );
        }

        return $this->respond($response, 200);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        helper(['form']);

        if ($this->userModel->levelID()==1) {
            $admin = $this->userModel->userID();
        }else{
            $admin = $this->userModel->adminID();
        }

        if ($this->request->getVar('password')=='') {
            $data = [
                'company_id' => $this->userModel->companyID(),
                'admin'    => $admin,
                'parent'   => $this->request->getVar('parent'),
                'level_id' => $this->request->getVar('level'),
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'active'   => $this->request->getVar('active')
            ];
        }else{
            $data = array_merge($data,['password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)]);
        }


        $email = $this->userModel->find($id)['email'];
        if ($email==$this->request->getVar('email')) {
            $rules = [
                'name'          => 'required|min_length[3]|max_length[20]',
                'email'         => 'required|min_length[5]|max_length[50]|valid_email',
                'level'         => 'required',
                'active'        => 'required'
            ];
        }else{
            $rules = [
                'name'          => 'required|min_length[3]|max_length[20]',
                'email'         => 'required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]',
                'level'         => 'required',
                'active'        => 'required'
            ];            
        }
         
        if($this->validate($rules)){
            $updateUser = $this->userModel->update($id,$data);
            if ($updateUser){
                $data = array_merge($data,['user_id'=>$updateUser]);
                $updateRole = $this->userRoleModel->role_update($id,["role"=>$this->request->getVar('level')]);
                
                $response = array(
                    "status" => true,
                    "message" => "Update data success.",
                    "trackingnesia" => ["id"=>$updateUser]
                );
            }else{
                $response = array(
                    "status" => false,
                    "message" => "Update data error!",
                    "trackingnesia" => null
                );
            }
        }else{
            $response = array(
                "status" => false,
                "message" => "Validation error! <br>".$this->validator->listErrors(),
                "trackingnesia" => null
            );
        }

        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $userDelete = $this->userModel->delete($id);
        if ($userDelete) {
            $data_response = [
                "status" => true,
                "message" => "Delete success.",
                "trackingnesia" => $userDelete
            ];
        }else{
            $data_response = [
                "status" => false,
                "message" => "Delete error.",
                "trackingnesia" => null
            ];
        }
        return $this->respond($data_response, 200);
    }

    public function delete_in($id)
    {
        $id_arr = explode(',',$id);
        
        $userDelete = $this->userModel->delete($id_arr);
        if ($userDelete) {
            foreach ($id_arr as $value) {
            }
            $data_response = [
                "status" => true,
                "message" => "Delete success.",
                "trackingnesia" => $userDelete
            ];
        }else{
            $data_response = [
                "status" => false,
                "message" => "Delete error.",
                "trackingnesia" => null
            ];
        }
        return $this->respond($data_response, 200);
    }
}
