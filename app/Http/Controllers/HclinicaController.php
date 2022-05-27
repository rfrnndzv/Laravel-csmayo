<?php

namespace App\Http\Controllers;

use App\Models\Anexo;
use App\Models\Hclinica;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Registra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HclinicaController extends Controller
{
    public function index()
    {
        return view('historia_clinica.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Hclinica $hclinica)
    {
        $consulta = "SELECT max(A.nroanexo) AS nroanexo
            FROM anexo A, amedica B
            WHERE A.nrohc = $hclinica->nrohc AND A.nroAnexo = B.nroAM AND DATE_FORMAT(A.fecha,'%y-%m-%d') = DATE_FORMAT(now(),'%y-%m-%d')";
        
        $reserva = DB::select($consulta);

        $registra   = Registra::where('nrohc', '=', $hclinica->nrohc)->get()->first();
        $paciente   = Paciente::find($registra->cipaciente);
        $persona    = Persona::find($registra->cipaciente);
        $responsable = Persona::find($registra->ciresponsable);
        //$anexos      = DB::find($hclinica->nrohc);
        $consulta   =   "SELECT *
                        FROM anexo A, amedica B, cmedica C
                        where A.nrohc = $hclinica->nrohc AND A.nroanexo = B.nroam AND C.nrocm = B.nroam";
        $amedicas   = DB::select($consulta);

        return view('historia_clinica.show', compact('hclinica', 'reserva', 'registra', 'paciente', 'persona', 'responsable', 'amedicas'));
    }
    public function edit()
    {
        //
    }
    public function update(Request $request)
    {
        //
    }
    public function destroy()
    {
        //
    }
}
