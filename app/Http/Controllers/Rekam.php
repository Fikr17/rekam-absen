<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Rekam extends Controller
{
    protected $db1;
    public function __construct()
    {
        $this->db1 = DB::connection("pgsql");
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
        $this->db1->update("UPDATE rekam_absen SET status=? WHERE id=?", [$status, $id]);
        return redirect("/Pages/rekam");
    }

    public function delete($id)
    {
        $del = $this->db1->delete("DELETE FROM rekam_absen WHERE id=?", [$id]);
        if($del == 1){
            return response()->json(['status' => 'berhasil', 'message' => $id . ' dihapus'], 202);
        }
        return response()->json(['status' => 'gagal', 'message' => $id . ' tidak ditemukan'], 404);
    }

    public function reset_aktivitas()
    {
        $this->db1->delete("DELETE FROM aktivitas");
        $this->db1->select("ALTER SEQUENCE aktivitas_id_seq RESTART WITH 1");
        $this->db1->commit();
        return redirect()->to("/Pages/rekam");
    }

    public function reset_ram()
    {
        $this->db1->delete("DELETE FROM os_usage");
        $this->db1->select("ALTER SEQUENCE os_usage_id_seq RESTART WITH 1");
        $this->db1->commit();
        return redirect()->to("/Pages/rekam");
    }

}

?>