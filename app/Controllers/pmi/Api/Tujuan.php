<?php

namespace App\Controllers\tijket\Api;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: Tijket
* Directur: 
*/

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\Files\UploadedFile;
// use App\Models\UserModel;
// use App\Models\UserRoleModel;
// use App\Models\VehicleModel;
// use App\Models\VehicleUserModel;
// use App\Models\StopModel;
// use App\Models\UserStopModel;

// use App\Models\RouteModel;
// use App\Models\UserRouteModel;

use App\Models\tijket\PulauModel;
// use App\Models\Tijket\RuteModel;
use App\Models\tijket\RouteModel;
use App\Models\tijket\PelabuhanModel;

class Tujuan extends ResourceController
{
    public function __construct()
    {
        // $this->userModel = new UserModel();
        // $this->stopModel = new StopModel();
        // $this->userStopModel = new UserStopModel();

        $this->modPulau = new PulauModel();
        // $this->rute_model = new RuteModel();
        $this->modRoute = new RouteModel();
        $this->modPelabuhan = new PelabuhanModel();
        // $this->user_route_model = new UserRouteModel();

        // $this->ruteModel = new RuteModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        echo "index OK";
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        // // $userId_arr = $this->user_route_model->findUserByRoute($id);
        // // $userId_arrNew = [];
        // // foreach ($userId_arr as $key => $value) {
        // //     $userId_arrNew[] = (int)$value['user_id'];
        // // }

        // $route = $this->route_model->find($id);
        // if ($route) {
        //     $data = array(
        //         "status" => true,
        //         "trackingnesia" => $route
        //     );            
        // }else{
        //     $data = array(
        //         "status" => false,
        //         "trackingnesia" => null
        //     );
        // }
        // return $this->respond($data, 200);
    }

    // ini adalah untuk menampilkan rute yang tersedia dari rute yang dibuat oleh company/perusahaan/operator/penyedia boat
    public function byFrom($id = null)
    {
        $route = $this->modRoute->where('active', 1)->where('from_id', $id)->findAll();
        if ($route) {
            $aroute = $route;
            foreach ($aroute as $key => $value) {
                $to_id[] = $value['to_id'];
            }
        }else{
            $to_id = '[""]';
        }

        // echo json_encode($a);

        // ubah isi array ke int
        // $tujuan_array_id = array_map('intval', json_decode($a));

        $pulau = $this->modPulau->findAll();
        $tujuan = $this->modPelabuhan->find($to_id);

        // pengumpulan pulau_id ke dalam bentuk array
        $array_pulau_id = [];
        foreach ($tujuan as $key2 => $value2) {
            $pulau_id = $value2['pulau_id'];
            $array_pulau_id[] = $value2['pulau_id'];
        }


        foreach ($pulau as $key => $value) {
            $id = $value['id'];
            $name = $value['name'];

            // jika terdapat id yg sama antara daftar pulau dengan pulau_id yg dikumpulkan
            // hanya mengambil salah satu saja jika terdapat daftar yang sama
            if(in_array($id ,$array_pulau_id)) {
                $pulau_group[] = array(
                    "pulau_id"=>$id,
                    "pulau_name"=>$name,
                    "pelabuhan_tujuan"=>$this->modPelabuhan->where('pulau_id', $id)->findAll()
                );
            }
        }

        if ($route) {
            $data = array(
                "status" => true,
                "tijket" => $pulau_group
            );            
        }else{
            $data = array(
                "status" => false,
                "tijket" => null
            );
        }
        return $this->respond($data, 200);
    }


    public function tujuan2($id = null)
    {
        // $routes = $this->route_model->where('active', 1)->where('from_id', $id)->findAll();
        // $pelabuhans = $this->pelabuhan_model->where('active', 1)->findAll();

        // foreach ($pelabuhans as $key => $value) {
        //     $pelabuhan_id_array[] = $value['id'];
        // }

        // foreach ($routes as $key => $value) {
        //     $to_id_arr[] = $value['to_id'];
        // }

        // foreach ($pelabuhans as $key => $value) {
        //     $id = $value['id'];

        //     if(in_array($id ,$to_id_arr)) {
        //         $tujuan_available[] = $value;
        //     }
        // }

        // $pulau = $this->pulau_model->findAll();

        // foreach ($tujuan_available as $key => $value) {
        //     $pulau_id = $value['pulau_id'];
        //     $array_pulau_id[] = $value['pulau_id'];
        // }

        // foreach ($pulau as $key => $value) {
        //     $id = $value['id'];
        //     $name = $value['name'];

        //     // jika terdapat id yg sama antara daftar pulau dengan pulau_id yg dikumpulkan
        //     if(in_array($id ,$array_pulau_id)) {

        //         // ambil aja salah satunya untuk dijadikan group
        //         $pulau_group[] = array(
        //             "pulau_id"=>$id,
        //             "pulau_name"=>$name,
        //             "pelabuhan_tujuan"=>$this->pelabuhan_model->where('pulau_id', $id)->findAll()
        //         );
        //     }
        // }

        // if ($routes) {
        //     $data = array(
        //         "status" => true,
        //         "tijket" => $pulau_group
        //     );            
        // }else{
        //     $data = array(
        //         "status" => false,
        //         "tijket" => null
        //     );
        // }
        // return $this->respond($data, 200);
    }

    // public function tujuan($id = null)
    // {
    //     $route = $this->route_model->where('active', 1)->where('from_id', $id)->findAll();
    //     if ($route) {
    //         $aroute = $route;
    //         foreach ($aroute as $key => $value) {
    //             $a = $value['to_id'];
    //         }
    //     }else{
    //         $a = '[""]';
    //     }

