<?php

namespace App\Controllers\tijket\Api;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: Tijket
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\Files\UploadedFile;
// use App\Models\UserModel;
use App\Models\tijket\PulauModel;
// use App\Models\IbuttonModel;
// use App\Models\UserRoleModel;
// use App\Models\VehicleModel;
// use App\Models\VehicleUserModel;
// use App\Models\UserStopModel;

// use App\Models\RouteModel;
// use App\Models\UserRouteModel;

class Pulau extends ResourceController
{    
    public function __construct()
    {
        // $this->userModel = new UserModel();
        // $this->ibutton_model = new IbuttonModel();
        $this->modPulau = new PulauModel();
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
        $id         = $this->request->getVar('id');
        $active     = $this->request->getVar('active');

        $rules = [
            'active' => ['rules' => 'required'],
        ];

        if($this->validate($rules)) {
            $this->modPulau->where('active',$active);

            if ($id) {
                $this->modPulau->where('id',$id);
            }

            $query = $this->modPulau->findAll();

            if ($query) {
                $data = array(
                    "status" => true,
                    "tijket" => $query
                );            
            }else{
                $data = array(
                    "status" => false,
                    "tijket" => null
                );
            }
            return $this->respond($data, 200);
        }else{
            $data = array(
                "status" => false,
                "errors" => $this->validator->getErrors(),
                "tijket" => null,
            );

            return $this->respond($data, 409);
             
        }

        // $this->modPelabuhan->where('active',$active);

        // if ($id) {
        //     $this->modPelabuhan->where('id',$id);
        // }

        // if ($pulau_id) {
        //     $this->modPelabuhan->where('pulau_id',$pulau_id);
        // }

        // $query = $this->modPelabuhan->findAll();

        // if ($query) {
        //     $data = array(
        //         "status" => true,
        //         "tijket" => $query
        //     );            
        // }else{
        //     $data = array(
        //         "status" => false,
        //         "tijket" => null
        //     );
        // }
        // return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $query = $this->modPulau->find($id);
        if ($query) {
            $data = array(
                "status" => true,
                "tijket" => $query
            );            
        }else{
            $data = array(
                "status" => false,
                "tijket" => null
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
        // helper(['form']);

        // $user = $this->request->getVar('user');
        // if ($user) { $user = $user; }else{ $user = [0]; }

        // $user = array_merge([$this->userModel->userID()],$user);
        // $users = json_encode($user);

        // $data = [
        //     'active'            => $this->request->getVar('active'),
        //     'company_id'        => $this->userModel->companyID(),
        //     'user_id'           => $this->userModel->userID(),
        //     'installer'         => $this->userModel->userID(),
        //     'ibutton_no'        => $this->request->getVar('ibutton_no'),
        //     'users'             => $users
        // ];

        // $rules = [
        //     'ibutton_no'        => 'required'
        // ];

        // $usersget = $this->request->getVar('user');
        
        // if($this->validate($rules)){
        //     $insert = $this->ibutton_model->insert($data);
        //     if ($insert){
        //         $response = array(
        //             "status" => true,
        //             "message" => "Insert data success.",
        //             "trackingnesia" => ["id"=>$insert]
        //         );
        //     }else{
        //         $response = array(
        //             "status" => false,
        //             "message" => "Insert data error!",
        //             "trackingnesia" => null
        //         );
        //     }
        // }else{
        //     $response = array(
        //         "status" => false,
        //         "message" => "Validation error! <br>".$this->validator->listErrors(),
        //         "trackingnesia" => null
        //     );
        // }

        // return $this->respond($response, 200);
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
        // helper(['form']);

        // $user = $this->request->getVar('user');
        // if ($user) { $user = $user; }else{ $user = [0]; }

        // $user = array_merge([$this->userModel->userID()],$user);
        // $users = json_encode($user);

        // $data = [
        //     'active'            => $this->request->getVar('active'),
        //     'ibutton_no'        => $this->request->getVar('ibutton_no'),
        //     'users'             => $users
        // ];

        // $rules = [
        //     'ibutton_no'        => 'required'
        // ];

        // $usersget = $this->request->getVar('user');
        
        // if($this->validate($rules)){
        //     $update = $this->ibutton_model->update($id,$data);
        //     if ($update){
        //         $response = array(
        //             "status" => true,
        //             "message" => "Update data success.",
        //             "trackingnesia" => ["id"=>$update]
        //         );
        //     }else{
        //         $response = array(
        //             "status" => false,
        //             "message" => "Update data error!",
        //             "trackingnesia" => null
        //         );
        //     }
        // }else{
        //     $response = array(
        //         "status" => false,
        //         "message" => "Validation error! <br>".$this->validator->listErrors(),
        //         "trackingnesia" => null
        //     );
        // }

        // return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        // $delete = $this->ibutton_model->delete($id);
        // if ($delete) {
        //     // $this->user_route_model->where('route_id',$id)->delete();
        //     $response = [
        //         "status" => true,
        //         "message" => "Delete success.",
        //         "trackingnesia" => $delete
        //     ];
        // }else{
        //     $response = [
        //         "status" => false,
        //         "message" => "Delete error.",
        //         "trackingnesia" => null
        //     ];
        // }
        // return $this->respond($response, 200);
    }

    public function delete_in($id)
    {
        // $id_arr = explode(',',$id);
        
        // $delete = $this->ibutton_model->delete($id_arr);
        // if ($delete) {
        //     $response = [
        //         "status" => true,
        //         "message" => "Delete success.",
        //         "trackingnesia" => $delete
        //     ];
        // }else{
        //     $response = [
        //         "status" => false,
        //         "message" => "Delete error.",
        //         "trackingnesia" => null
        //     ];
        // }
        // return $this->respond($response, 200);
    }
}
