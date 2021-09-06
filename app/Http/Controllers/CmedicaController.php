<?php

namespace App\Http\Controllers;

use App\Models\Cmedica;
use Illuminate\Http\Request;

class CmedicaController extends Controller
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
     * @param  \App\Models\Cmedica  $cmedica
     * @return \Illuminate\Http\Response
     */
    public function show(Cmedica $cmedica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cmedica  $cmedica
     * @return \Illuminate\Http\Response
     */
    public function edit(Cmedica $cmedica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cmedica  $cmedica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cmedica $cmedica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cmedica  $cmedica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cmedica $cmedica)
    {
        //
    }

    public function crea($nroam){
        $cmedica = new Cmedica();
        $cmedica->nrocm = $nroam;
        $cmedica->save();

        return redirect(route('recaudaciones.index'));
    }
}
