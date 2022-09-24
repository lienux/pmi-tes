<?php

namespace App\Controllers\pmi\Company;

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
        // $admin = $this->dorbitt->admin;
        $company = $this->dorbitt->company;
        // echo json_encode($admin);
        $data = [
            'company'       => $company,
            'view'          => $company['view'],
            'identity'      => $this->dorbitt->identity,
            'navlink'       => 'dashboard',
            'page'          => 'dashboard/dashboard',
            'breadcrumb'    => ['Dashboard','Index'],
            'breadcrumb_active' => ['active','']
        ];

        // return view('tijket/Company/Layout/main',$data);
        return view($company['view']['layout'].'main',$data);
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
