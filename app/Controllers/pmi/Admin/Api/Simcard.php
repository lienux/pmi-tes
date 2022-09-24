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
use App\Models\UserRoleModel;
use App\Models\VehicleModel;
use App\Models\VehicleUserModel;
use App\Models\GpsModel;
use App\Models\SimcardModel;
use App\Models\UserStopModel;

use App\Models\RouteModel;
use App\Models\UserRouteModel;

class Simcard extends ResourceController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->simcard_model = new SimcardModel();
        // $this->userStopModel = new UserStopModel();

        // $this->route_model = new RouteModel();
        // $this->user_route_model = new UserRouteModel();
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
        // $userId_arr = $this->user_route_model->findUserByRoute($id);
        // $userId_arrNew = [];
        // foreach ($userId_arr as $key => $value) {
        //     $userId_arrNew[] = (int)$value['user_id'];
        // }

        $card = $this->simcard_model->find($id);
        if ($card) {
            $data = array(
                "status" => true,
                "trackingnesia" => $card
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

        // $stop = $this->request->getVar('stop');
        $user = $this->request->getVar('user');
        // if ($stop) { $stop = $stop; }else{ $stop = [0]; }
        if ($user) { $user = $user; }else{ $user = [0]; }

        // $stops = json_encode($stop);

        $user = array_merge([$this->userModel->userID()],$user);
        $users = json_encode($user);

        $data = [
            'active'            => $this->request->getVar('active'),
            'company_id'        => $this->userModel->companyID(),
            'user_id'           => $this->userModel->userID(),
            'installer'         => $this->userModel->userID(),
            'operator_id'       => $this->request->getVar('operator'),
            'gsm_no'            => $this->request->getVar('gsm_no'),
            'msidn'             => $this->request->getVar('msidn'),
            'imsi_no'           => $this->request->getVar('imsi_no'),
            'users'             => $users
        ];

        $rules = [
            'gsm_no'            => 'required',
            'operator'          => 'required'
        ];

        $usersget = $this->request->getVar('user');
        
        if($this->validate($rules)){
            $insert = $this->simcard_model->insert($data);
            if ($insert){
                
                // $this->user_route_model->insert(["user_id"=>$this->userModel->userID(),"route_id"=>$insert]);

                // foreach ((array) $usersget as $key => $value) {
                //     $dataRoute = [
                //         "user_id" => $value,
                //         "route_id" => $insert
                //     ];
                //     if ($value) {
                //         $this->user_route_model->insert($dataRoute);              
                //     }
                // }

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
        if ($user) { $user = $user; }else{ $user = [0]; }

        $user = array_merge([$this->userModel->userID()],$user);
        $users = json_encode($user);

        $data = [
            'active'            => $this->request->getVar('active'),
            'operator_id'       => $this->request->getVar('operator'),
            'gsm_no'            => $this->request->getVar('gsm_no'),
            'msidn'             => $this->request->getVar('msidn'),
            'imsi_no'           => $this->request->getVar('imsi_no'),
            'users'             => $users
        ];

        $rules = [
            'gsm_no'            => 'required',
            'operator'          => 'required'
        ];

        $usersget = $this->request->getVar('user');
        
        if($this->validate($rules)){
            $update = $this->simcard_model->update($id,$data);
            if ($update){                
                // $where = "route_id=".$id." AND user_id!=".$this->userModel->userID();
                // $this->user_route_model->where($where)->delete();

                // foreach ((array) $usersget as $key => $value) {
                //     $dataRoute = [
                //         "user_id" => $value,
                //         "route_id" => $id
                //     ];
                //     if ($value) {
                //         $this->user_route_model->insert($dataRoute);              
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
        $delete = $this->simcard_model->delete($id);
        if ($delete) {
            // $this->user_route_model->where('route_id',$id)->delete();
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
        
        $delete = $this->simcard_model->delete($id_arr);
        if ($delete) {
            // foreach ($id_arr as $value) {
            //     $this->user_route_model->where('route_id',$value)->delete();
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
