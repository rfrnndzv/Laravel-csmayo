<?php

namespace App\Http\Controllers;

use App\Models\Amedica;
use App\Models\Anexo;
use App\Models\Cmedica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CmedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = DB::select("SELECT A.nroanexo, A.fecha, A.estado, (SELECT getMedico(A.cimed)) AS medico, C.cipaciente, (SELECT getPaciente(B.nrohc)) AS nom_paciente
                                FROM anexo A, registra B, paciente C
                                WHERE A.nrohc = B.nrohc AND B.cipaciente LIKE C.cipaciente AND DATE_FORMAT(A.fecha,'%y-%m-%d') = DATE_FORMAT(now(),'%y-%m-%d')");

        return view('consulta_medica.index', compact('reservas'));
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
    public function edit(Anexo $anexo)
    {
        $amedica = Amedica::find($anexo->nroanexo);
        $cmedica = Cmedica::find($anexo->nroanexo);

        if(!isset($amedica->hingreso)){
            date_default_timezone_set("America/Caracas");
            $amedica->hingreso = date("H:i");
        }

        $paciente = DB::table('registra')
                    ->join('paciente', 'registra.cipaciente', 'like', 'paciente.cipaciente')
                    ->where('nrohc', 'like', $anexo->nrohc)
                    ->get()->first();

        return view('consulta_medica.atender', compact('anexo', 'amedica', 'cmedica', 'paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cmedica  $cmedica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anexo $anexo)
    {
        if($anexo->estado == "espera" && Auth::user()->nivel == 4){
            $anexo->estado = "en cola";
        }else if($anexo->estado == "en cola" && Auth::user()->nivel > 4){
            $anexo->estado = "atendido";
        }
        $anexo->save();

        if (Auth::user()->nivel == 4) {
            $amedica = Amedica::find($anexo->nroanexo);
            $amedica->update($request->all());
            $amedica->cienf = Auth::user()->ciusuario;
            $amedica->save();
        } elseif(Auth::user()->nivel > 4) {
            $amedica = Amedica::find($anexo->nroanexo);
            if(!isset($amedica->hegreso)){
                date_default_timezone_set("America/Caracas");
                $amedica->hegreso = date("H:i");
            }
            $amedica->save();
            
            $cmedica = Cmedica::find($anexo->nroanexo);
            $cmedica->update($request->all());
            $cmedica->save();
        }

        return redirect(route('cmedica.index'));
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
