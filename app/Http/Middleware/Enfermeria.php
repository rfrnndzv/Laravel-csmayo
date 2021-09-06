<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Enfermeria
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
        switch(auth::user()->nivel){
            case ('1'):
                return redirect('usuario');//si es Soporte de Desarrollo a usuarios
            break;
            case ('2'):
                return redirect('usuario');//si es Soporte de Mantenimiento a usuarios
            break;
			case ('3'):
                return redirect('recaudaciones');// si es un administrativo a recaudaciones
			break;	
            case ('4'):
                return $next($request);//si es enfermera a enfermeria
            break;
            case ('5'):
                return redirect('medgeneral');//si es medico general
            break;
            case ('6'):
                return redirect('odontologia');//si es medico odontologo
            break;
        }
    }
}
