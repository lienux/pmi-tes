<?php

namespace App\Controllers\Admin\Api;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: https://trackingnesia.com/
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\Files\UploadedFile;
use App\Models\UserModel;
// use App\Models\UserRoleModel;
// use App\Models\VehicleModel;
// use App\Models\VehicleUserModel;
use App\Models\StopModel;
// use App\Models\UserStopModel;

class Stop extends ResourceController
{
    public function __construct()
    {
        $this->userModel = new UserModel();        
        $this->stopModel = new StopModel();
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
        $stop = $this->stopModel->find($id);
        if ($stop) {
            $data = array(
                "status" => true,
                "trackingnesia" => $stop
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

        $user = $this->request->getVar('user');
        if ($user) {
            $user = $user;
        }else{
            $user = [0];
        }
        $user = array_merge([$this->userModel->userID()],$user);
        $users = json_encode($user);

        $data = [
            'company_id'        => $this->userModel->companyID(),
            'user_id'           => $this->userModel->userID(),
            'installer'         => $this->userModel->userID(),
            'name'              => $this->request->getVar('name'),
            'latitude'          => $this->request->getVar('lat'),
            'longitude'         => $this->request->getVar('lng'),
            'radius'            => $this->request->getVar('radius'),
            'active'            => $this->request->getVar('active'),
            'users'             => $users
        ];

        $rules = [
            'name'              => 'required',
            'lat'               => 'required',
            'lng'               => 'required'
        ];
        
        if($this->validate($rules)){
            $insert = $this->stopModel->insert($data);
            if ($insert){                

                $response = array(
                    "status" => true,
                    "message" => "Insert data success.",
                    "trackingnesia" => ["id"=>$insert]
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

        $user = $this->request->getVar('user');
        if ($user) {
            $user = $user;
        }else{
            $user = ["0"];
        }
        $user = array_merge([$this->userModel->userID()],$user);
        $users = json_encode($user);

        
        $data = [
            'name'              => $this->request->getVar('name'),
            'latitude'          => $this->request->getVar('lat'),
            'longitude'         => $this->request->getVar('lng'),
            'radius'            => $this->request->getVar('radius'),
            'active'            => $this->request->getVar('active'),
            'users'             => $users
        ];

        $rules = [
            'name'              => 'required',
            'lat'               => 'required',
            'lng'               => 'required'
        ];

        // $usersget = $this->request->getVar('user');
        
        if($this->validate($rules)){
            $update = $this->stopModel->update($id,$data);
            if ($update){
                
                // $where = "stop_id=".$id." AND user_id!=".$this->userModel->userID();
                // $this->userStopModel->where($where)->delete();

                // foreach ((array) $usersget as $key => $value) {
                //     $dataStop = [
                //         "user_id" => $value,
                //         "stop_id" => $id
                //     ];
                //     if ($value) {
                //         $this->userStopModel->insert($dataStop);              
                //     }
                // }

                $response = array(
                    "status" => true,
                    "message" => "Update data success.",
                    "trackingnesia" => ["id"=>$update]
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
        $delete = $this->stopModel->delete($id);
        if ($delete) {
            // $this->userStopModel->where('stop_id',$id)->delete();
            $response = [
                "status" => true,
                "message" => "Delete success.",
                "trackingnesia" => $delete
            ];
        }else{
            $response = [
                "status" => false,
                "message" => "Delete error.",
                "trackingnesia" => null
            ];
        }
        return $this->respond($response, 200);
    }

    public function delete_in($id)
    {
        $id_arr = explode(',',$id);
        
        $delete = $this->stopModel->delete($id_arr);
        if ($delete) {
            // foreach ($id_arr as $value) {
            //     $this->userStopModel->where('stop_id',$value)->delete();
            // }
            $response = [
                "status" => true,
                "message" => "Delete success.",
                "trackingnesia" => $delete
            ];
        }else{
            $response = [
                "status" => false,
                "message" => "Delete error.",
                "trackingnesia" => null
            ];
        }
        return $this->respond($response, 200);
    }
}
