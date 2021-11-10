<?php

namespace App\Http\Controllers;

use App\Models\Hclinica;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Registra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecaudacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = DB::select("SELECT * 
                                from paciente A, persona B, registra C
                                where A.cipaciente like B.ci AND C.cipaciente like B.ci AND NOT C.accion like 'archiva'");

        $medicos = DB::table('medico')
                        ->join('persona', 'medico.cimed', 'like', 'persona.ci')
                        ->get();
        
        return view('recaudacion.index', compact('pacientes', 'medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recaudacion.registra');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->ci = $request->nuevocipaciente;
        $persona->nombres = $request->nombres;
        $persona->apaterno = $request->apaterno;
        $persona->amaterno = $request->amaterno;
        $persona->save();

        $paciente = new Paciente();
        $paciente->cipaciente = $request->nuevocipaciente;
        $paciente->apcasada = $request->apcasada;
        $paciente->fnac = $request->fnac;
        $paciente->sexo = $request->sexo;
        $paciente->procedencia = $request->procedencia;
        $paciente->idioma = $request->idioma;
        $paciente->idiomamat = $request->idiomamat;
        $paciente->autopercult = $request->autopercult;
        $paciente->ocupacion = $request->ocupacion;
        $paciente->ocomunitaria = $request->ocomunitaria;
        $paciente->decididor = $request->decididor;
        $paciente->ecivil = $request->ecivil;
        $paciente->escolaridad = $request->escolaridad;
        $paciente->nacionalidad = $request->nacionalidad;
        $paciente->depto = $request->depto;
        $paciente->direccion = $request->direccion;
        $paciente->nrodomicilio = $request->nrodomicilio;
        $paciente->telefono = $request->telefono;
        $paciente->save();

        //Asignación del código de Familia: Inicial Apellido-correlativo
        if (isset($request->responsable) && $request->responsable == 1) {
            $ciresponsable = $request->ciresponsable;
            
            $hc = DB::table('hclinica')
                        ->join('registra', 'hclinica.nrohc', '=', 'registra.nrohc')
                        ->where('registra.cipaciente', 'like', $ciresponsable)
                        ->get()->first();
            $codfam = $hc->codfam;
        } else {
            $ciresponsable = $request->nuevocipaciente;

            $codfam = substr($request->apaterno . $request->amaterno, 0, 1);
            $cadena = Hclinica::select('codfam')->where('codfam', 'like', $codfam.'%')->orderby('nrohc', 'desc')->get()->first();

            if ($cadena != null) {
                $correlativo = intval(substr($cadena->codfam, 2, strlen($cadena->codfam) - 1));
                $codfam = $codfam . "-" . ($correlativo + 1);
            } else {
                $codfam = $codfam . "-1";
            }
        }

        $hclinica = new Hclinica();
        $hclinica->codfam = $codfam;
        $hclinica->seguro = $request->seguro;
        $hclinica->establecimiento = $request->establecimiento;
        $hclinica->p1 = $request->p1;
        $hclinica->p2 = $request->p2;
        $hclinica->save();

        $registra = new Registra();
        $registra->nrohc = $hclinica->nrohc;
        $registra->ciadm = Auth::user()->ciusuario;
        $registra->cipaciente = $request->nuevocipaciente;
        $registra->ciresponsable = $ciresponsable;
        date_default_timezone_set("America/Caracas");
        $registra->fecha = date("Y-m-d H:i:s");
        $registra->accion = "abre";
        $registra->save();

        return redirect('recaudaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $paciente = Paciente::find($request->nuevocipaciente);
        if ($paciente != null) {
            return true;
        }
        return false;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cipaciente)
    {
        $registra = Registra::where('cipaciente', $cipaciente)->get()->first();
        $hclinica = Hclinica::find($registra->nrohc);
        $paciente = Paciente::find($cipaciente);
        $persona = Persona::find($cipaciente);
        $responsable = DB::table('persona')
                        ->join('paciente', 'cipaciente', 'like', 'persona.ci')
                        ->where('persona.ci', 'like' ,$registra->ciresponsable)
                        ->get()->first();

        return view('recaudacion.edit', compact('registra', 'hclinica', 'paciente', 'persona', 'responsable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $persona = Persona::find($request->cipaciente);
        $persona->ci = $request->nuevocipaciente;
        $persona->nombres = $request->nombres;
        $persona->apaterno = $request->apaterno;
        $persona->amaterno = $request->amaterno;
        $persona->save();

        $paciente->cipaciente = $request->nuevocipaciente;
        $paciente->apcasada = $request->apcasada;
        $paciente->fnac = $request->fnac;
        $paciente->sexo = $request->sexo;
        $paciente->procedencia = $request->procedencia;
        $paciente->idioma = $request->idioma;
        $paciente->idiomamat = $request->idiomamat;
        $paciente->autopercult = $request->autopercult;
        $paciente->ocupacion = $request->ocupacion;
        $paciente->ocomunitaria = $request->ocomunitaria;
        $paciente->decididor = $request->decididor;
        $paciente->ecivil = $request->ecivil;
        $paciente->escolaridad = $request->escolaridad;
        $paciente->nacionalidad = $request->nacionalidad;
        $paciente->depto = $request->depto;
        $paciente->direccion = $request->direccion;
        $paciente->nrodomicilio = $request->nrodomicilio;
        $paciente->telefono = $request->telefono;
        $paciente->save();

        $hclinica = Hclinica::find($request->nrohc);
        if(isset($request->ciresponsable)){
            $hcresp = DB::table('hclinica')
                        ->join('registra', 'registra.nrohc', '=', 'hclinica.nrohc')
                        ->where('registra.cipaciente', 'like', $request->ciresponsable)
                        ->get()->first();
            $hclinica->codfam = $hcresp->codfam;
        }else{
            $hclinica->codfam = $request->codfam;
        }
        $hclinica->seguro = $request->seguro;
        $hclinica->establecimiento = $request->establecimiento;
        $hclinica->p1 = $request->p1;
        $hclinica->p2 = $request->p2;
        $hclinica->save();

        $registra = Registra::find($request->nrohc);
        $registra->ciadm = Auth::user()->ciusuario;
        $registra->cipaciente = $request->nuevocipaciente;
        if(isset($request->ciresponsable)){
            $registra->ciresponsable = $request->ciresponsable;
        }
        date_default_timezone_set("America/Caracas");
        $registra->accion = "edita";
        $registra->update();

        return redirect('recaudaciones');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $registra = Registra::where('cipaciente', 'like', $paciente->cipaciente)->get()->first();
        $registra->accion = 'archiva';
        $registra->save();

        return redirect('recaudaciones');
    }

    public function responsable(Request $request)
    {
        $responsable = DB::table('persona')
                        ->join('paciente', 'cipaciente', 'like', 'persona.ci')
                        ->where('persona.ci', 'like' ,$request->ciresponsable)
                        ->get()->first();

        return $responsable;
    }

    public function archivados(){
        $pacientes = DB::select("SELECT * 
                                from paciente A, persona B, registra C
                                where A.cipaciente like B.ci AND C.cipaciente like B.ci AND C.accion like 'archiva'");
        
        return view('recaudacion.archivados', compact('pacientes'));
    }

    public function activa(Paciente $paciente)
    {
        $registra = Registra::where('cipaciente', 'like', $paciente->cipaciente)->get()->first();
        $registra->accion = 'activa';
        $registra->save();

        return redirect('recaudaciones');
    }
}
