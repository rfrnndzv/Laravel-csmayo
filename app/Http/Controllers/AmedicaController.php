<?php

namespace App\Http\Controllers;

use App\Models\Amedica;
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
        return "Bienvenido a Amedica Store.";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amedica  $amedica
     * @return \Illuminate\Http\Response
     */
    public function show(Amedica $amedica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amedica  $amedica
     * @return \Illuminate\Http\Response
     */
    public function edit(Amedica $amedica)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amedica  $amedica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amedica $amedica)
    {
        //
    }

    public function crea($nroanexo)
    {
        $amedica = new Amedica();
        $amedica->nroam = $nroanexo;
        $amedica->estado = 'espera';
        $amedica->save();

        return redirect(route('cmedica.crea', $amedica->nroam));
    }
    
}
