<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pages extends Controller
{
    public function akun()
    {
        return view("/Akun/index");
    }
    
    public function rekam()
    {
        return view("/Absen/index");
    }

    public function course()
    {
        return view("/Course/index");
    }

}

?>