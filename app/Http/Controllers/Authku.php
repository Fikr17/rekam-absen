<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Authku extends Controller
{
    protected $db;
    public function __construct()
    {
        $this->db = DB::connection("pgsql");
    }
    
    public function authLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);
        $remember = $request->post('remember')=='on';
        $user = $this->db->select("SELECT email,level FROM users WHERE email='".$credentials['email']."' AND password='".$credentials['password']."'");
        if ($user) {
            $level = $user[0]->level;
            if ($remember){
                Cookie::queue(Cookie::make('log', 'True', 60*24*30));
                Cookie::queue(Cookie::make('email', $credentials['email'], 60*24*30));
                Cookie::queue(Cookie::make('level', $level, 60*24*30));
            }
            $request->session()->regenerate();
            session([
                'log'=>true,
                'email'=>$credentials['email'],
                'level'=>$level
            ]);
 
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('InputEmail');
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('log'));
        Cookie::queue(Cookie::forget('email'));
        Cookie::queue(Cookie::forget('level'));
        $request->session()->flush();
        return redirect("/");
    }
}
?>