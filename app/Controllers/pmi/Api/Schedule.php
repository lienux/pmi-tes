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
use App\Models\tijket\ScheduleModel;
use App\Models\tijket\TicketBoatModel;

class Schedule extends ResourceController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        // $this->userModel = new UserModel();
        // $this->stopModel = new StopModel();
        // $this->userStopModel = new UserStopModel();

        $this->modPulau = new PulauModel();
        // $this->rute_model = new RuteModel();
        $this->modRoute = new RouteModel();
        $this->modPelabuhan = new PelabuhanModel();
        $this->modSchedule = new ScheduleModel();
        $this->modTicketBoat = new TicketBoatModel();
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
        echo "OK";
        // $id         = $this->request->getVar('id');
        // $active     = $this->request->getVar('active');
        // $from_id    = $this->request->getVar('from_id');
        // $to_id      = $this->request->getVar('to_id');

        // $query = $this->modRoute->query();

        // if ($active!=null) {
        //     $query = $query->where('routes.active',$active);
        // }

        // if ($id) {
        //     $query = $query->where('routes.id',$id);
        // }

        // if ($from_id) {
        //     $query = $query->where('routes.from_id',$from_id);
        // }

        // if ($to_id) {
        //     $query = $query->where('routes.to_id',$to_id);
        // }

        // $query = $this->modRoute->getAll($query);

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

    public function search()
    {
        $from       = $this->request->getVar('from');
        $to         = $this->request->getVar('to');
        $check_in   = $this->request->getVar('check_in');
        $check_out  = $this->request->getVar('check_out');
        $adult      = $this->request->getVar('adult');
        $child      = $this->request->getVar('child');

        // $qRoute = $this->modRoute->query_search();
        // $optRoute = $qRoute->where('routes.from_id', $from)->where('routes.to_id', $to);
        // $route_row = $this->modRoute->getAll_search($optRoute);

        $route = $this->modRoute->where('from_id', $from)->where('to_id', $to)->findAll();
        $id_arr = [];
        foreach ($route as $key => $value) {
            // $id = $value['id'];
            $id_arr[] = $value['id'];
        }


        $schedule = $this->modSchedule->whereIn('route_id', $id_arr)->findAll();
        foreach ($schedule as $key => $value) {
            $route_id = $value['route_id'];

            $qRoute2 = $this->modRoute->query_search();
            $optRoute2 = $qRoute2->where('routes.id', $route_id);
            $route_row2 = $this->modRoute->getAll_search($optRoute2);

            $ticket_boat = $this->modTicketBoat->where('route_id', $route_id)->findAll();
            if (!$ticket_boat) {
                $ticket_boat = array(
                    [
                        'price' => '0',
                    ],
                );

                $tersedia = false;
            }else{
                $tersedia = true;
            }

            $schedule[$key]['route'] = $route_row2['data'][0];
            $schedule[$key]['ticket'] = $ticket_boat[0];
            $schedule[$key]['ticket_ready'] = $tersedia;
        }



        // foreach ((array) $schedule as $key => $value) {
        //     $ticket_ready = $value['ticket_ready'];
        //     if ($ticket_ready==true) {
        //         $schedule[] = $schedule;
        //     }
        // }

        return $this->respond($schedule, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        // $route = $this->modRoute->find($id);
        // if ($route) {
        //     $data = array(
        //         "status" => true,
        //         "tijket" => $route
        //     );            
        // }else{
        //     $data = array(
        //         "status" => false,
        //         "tijket" => null
        //     );
        // }
        // return $this->respond($data, 200);
    }

    public function tujuan($id = null)
    {
        // $pulau = $this->pulau_model->findAll();
        // $pelabuhans = $this->pelabuhan_model->where('active', 1)->findAll();
        // $routes = $this->route_model->where('active', 1)->where('from_id', $id)->findAll();

        // foreach ($routes as $key => $value) {
        //     $to_id_arr[] = $value['to_id'];
        // }

        // foreach ($pelabuhans as $key => $value) {
        //     $id = $value['id'];

        //     if(in_array($id ,$to_id_arr)) {
        //         $tujuan_available[] = $value;
        //     }
        // }

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
        // $session = session();

        // $data = [
        //     'active'            => $this->request->getVar('active'),
        //     'company_id'        => session()->get('user_id'),
        //     'name'              => $this->request->getVar('name'),
        //     'tempat_lahir'      => $this->request->getVar('tempat_lahir'),
        //     'tanggal_lahir'     => $this->request->getVar('tanggal_lahir'),
        //     // 'no_sim'            => $this->request->getVar('no_sim'),
        //     // 'masa_sim'          => => $this->request->getVar('masa_sim'),
        //     'telp'              => $this->request->getVar('telp'),
        // ];
        
        // $rules = [
        //     'name'          => 'required|min_length[3]|max_length[50]',
        //     'telp'          => 'required|min_length[5]|max_length[50]',
        //     'tempat_lahir'  => 'required',
        //     'tanggal_lahir' => 'required',
        // ];
         
        // if($this->validate($rules)){
        //     $insert = $this->modRoute->insert($data);
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
