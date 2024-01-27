<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class Pages extends Controller
{
    protected $db;
    public function __construct()
    {
        $this->db = DB::connection("pgsql");
    }

    public function index(Request $request)
    {
        if($request->session()->get('level')=='admin' || $request->cookie('level')=='admin'){
            $aktivitas = $this->db->table('aktivitas')->orderByDesc('id')->take(10)->get();
            $setiap_hari = $this->db->table('setiap_hari')->orderBy('id')->take(7)->get();
            $rekam_absen = $this->db->table('rekam_absen')->orderByDesc('id')->take(10)->get();
            $os_usage = $this->db->table('os_usage')->orderByDesc('id')->take(5)->get();
            $arr=['aktivitas'=>$aktivitas, 'setiap_hari'=>$setiap_hari, 'rekam'=>$rekam_absen, 'os_usage'=>$os_usage];
        } else if($request->session('email')||$request->cookie('email')){
            $email =!$request->cookie('email') ? $request->session()->get('email'):$request->cookie('email');
            $aktivitas = $this->db->table('aktivitas')->where('email',$email)->orderByDesc('id')->take(5)->get();
            $rekam_absen = $this->db->table('rekam_absen')->where('email',$email)->orderByDesc('id')->take(7)->get();
            $arr=['aktivitas'=>$aktivitas,'rekam'=>$rekam_absen];
        }
        else {
            $aktivitas = $this->db->table('aktivitas')->where('email')->orderByDesc('id')->take(5)->get();
            $arr=['aktivitas'=>$aktivitas];
        }
        return view("pages.index", ['arr'=>$arr]);
    }

    public function akun()
    {
        return view("pages.akun");
    }

    public function rencana()
    {
        $arr = $this->db->table('rencana_absen')->join('absen','absen.id_absen','=','rencana_absen.id_link_absen')->whereColumn('rencana_absen.email','=','absen.email')->select('absen.nama', 'rencana_absen.*')->orderBy('tanggal_absen')->orderBy('jam_absen')->get();
        return view("pages.rencana", ['arr'=>['rencana'=>$arr]]);
    }
    
    public function rekam(Request $request)
    {
        // jika mau akses /rekam?page=1234
        if($request->session()->get('level')=='admin' || $request->cookie('level')=='admin'){
            $arr = $this->db->table('rekam_absen')->select('id','nama','tanggal','email')->orderby('id','desc')->paginate(25);
        } else {
            $email=!$request->cookie('email') ? $request->session()->get('email') : $request->cookie('email');
            $arr = $this->db->table('rekam_absen')->select('id','nama','tanggal','email')->where('email',$email)->orderby('id','desc')->paginate(25);
        }
        return view("pages.rekam", ['arr'=>['rekam'=>$arr]]);
    }

    public function course(Request $request)
    {
        // jika mau akses /rekam?page=1234
        if($request->session()->get('level')=='admin' || $request->cookie('level')=='admin'){
            $arr = $this->db->table('absen')->select('id','nama','ada_pass','email')->orderby('id','desc')->paginate(15);
        } else {
            $email = !$request->cookie('email') ? $request->session()->get('email') : $request->cookie('email');
            $arr = $this->db->table('absen')->select('id','nama','ada_pass','email')->where('email',$email)->orderby('id','desc')->paginate(15);
        }
        return view("pages.course", ['arr'=>['daftar_kelas'=>$arr]]);
    }

    public function status_bot(Request $request)
    {
        $arr = $this->db->table('aktivitas')->orderByDesc('id')->take(50)->get();
        $os_usage = [];
        if ($request->session()->get('level')=='admin' || $request->cookie('level')=='admin'){
            $os_usage = $this->db->table('os_usage')->orderByDesc('id')->take(25)->get();
        }
        return view("pages.status", ['arr'=>['aktivitas'=>$arr, 'os_usage'=>$os_usage]]);
    }

    public function setting()
    {
        $arr = $this->db->table('setting_bot')->get();
        return view("pages.setting", ['arr'=>['setting'=>$arr]]);
    }

    public function login()
    {
        return view("pages.login");
    }

}

?>