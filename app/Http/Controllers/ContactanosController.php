<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){
        return view('contactanos.index');
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required'
        ]);

        $correo = new ContactanosMailable($request->all());
        Mail::to('freed_rfv@hotmail.com')->send($correo);
        //return "Mensaje Enviado.";
        return redirect()->route('contactos.index')->with('info', 'Mensaje Enviado');

    }
}
