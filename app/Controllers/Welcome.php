<?php

namespace App\Controllers;

/**
* Developer: https://bocahganteng.com/ M. Ali Imron
* Company: https://digitalorbittechnology.com/
* Product: MySiakad
* Directur: https://ummukhairiyahyusna.com/
*/

use App\Controllers\BaseController;

class Welcome extends BaseController
{
    public function index()
    {
        return view('welcome_message');
        // return view('home');
    }
}
