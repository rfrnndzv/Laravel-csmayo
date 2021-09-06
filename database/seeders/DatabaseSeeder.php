<?php

namespace Database\Seeders;

use App\Models\Administrativo;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Persona;
use App\Models\Soporte;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Usuario, Soporte, Desarrollo
        $persona = new Persona();

        $persona->ci = '6120942';
        $persona->nombres = 'Rodrigo';
        $persona->apaterno = 'Fernández';
        $persona->amaterno = 'Vargas';

        $persona->save();

        $usuario = new User();

        $usuario->ciusuario = '6120942';
        $usuario->nivel = 1;
        $usuario->name = 'rodrick';
        $usuario->email = 'rfrnndzv@gmail.com';
        $usuario->password = Hash::make('123');

        $usuario->save();

        $soporte = new Soporte();

        $soporte->cisoporte = '6120942';
        $soporte->rol = 'Desarrollo';

        $soporte->save();

        //Usuario, Administración, Recaudaciones
        $persona2 = new Persona();

        $persona2->ci = '123';
        $persona2->nombres = 'Juan';
        $persona2->apaterno = 'Perez';
        $persona2->amaterno = 'Loza';

        $persona2->save();

        $usuario2 = new User();

        $usuario2->ciusuario = '123';
        $usuario2->nivel = 3;
        $usuario2->name = 'juan';
        $usuario2->email = 'juan@gmail.com';
        $usuario2->password = Hash::make('123');

        $usuario2->save();

        $admin = new Administrativo();

        $admin->ciadm = '123';
        $admin->cargo = 'Recaudaciones';
        
        $admin->save();
    }
}
