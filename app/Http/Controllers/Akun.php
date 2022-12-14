<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Akun extends Controller
{
    protected $db1;
    protected $db2;
    public function __construct()
    {
        $this->db1 = DB::connection("pgsql");
        $this->db2 = DB::connection("pgsql2");
    }

    public function index()
    {
        return view("/Akun/index");
    }
    
    public function update(Request $request)
    {
        $id = $request->post("id");
        $status = $request->post("status");
        $request->validate([
            'id' => 'required'
        ]);
        if ($id != null) {
            $this->db1->update("UPDATE akun SET show=? WHERE id=?", [$status, $id]);
            return response()->json(['status'=>"update data id: $id $status"]);
        }
        return response()->json(["status"=>'fail']);
    }
}

?>