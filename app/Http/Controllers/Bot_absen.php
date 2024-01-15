<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Bot_absen extends Controller
{
    // absen : "nama" dan "id_absen"
    // rekam_absen : "nama" dan "tanggal"
    // akun : "email" dan "password"

    protected $db;
    public function __construct()
    {
        $this->db = DB::connection('pgsql');
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
        $course = $this->db->select("SELECT * FROM absen");
        return response()->json($course, 200);
    }

    public function akun()
    {
        $akun = $this->db->select("SELECT * FROM akun");
        
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
        $this->db->insert("INSERT INTO absen (nama, id_absen) VALUES (?,?)",[$nama, $course_id]);
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
            $this->db->update("UPDATE absen SET nama=?, id_absen=? WHERE id=?;", [$nama, $course_id, $id]);
            return redirect('/Pages/course');
        }
        return redirect('/Pages/course');
    }

    public function delete()
    {
        $this->db->table('setiap_hari')->delete();
        return back();
    }
}
