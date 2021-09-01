<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ensureTokenIsValid
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
        if($request->input('token') !== 'my-secret-token'){
            return redirect('home');
        }
        return $next($request);
    }

}


class BeforeMiddleware{
    public function handle($request, Closure $next){
        return $next($request);
    }
} 


class AfterMiddleware{
    public function hadle($request, Closure $end){
        return $end($request);
    }
}
