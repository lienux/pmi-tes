<?php

namespace App\Controllers\Admin;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: https://trackingnesia.com/
* Directur: https://ummukhairiyahyusna.com/
*/

use App\Controllers\BaseController;
use \Config\DorbitT;

use App\Models\UserModel;
use App\Models\UserRoleModel;

use App\Models\DriverModel;
use App\Models\UserDriverModel;

use App\Models\GeofenceModel;
use App\Models\UserGeofenceModel;

use App\Models\StopModel;
use App\Models\UserStopModel;
use App\Models\RouteModel;
use App\Models\UserRouteModel;

use App\Helpers\DorbittHelper;
use App\Helpers\Users\UserHelper;
use App\Helpers\Routes\RouteHelper;

class Route extends BaseController
{
    // protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->stopModel = new StopModel();
        $this->user_stop_model = new UserStopModel();
        $this->routeModel = new RouteModel();
        $this->user_route_model = new UserRouteModel();

        $this->dorbitt_helper = new DorbittHelper();
        $this->user_helper = new UserHelper();
        $this->route_helper = new RouteHelper();

        $this->dorbitt = new DorbitT();
        $this->admin = $this->dorbitt->admin;
    }

    public function index()
    {
        $dorbitt = $this->dorbitt;
        $admin = $this->dorbitt->admin;

        $user = [];
        if ($this->userModel->levelID()==1) {
            $user = $this->userModel->where('admin', $this->userModel->userID())->findAll();
        }else if ($this->userModel->levelID()==2) {
            $user = $this->userModel->where('parent', $this->userModel->userID())->findAll();
        }


        $users_id_arr = $this->route_helper->get_users();
        
        $routes = $this->routeModel->find($users_id_arr);

        foreach ((array) $routes as $keyd => $value_route) {

            $stops = json_decode($value_route['stops']);
            $users = json_decode($value_route['users']);

            $users_arr = [];
            $stops_arr = [];

            if ($stops) { $stops_arr = $stops; }else{ $stops_arr = [0]; }
            if ($users) { $users_arr = $users; }else{ $users_arr = [0]; }

            $routes[$keyd]['stops_name'] = $this->get_stops_arr($stops_arr);
            $routes[$keyd]['users_name'] = $this->user_helper->get_users($users_arr);
            $routes[$keyd]['active_name'] = $this->dorbitt_helper->status($value_route['active']);
        }


        // $users = $this->userModel->findAll();
        // $data_byUser = $this->user_route_model->findRouteByUser();

        // $routes = [];
        // if ($data_byUser) {
        //     foreach ($data_byUser as $key => $value) {
        //         $routeId_Arr[] = $value['route_id'];
        //     }

        //     $ids = array_map('intval', $routeId_Arr);
        //     $routes = $this->routeModel->find($ids);

        //     foreach ($routes as $keyd => $value_route) {
        //         $userIdByRoute = $this->userIdByRouteId_arr($value_route['id']);
        //         $routes[$keyd]['user_arr'] = $userIdByRoute;

        //         $stops_id = $value_route['stops'];
        //         $stops_id = json_decode($stops_id);
        //         $routes[$keyd]['stops_name'] = $this->get_stops_arr($stops_id);
        //     }
        // }

        $stops_byUser = $this->user_stop_model->findStopByUser();
        $stops = [];
        if ($stops_byUser) {
            foreach ($stops_byUser as $key => $value) {
                $stopId_Arr[] = $value['stop_id'];
            }

            $ids = array_map('intval', $stopId_Arr);
            $stops = $this->stopModel->find($ids);

            foreach ($stops as $keyd => $value_stop) {
                $userIdByStop = $this->userIdByStopId_arr($value_stop['id']);
                $stops[$keyd]['user_arr'] = $userIdByStop;
            }
        }
        
        $data = [
            'dorbitt'       => $dorbitt,
            'admin'         => $admin,
            'navlink'       => 'route',
            'page'          => 'route/routes',
            'breadcrumb'    => ['Route',''],
            'breadcrumb_active' => ['active',''],
            'table_title'   => 'List Route',
            'appjs'         => view($admin['pages'].'route/appjs'),
            'modal'         => view($admin['pages'].'route/modal',['users'=>$user,'stops'=>$stops]),
            'routes'         => $routes
        ];
        return view($admin['layout'].'main',$data);
    }

    private function userIdByRouteId_arr($id)
    {
        $userIdByDriver = $this->user_route_model->findUserByRoute($id);
        $users = $this->userModel->findAll();

        foreach ((array) $userIdByDriver as $key => $value) {
            foreach ($users as $keyU => $value_user) {
                if ($value['user_id']==$value_user['id']) {
                    $email = $value_user['email'];
                }
            }
            $email_arr[] = '<span class="badge bg-secondary">'.$email.'</span>';
        }

        return implode(" ",$email_arr);
    }

    private function userIdByStopId_arr($id)
    {
        $userIdByDriver = $this->user_stop_model->findUserByStop($id);
        $users = $this->userModel->findAll();

        $email_arr = [];
        foreach ((array) $userIdByDriver as $key => $value) {
            foreach ($users as $keyU => $value_user) {
                if ($value['user_id']==$value_user['id']) {
                    $email = $value_user['email'];
                }
            }
            $email_arr[] = '<span class="badge bg-secondary">'.$email.'</span>';
        }

        return implode(" ",$email_arr);
    }

    private function get_stops_arr($arr_id)
    {
        $data = $this->stopModel->find($arr_id);

        $name = [];
        foreach ((array) $data as $key => $value) {
            $name[] = '<span class="badge bg-danger">'.$value['name'].'</span>';
        }

        return implode(" ",$name);
    }
}
