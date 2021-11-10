<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonal;
use App\Models\Administrativo;
use App\Models\Enfermera;
use App\Models\Farmaceutico;
use App\Models\Medico;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Soporte;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade as PDF;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::all();
        return view('usuario.index', compact('usuarios'));
    }

    public function create(){
        return view('usuario.registra');
    }

    public function edit(User $usuario){

        $persona = Persona::find($usuario->ciusuario);
    
        return view('usuario.editar', compact('persona', 'usuario'));
    }
    
    public function update(Request $request, User $usuario){

        $persona = Persona::find($usuario->ciusuario);
        $persona->update($request->all());

        $usuario-> ciusuario = $request->ciusuario;
        $usuario-> name = $request->name;
        $usuario-> password = Hash::make($request->password);
        $usuario-> email = $request->email;
        $usuario-> nivel = $request->nivel;

        $usuario->save();

        return redirect('usuario');
    }

    public function store(StorePersonal $request){

        $persona    = new Persona();

        $persona->ci        = $request->ciusuario;
        $persona->nombres   = $request->nombres;
        $persona->apaterno  = $request->apaterno;
        $persona->amaterno  = $request->amaterno;

        $persona->save();

        $usuario = new User();

        $usuario-> ciusuario = $request->ciusuario;
        $usuario-> name = $request->name;
        $usuario-> password = Hash::make($request->password);
        $usuario-> email = $request->email;
        $usuario-> nivel = $request->nivel;

        $usuario->save();

        switch ($request->nivel) {
            case '1':
                $soporte = new Soporte();

                $soporte->cisoporte = $request->ciusuario;
                $soporte->rol = 'Desarrollo';

                $soporte->save();
                break;
            case '2':
                $soporte = new Soporte();

                $soporte->cisoporte = $request->ciusuario;
                $soporte->rol = 'Mantenimiento';

                $soporte->save();
                break;
            case '3':
                $administrativo = new Administrativo();

                $administrativo->ciadm = $request->ciusuario;
                $administrativo->cargo = 'Recaudaciones';

                $administrativo->save();
                break;
            case '4':
                $enfermera = new Enfermera();

                $enfermera->cienf = $request->ciusuario;
                $enfermera->area = "Medicina General";

                $enfermera->save();
                break;
            case '5':
                $medico = new Medico();

                $medico->cimed = $request->ciusuario;
                $medico->especialidad = "Medicina General";

                $medico->save();
                break;
            case '6':
                $medico = new Medico();

                $medico->cimed = $request->ciusuario;
                $medico->especialidad = "Odontología";

                $medico->save();
                break;
            case '7':
                $famaceutico = new Farmaceutico();

                $famaceutico->cimed = $request->ciusuario;
                $famaceutico->turno = "24Hrs";

                $famaceutico->save();
                break;
        }
        return redirect('usuario');
    }

    public function destroy(User $usuario){

        $persona = Persona::find($usuario->ciusuario);

        switch ($usuario->nivel) {
            case '1':
                $item = Soporte::find($usuario->ciusuario);
                break;
            case '2':
                $item = Soporte::find($usuario->ciusuario);
                break;
            case '3':
                $item = Administrativo::find($usuario->ciusuario);
                break;
            case '4':
                $item = Enfermera::find($usuario->ciusuario);
                break;
            case '5':
                $item = Medico::find($usuario->ciusuario);
                break;
            case '6':
                $item = Medico::find($usuario->ciusuario);
                break;
            case '7':
                $item = Farmaceutico::find($usuario->ciusuario);
                break;
        }

        $item->delete();
        $usuario->delete();
        $persona->delete();
        
        return redirect('usuario');
    }

    public function busca(Request $request){
        $usuario = User::where('ciusuario', 'like', $request->ciusuario)->get()->first();
        
        if($usuario != null){
            return true;
        }
        return false;
    }

    public function exportarPdf(){
        $usuarios = User::get();
        $pdf = PDF::loadView('pdf.usuarios', compact('usuarios'));
        return $pdf->download('user-list.pdf');
    }
}
