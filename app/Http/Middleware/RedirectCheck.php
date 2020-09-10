<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RedirectCheck
{
    /**x
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //check current route
        $user = Auth::user();
        if(!$user)
        {
            return redirect('login');
        }


        return $next($request);
    }
}
