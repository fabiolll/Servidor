<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,  $guard = null)
    {


  

   if (!Auth::guard($guard)->check()){  

     return redirect('/');
  }else if ($request->route()->parameters()['codigoAdministrador'] <> auth()->guard('administrador')->user()->cod_administrador){

  return redirect('/acessoNegado');

   }

   return $next($request);
  
    }
    }
