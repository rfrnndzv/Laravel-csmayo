<?php

namespace App\Http\Controllers;

use App\Models\Amedica;
use App\Models\Anexo as Anexo;
use Illuminate\Http\Request;

class AmedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Usted se encuentra en Index de Amedica";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Usted se encuentra en Create de Amedica";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amedica  $amedica
     * @return \Illuminate\Http\Response
     */
    public function show(Amedica $amedica)
    {
        return("Usted se encuentra en Show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amedica  $amedica
     * @return \Illuminate\Http\Response
     */
    public function edit(Amedica $amedica)
    {
        return("Usted se encuentra en Edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Amedica  $amedica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amedica $amedica)
    {
        return("Usted se encuentra en Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amedica  $amedica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amedica $amedica)
    {
        return("Usted se encuentra en Destroy");
    }

    public function crea(Anexo $anexo){

        $amedica = new Amedica();
        $amedica->nroam = $anexo->nroanexo;
        $amedica->estado = 'espera';
        $amedica->save();

        return redirect(route('cmedica.crea', $amedica->nroam));
    }
    
}
