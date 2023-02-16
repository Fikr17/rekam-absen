<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Bot_absen extends Controller
{
    // absen : "nama" dan "id_absen"
    // rekam_absen : "nama" dan "tanggal"
    // akun : "email" dan "password"

    protected $db141567;
    protected $dbgti;
    public function __construct()
    {
        $this->dbgti = DB::connection('pgsql');
        $this->db141567 = DB::connection('pgsql2');
    }

    public function index() 
    {
        return view("/Pages/absen");
    }

    public function rekam()
    {
        $data = DB::select("select * from rekam_absen ORDER BY id DESC LIMIT 25");// connect ke fikri-gti/rekam_absen dari bot

        // koneksi multiple ke config/database.php dengan nama pgsql2
        // $data2 = DB::connection('pgsql2')->select("select * from course");
        // $send = [
        //     'rekam_absen' => $data
        // ];
        // return view("/Absen/index", $send);
        return response()->json($data, 200);
    }

    public function course()
    {
        $course = $this->dbgti->select("SELECT * FROM absen");
        return response()->json($course, 200);
    }

    public function akun()
    {
        $akun = $this->dbgti->select("SELECT * FROM akun");
        
        return response()->json([['email' => 'unsri','password' => 'rahasia'],['email' => 'unsri','password' => 'rahasia']], 200);
    }

    public function create(Request $request)
    {
        $nama = $request->post('nama');
        $course_id = $request->post('id_absen');
        $request->validate([
            'nama' => 'required',
            'id_absen' => 'required|unique:absen,id_absen'
        ]);
        $this->dbgti->insert("INSERT INTO absen (nama, id_absen) VALUES (?,?)",[$nama, $course_id]);
        return redirect('/Pages/course');
    }

    public function detail()
    {
        
    }

    public function update(Request $request)
    {
        $id = $request->post('id');
        $nama = $request->post('nama');
        $course_id = $request->post('course_id');
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'course_id' => 'required'
        ]);
        if (($id != null) && ($nama != null) && ($course_id != null)){
            $this->dbgti->update("UPDATE absen SET nama=?, id_absen=? WHERE id=?;", [$nama, $course_id, $id]);
            return redirect('/Pages/course');
        }
        return redirect('/Pages/course');
    }

    public function delete($id)
    {
        $del = $this->dbgti->update("DELETE FROM absen WHERE id=?", [$id]);
        if ($del == 0){
            return response()->json(['status'=> 'failed', 'message'=> "failed delete data with id: $id"]);
        }
        return response()->json(['status'=> 'success', 'message'=> "success delete data", "id"=> $id], 201);
    }
}
