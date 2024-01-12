<?php 

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class AuthKu 
{
    /**
     * harus handle()
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // check level access
        if ($request->session()->get('level')=='admin' || $request->cookie('level')=='admin'){
            return $next($request);
        }
        return redirect('/');
    }

}

?>