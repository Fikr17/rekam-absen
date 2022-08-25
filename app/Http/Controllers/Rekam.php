<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Rekam extends Controller
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
        return view("/Rekam/index");
    }
    
    public function update(Request $request)
    {
        $id = $request->post('id');
        $status = 'hidden';
        $request->validate([
            'id' => 'required'
        ]);
        if ($id != null) {
            $this->db1->update("UPDATE rekam_absen SET status=? WHERE id=?", [$status, $id]);
            return redirect('/Pages/rekam');
        }
        return redirect("/Pages/rekam");
    }

    public function delete($id)
    {
        $del = $this->db1->update("DELETE FROM rekam_absen WHERE id=?", [$id]);
        return response()->json(['status'=>'berhasil', 'message'=> $id.' dihapus']);
    }

    public function reset_aktivitas()
    {
        $this->db1->update("DELETE FROM aktivitas");
        return redirect()->to("/Pages/rekam");
    }

}

?>