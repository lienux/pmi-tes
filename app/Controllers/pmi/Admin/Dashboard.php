<?php

namespace App\Controllers\pmi\Admin;

use App\Controllers\BaseController;
use \Config\DorbitT;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->dorbitt = new DorbitT();
    }

    public function index()
    {
        // echo "OK";
        session()->set(['page_workspace'=>'admin']);
        $admin = $this->dorbitt->admin;
        // echo json_encode($admin);
        $data = [
            'admin'         => $admin,
            'view'          => $admin['view'],
            'identity'      => $admin['identity'],
            'navlink'       => 'dashboard',
            'page'          => 'dashboard/dashboard',
            'breadcrumb'    => ['Dashboard',''],
            'breadcrumb_active' => ['active','']
        ];

        return view($admin['view']['layout'].'main',$data);
    }

    // public function dashboard()
    // {
    //     // $dorbitt = $this->dorbitt;
    //     $admin = $this->dorbitt->admin;
    //     $data = [
    //         'dorbitt' => $dorbitt,
    //         'admin' => $admin,
    //         'navlink' => 'dashboard',
    //         'page' => 'dashboard/index',
    //         'breadcrumb' => ['Dashboard','']
    //     ];

    //     return view($admin['layout'].'main',$data);
    // }
}