    //     // echo $a;

    //     // ubah isi array ke int
    //     $tujuan_array_id = array_map('intval', json_decode($a));

    //     $pulau = $this->pulau_model->findAll();
    //     $tujuan = $this->pelabuhan_model->find($tujuan_array_id);

    //     // pengumpulan pulau_id ke dalam bentuk array
    //     $array_pulau_id = [];
    //     foreach ($tujuan as $key2 => $value2) {
    //         $pulau_id = $value2['pulau_id'];
    //         $array_pulau_id[] = $value2['pulau_id'];
    //     }


    //     foreach ($pulau as $key => $value) {
    //         $id = $value['id'];
    //         $name = $value['name'];
    //         $pelabuhan_tujuan = $this->pelabuhan_model->where('pulau_id', $id)->findAll();

    //         // foreach ($pelabuhan_tujuan as $value4) {
    //         //     $pelabuhan_id = $value4['id'];
    //         //     $pelabuhan_name = $value4['name'];
    //         //     $pelabuhan_tujuann[] = "<option value='".$pelabuhan_id."'>".$pelabuhan_name."</option>";
    //         // }

    //         // jika terdapat id yg sama antara daftar pulau dengan pulau_id yg dikumpulkan
    //         if(in_array($id ,$array_pulau_id)) {
    //             $pulau_group[] = array(
    //                 "pulau_id"=>$id,
    //                 "pulau_name"=>$name,
    //                 "pelabuhan_tujuan"=>$pelabuhan_tujuan
    //             );
    //         }
    //     }

    //     if ($route) {
    //         $data = array(
    //             "status" => true,
    //             "tijket" => $pulau_group
    //         );            
    //     }else{
    //         $data = array(
    //             "status" => false,
    //             "tijket" => null
    //         );
    //     }
    //     return $this->respond($data, 200);
    // }

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

        // $stop = $this->request->getVar('stop');
        // $user = $this->request->getVar('user');
        // if ($stop) { $stop = $stop; }else{ $stop = [0]; }
        // if ($user) { $user = $user; }else{ $user = [0]; }

        // $stops = json_encode($stop);

        // $user = array_merge([$this->userModel->userID()],$user);
        // $users = json_encode($user);

        // $data = [
        //     'company_id'        => $this->userModel->companyID(),
        //     'user_id'           => $this->userModel->userID(),
        //     'installer'         => $this->userModel->userID(),
        //     'name'              => $this->request->getVar('name'),
        //     'from_name'         => $this->request->getVar('from_name'),
        //     'to_name'           => $this->request->getVar('to_name'),
        //     'from_latlng'       => $this->request->getVar('from_latlng'),
        //     'to_latlng'         => $this->request->getVar('to_latlng'),
        //     'stops'             => $stops,
        //     'distance'          => $this->request->getVar('distance'),
        //     'active'            => $this->request->getVar('active'),
        //     'users'             => $users
        // ];

        // $rules = [
        //     'name'              => 'required',
        //     'from_name'         => 'required',
        //     'to_name'           => 'required'
        // ];

        // $usersget = $this->request->getVar('user');
        
        // if($this->validate($rules)){
        //     $insert = $this->route_model->insert($data);
        //     if ($insert){
                
        //         // $this->user_route_model->insert(["user_id"=>$this->userModel->userID(),"route_id"=>$insert]);

        //         // foreach ((array) $usersget as $key => $value) {
        //         //     $dataRoute = [
        //         //         "user_id" => $value,
        //         //         "route_id" => $insert
        //         //     ];
        //         //     if ($value) {
        //         //         $this->user_route_model->insert($dataRoute);              
        //         //     }
        //         // }

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

        // $stop = $this->request->getVar('stop');
        // $user = $this->request->getVar('user');
        // if ($stop) { $stop = $stop; }else{ $stop = [0]; }
        // if ($user) { $user = $user; }else{ $user = [0]; }

        // $stops = json_encode($stop);

        // $user = array_merge([$this->userModel->userID()],$user);
        // $users = json_encode($user);

        // $data = [
        //     'name'              => $this->request->getVar('name'),
        //     'from_name'         => $this->request->getVar('from_name'),
        //     'to_name'           => $this->request->getVar('to_name'),
        //     'from_latlng'       => $this->request->getVar('from_latlng'),
        //     'to_latlng'         => $this->request->getVar('to_latlng'),
        //     'stops'             => $stops,
        //     'distance'          => $this->request->getVar('distance'),
        //     'active'            => $this->request->getVar('active'),
        //     'users'             => $users
        // ];

        // $rules = [
        //     'name'              => 'required',
        //     'from_name'         => 'required',
        //     'to_name'           => 'required'
        // ];

        // $usersget = $this->request->getVar('user');
        
        // if($this->validate($rules)){
        //     $update = $this->route_model->update($id,$data);
        //     if ($update){                
        //         // $where = "route_id=".$id." AND user_id!=".$this->userModel->userID();
        //         // $this->user_route_model->where($where)->delete();

        //         // foreach ((array) $usersget as $key => $value) {
        //         //     $dataRoute = [
        //         //         "user_id" => $value,
        //         //         "route_id" => $id
        //         //     ];
        //         //     if ($value) {
        //         //         $this->user_route_model->insert($dataRoute);              
        //         //     }
        //         // }

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
        // $delete = $this->route_model->delete($id);
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
        
        // $delete = $this->route_model->delete($id_arr);
        // if ($delete) {
        //     // foreach ($id_arr as $value) {
        //     //     $this->user_route_model->where('route_id',$value)->delete();
        //     // }
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
