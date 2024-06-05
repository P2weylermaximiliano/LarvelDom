<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip=$request->ip();
        
        DB::table('login')->insert(
            ['ip'=> $ip, 'created_at'=>now()]
        );
        //dd('los datos fueron cargados');

        return $next($request);
    }
}
