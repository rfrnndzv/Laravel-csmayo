<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Farmacia
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
        switch(Auth::user()->nivel){
            case ('1'):
                return $next($request);//si es desarrollo
            break;
            case ('2'):
                return $next($request);//si es Soporte de Mantenimiento a usuarios
            break;
			case ('3'):
                return redirect('recaudaciones');// si es un administrativo a recaudaciones
			break;	
            case ('4'):
                return redirect('cmedica');//si es enfermera a enfermeria
            break;
            case ('5'):
                return redirect('cmedica');//si es medico general
            break;
            case ('6'):
                return redirect('cmedica');//si es medico odontologo
            break;
            case ('7'):
                return $next($request);//si es farmaceutico
            break;
        }
    }
}
