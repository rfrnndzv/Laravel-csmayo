<?php

namespace App\Http\Controllers;

use App\Models\Anexo;
use App\Models\Hclinica;
use App\Models\Medicamento;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Receta;
use App\Models\Registra;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmaciaController extends Controller
{
    public function index()
    {
        $consulta = "SELECT A.nroanexo, A.fecha, B.tipoatencion, C.seguro, D.nombres, D.apaterno, D.amaterno
                    FROM anexo A, recetas B, hclinica C, persona D, registra E
                    WHERE B.cifarm IS NULL AND DATE_FORMAT(A.fecha,'%y-%m-%d') = DATE_FORMAT(now(),'%y-%m-%d')
                    AND A.nroanexo = B.nroreceta AND A.nroanexo = B.nroreceta AND A.nrohc = C.nrohc
                    AND E.nrohc = C.nrohc AND D.ci = E.cipaciente";
        
        $recetas = DB::select($consulta);

        return view('farmacia.index', compact('recetas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }

    public function edit(Anexo $anexo)
    {
        $receta = Receta::find($anexo->nroanexo);

        $consulta = "SELECT A.codd, B.descripcion, A.nr
                    FROM prescribes A, diagnosticos B
                    WHERE A.codd = B.codd AND A.nroreceta = $receta->nroreceta";
        $prescribes = DB::select($consulta);
        $medicamentos = Medicamento::where('nroreceta', '=', $receta->nroreceta)->get();
        
        $hclinica = Hclinica::find($anexo->nrohc);
        $registra = Registra::where('nrohc', '=', $anexo->nrohc)->get()->first();

        $paciente = Paciente::find($registra->cipaciente);
        $persona = Persona::find($registra->cipaciente);

        return view('farmacia.receta', compact('receta', 'prescribes', 'medicamentos', 'hclinica', 'registra', 'paciente', 'persona'));
    }

    public function update(Request $request)
    {
        return "Entro a update";
        if (isset($request->ids)) {
            
            $receta = Receta::find($request->ids[0]);
            $receta->cifarm = $request->cifarm;
            $receta->update();

            for ($i=0; $i < count($request->ids); $i++) { 
                $medicamento = Medicamento::find($request->ids[$i]);
                $medicamento->cdispensada = $request->cantidades[$i];
                $medicamento->valor = $request->cantidades[$i];
                $medicamento->update();
            }
        }

        return $receta;
    }

    public function destroy()
    {
        //
    }

    public function actualizar(Request $request)
    {
        if (isset($request->ids)) {
            
            $receta = Receta::find($request->nroreceta);
            $receta->cifarm = $request->cifarm;
            $receta->update();

            for ($i=0; $i < count($request->ids); $i++) { 
                $medicamento = Medicamento::find($request->ids[$i]);
                $medicamento->cdispensada = $request->cantidades[$i];
                $medicamento->valor = $request->cantidades[$i];
                $medicamento->update();
            }
        }
        return route('farmacia.pdf', $request->nroreceta);
        //return ("/farmacia/pdf?nroreceta=" . $request->nroreceta);
    }

    public function pdf(Anexo $anexo){
        $receta = Receta::find($anexo->nroanexo);

        $consulta = "SELECT A.codd, B.descripcion, A.nr
                    FROM prescribes A, diagnosticos B
                    WHERE A.codd = B.codd AND A.nroreceta = $receta->nroreceta";
        $prescribes = DB::select($consulta);
        $medicamentos = Medicamento::where('nroreceta', '=', $receta->nroreceta)->get();
        
        $hclinica = Hclinica::find($anexo->nrohc);
        $registra = Registra::where('nrohc', '=', $anexo->nrohc)->get()->first();

        $paciente = Paciente::find($registra->cipaciente);
        $persona = Persona::find($registra->cipaciente);

        $pdf = PDF::loadView('farmacia.recetapdf', compact('receta', 'prescribes', 'medicamentos', 'hclinica', 'registra', 'paciente', 'persona'));
        return $pdf->download('receta.pdf');
    }
}
