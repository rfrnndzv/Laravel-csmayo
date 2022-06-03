<?php

namespace App\Http\Controllers;

use App\Models\Amedica;
use App\Models\Anexo;
use App\Models\Cmedica;
use App\Models\Medicamento;
use App\Models\Persona;
use App\Models\Prescribe;
use App\Models\Receta;
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
        if (Auth::user()->nivel == 1 or Auth::user()->nivel == 4 or Auth::user()->nivel == 6)
            $consulta = "SELECT A.nroanexo, A.fecha, D.estado, (SELECT getMedico(A.cimed)) AS medico, C.cipaciente, (SELECT getPaciente(B.nrohc)) AS nom_paciente
            FROM anexo A, registra B, paciente C, amedica D
            WHERE A.nrohc = B.nrohc AND B.cipaciente LIKE C.cipaciente AND A.nroAnexo = D.nroAM AND DATE_FORMAT(A.fecha,'%y-%m-%d') = DATE_FORMAT(now(),'%y-%m-%d')";
        else{
            $ciusuario = Auth::user()->ciusuario;
            $consulta = "SELECT A.nroanexo, A.fecha, D.estado, (SELECT getMedico(A.cimed)) AS medico, C.cipaciente, (SELECT getPaciente(B.nrohc)) AS nom_paciente
            FROM anexo A, registra B, paciente C, amedica D
            WHERE A.nrohc = B.nrohc AND A.cimed LIKE $ciusuario AND B.cipaciente LIKE C.cipaciente AND A.nroAnexo = D.nroAM AND DATE_FORMAT(A.fecha,'%y-%m-%d') = DATE_FORMAT(now(),'%y-%m-%d')";
        }

        $reservas = DB::select($consulta);

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

        if (!isset($amedica->hingreso)) {
            date_default_timezone_set("America/Caracas");
            $amedica->hingreso = date("H:i");
        }

        $paciente = DB::table('registra')
            ->join('paciente', 'registra.cipaciente', 'like', 'paciente.cipaciente')
            ->where('nrohc', 'like', $anexo->nrohc)
            ->get()->first();
        
        $persona = Persona::find($paciente->cipaciente);

        return view('consulta_medica.atender', compact('anexo', 'amedica', 'cmedica', 'paciente', 'persona'));
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
        if (Auth::user()->nivel == 4) {
            $amedica = Amedica::find($anexo->nroanexo);
            $amedica->update($request->all());
            $amedica->cienf = Auth::user()->ciusuario;
            $amedica->estado = "en cola";
            $amedica->save();
        } elseif (Auth::user()->nivel = 5 or Auth::user()->nivel = 6) {
            $amedica = Amedica::find($anexo->nroanexo);
            $amedica->estado = "atendido";
            if (!isset($amedica->hegreso)) {
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

    public function crea(Amedica $amedica)
    {
        $cmedica = new Cmedica();
        $cmedica->nrocm = $amedica->nroam;
        $cmedica->save();

        return redirect(route('recaudaciones.index'));
    }

    public function receta(Request $request)
    {
        $anexo = new Anexo();
        $anexo->nrohc = $request->recetar[0];
        $anexo->cimed = Auth::user()->ciusuario;
        date_default_timezone_set("America/Caracas");
        $anexo->fecha = date("Y-m-d");
        $anexo->save();

        $receta = new Receta();
        $receta->nroreceta = $anexo->nroanexo;
        $receta->tipoatencion = $request->recetar[1];
        $receta->save();

        if (isset($request->codigos)) {
            for ($i=0; $i < count($request->codigos); $i++) { 
                $prescribe              = new Prescribe();
                $prescribe->nr          = $request->nrs[$i];
                $prescribe->nroreceta   = $anexo->nroanexo;
                $prescribe->codd        = $request->codigos[$i];
                $prescribe->save();
            }
        }
        
        for ($i=0; $i < count($request->nombres); $i++) {
            $medicamento                = new Medicamento();
            $medicamento->medicamento   = $request->nombres[$i];
            $medicamento->indicacion    = $request->indicaciones[$i];
            $medicamento->crecetada     = $request->cantidades[$i];
            $medicamento->nroreceta     = $anexo->nroanexo;
            $medicamento->save();
        }
        
        return("Receta Guardada.");
    }
}
