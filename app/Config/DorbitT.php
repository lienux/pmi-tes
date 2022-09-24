<?php

namespace Config;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: Tijket
* Directur: https://ummukhairiyahyusna.com/
*/

use CodeIgniter\Config\BaseConfig;

class DorbitT extends BaseConfig {

    public $identity = [
        'app'               => 'PMI',
        'title'             => 'Tes PMI',
        'dashboard_title'   => 'Dashbaord PMI',
        'login_title'       => 'Login Tijket',
        'favicon'           => 'pmi/assets/img/pmi.png',
        'logo'              => 'uploads/images/pmi.png',
        'copyright'         => 'PMI',
        'head_title'        => 'PMI',
        'developed'         => 'PMI Center',
        'developer_site'    => 'https://bocahganteng.com/',
    ];


    public $authentication = [
        'layout'             => 'pmi/Authentication/Layout/',
        'pages'              => 'pmi/Authentication/Pages/',
    ];


    public $frontend = [
        'template' => '/tijket/templates/travelix/',
        'layout'    => 'tijket/Frontend/Layout/',
        'pages'     => 'tijket/Frontend/Pages/',
        
        'view' => [
            'layout'    => 'tijket/Frontend/Layout/',
            'pages'     => 'tijket/Frontend/Pages/',
        ],


        // 'identity' => [
        //     'app'               => 'TIJKET',
        //     'title'             => 'Tijket',
        //     'dashboard_title'   => 'Admin Tijket',
        //     'login_title'       => 'Login Tijket',
        //     'favicon'           => 'assets/img/favicon.ico',
        //     'logo'              => 'uploads/images/logo-mini-light.svg',
        //     'copyright'         => 'TIJKET',
        //     'head_title'        => 'TIJKET',
        //     'developed'         => 'TrackingNesia',
        //     'developer_site'    => 'https://trackingnesia.com/',
        //     'sidebarItem'       => 'collapsed',
        // ]
    ];

    public $company = [
        'assets' => '/pmi/assets/',
        // 'layout'    => 'tijket/Company/Layout/',
        // 'pages'     => 'tijket/Company/Pages/',
        
        'view' => [
            'layout'    => 'pmi/Company/Layout/',
            'pages'     => 'pmi/Company/Pages/',
        ],
    ];


    public $admin = [
        'layout'    => 'pmi/Admin/Layout/',
        'pages'     => 'pmi/Admin/Pages/',
    ];


    public $keyMap = 'AIzaSyDh_uXzQI4oclrmisibbLcpRsfkI8tAdxc';

    public $companyCategory = [
        ''
    ];
}