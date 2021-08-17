<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->user_type=='admin' || Auth::user()->user_type=='management' || Auth::user()->user_type=='client' || Auth::user()->user_type=='tutor' || Auth::user()->user_type=='lead'){
            return $next($request);
        }
        abort(403, "Cannot access to restricted page");
    }
}
