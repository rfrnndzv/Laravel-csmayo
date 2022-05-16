<?php

namespace App\Http\Controllers;

use App\Models\Amedica;
use App\Models\Anexo;
use App\Models\Hclinica;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Registra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function show(Anexo $anexo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function edit(Anexo $anexo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anexo $anexo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anexo $anexo)
    {
        //
    }

    public function crea(Request $request){
        $registra = Registra::where('cipaciente', 'like', $request->cipaciente)->get()->first();
        
        $anexo = new Anexo();
        $anexo->nrohc = $registra->nrohc;
        $anexo->ciadm = Auth::user()->ciusuario;
        $anexo->cimed = $request->cimed;
        date_default_timezone_set("America/Caracas");
        $anexo->fecha = date("Y-m-d H:i:s");
        $anexo->save();        

        return redirect(route('amedica.crea', $anexo->nroanexo));
    }
}
