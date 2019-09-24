<?php

namespace cardapio\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Autorizador
{
  
    public function handle($request, Closure $next)
    {
        if(!$request->is('login') && Auth::guest()){
            return redirect('/login'); 
        }

        
        
        return $next($request);
    }
}
