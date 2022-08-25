<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pages extends Controller
{
    protected $db1;
    protected $db2;
    public function __construct()
    {
        $this->db1 = DB::connection("pgsql");
        $this->db2 = DB::connection("pgsql2");
    }

    public function akun()
    {
        return view("/Akun/index");
        
    }
    
    public function rekam()
    {
        $user = $this->db1->select("SELECT * FROM akun WHERE email='03041282126032@student.unsri.ac.id'")[0];
        // $aktivitas = $this->db1->select("SELECT * FROM aktivitas LIMIT 10");// mengambil dari awal
        $aktivitas = $this->db1->select("SELECT * FROM aktivitas ORDER BY id DESC LIMIT 10");// mengambil dari akhir
        $data = [
            'id' => $user->id,
            'show' => $user->show,
            'aktivitas' => $aktivitas
        ];
        return view("/Absen/index", $data);
    }

    public function course()
    {
        return view("/Course/index");
    }

}

?>