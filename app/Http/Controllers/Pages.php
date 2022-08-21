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
        $user = DB::connection('pgsql')->select("SELECT * FROM akun WHERE email='03041282126032@student.unsri.ac.id'")[0];
        $data = [
            'id' => $user->id,
            'show' => $user->show
        ];
        return view("/Absen/index", $data);
    }

    public function course()
    {
        return view("/Course/index");
    }

}

?>