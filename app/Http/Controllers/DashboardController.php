<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->nivel == 1)
            return redirect('usuario');
        if(Auth::user()->nivel == 3)
            return redirect('recaudaciones');
        if(Auth::user()->nivel == 4)
            return redirect('enfermeria');
    }

}
