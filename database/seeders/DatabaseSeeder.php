<?php

namespace Database\Seeders;

use App\Models\Administrativo;
use App\Models\Diagnostico;
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
        /*$persona = new Persona();

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
        
        $admin->save();*/

        $diagnostico0 = new Diagnostico();
        $diagnostico0->codigo = "J030";
        $diagnostico0->descripcion = "Faringoamigdalitis";
        $diagnostico0->save();

        $diagnostico2 = new Diagnostico();
        $diagnostico2->codigo = "D50";
        $diagnostico2->descripcion = "Anemias por Deficiencia de Hierro";
        $diagnostico2->save();

        $diagnostico3 = new Diagnostico();
        $diagnostico3->codigo = "B37";
        $diagnostico3->descripcion = "Candidiasis Vaginal";
        $diagnostico3->save();

        $diagnostico4 = new Diagnostico();
        $diagnostico4->codigo = "h10";
        $diagnostico4->descripcion = "Conjuntivitis Vacteriana";
        $diagnostico4->save();

        $diagnostico5 = new Diagnostico();
        $diagnostico5->codigo = "E440";
        $diagnostico5->descripcion = "Desnutrición Aguda Moderada";
        $diagnostico5->save();

        $diagnostico6 = new Diagnostico();
        $diagnostico6->codigo = "T140";
        $diagnostico6->descripcion = "Contusiones Superficiales";
        $diagnostico6->save();

        $diagnostico7 = new Diagnostico();
        $diagnostico7->codigo = "Z392";
        $diagnostico7->descripcion = "Control Puerperal";
        $diagnostico7->save();

        $diagnostico8 = new Diagnostico();
        $diagnostico8->codigo = "L22";
        $diagnostico8->descripcion = "Dermatitis del Pañal";
        $diagnostico8->save();

        $diagnostico9 = new Diagnostico();
        $diagnostico9->codigo = "E45";
        $diagnostico9->descripcion = "Desnutrición Crónica en Menores de 2 años";
        $diagnostico9->save();

        $diagnostico10 = new Diagnostico();
        $diagnostico10->codigo = "PC91";
        $diagnostico10->descripcion = "Desnutrición Aguda Grave (Pre-ref.)";
        $diagnostico10->save();

        $diagnostico11 = new Diagnostico();
        $diagnostico11->codigo = "PC104";
        $diagnostico11->descripcion = "Prevención Anemias de Niños";
        $diagnostico11->save();

        $diagnostico12 = new Diagnostico();
        $diagnostico12->codigo = "A09";
        $diagnostico12->descripcion = "Diarrea y Diarrea Persistente";
        $diagnostico12->save();

        $diagnostico13 = new Diagnostico();
        $diagnostico13->codigo = "A03";
        $diagnostico13->descripcion = "Disentería";
        $diagnostico13->save();

        $diagnostico14 = new Diagnostico();
        $diagnostico14->codigo = "O210";
        $diagnostico14->descripcion = "Emesis e Hiperemesis del Embarazo";
        $diagnostico14->save();

        $diagnostico15 = new Diagnostico();
        $diagnostico15->codigo = "K590";
        $diagnostico15->descripcion = "Estreñimiento";
        $diagnostico15->save();

        $diagnostico16 = new Diagnostico();
        $diagnostico16->codigo = "N30";
        $diagnostico16->descripcion = "Infección Urinaria Baja (Sistitis)";
        $diagnostico16->save();

        $diagnostico17 = new Diagnostico();
        $diagnostico17->codigo = "M545";
        $diagnostico17->descripcion = "Lumbalgia";
        $diagnostico17->save();

        $diagnostico18 = new Diagnostico();
        $diagnostico18->codigo = "B359";
        $diagnostico18->descripcion = "Nicosis Cutanea";
        $diagnostico18->save();

        $diagnostico19 = new Diagnostico();
        $diagnostico19->codigo = "B370";
        $diagnostico19->descripcion = "Monoliasis Oral";
        $diagnostico19->save();

        $diagnostico20 = new Diagnostico();
        $diagnostico20->codigo = "J15";
        $diagnostico20->descripcion = "Neumonia no Grave";
        $diagnostico20->save();

        $diagnostico21 = new Diagnostico();
        $diagnostico21->codigo = "H660";
        $diagnostico21->descripcion = "Infección Aguda del Oído22";
        $diagnostico21->save();

        $diagnostico22 = new Diagnostico();
        $diagnostico22->codigo = "PC1CCD";
        $diagnostico22->descripcion = "Peso Talla Normal";
        $diagnostico22->save();

        $diagnostico23 = new Diagnostico();
        $diagnostico23->codigo = "L50";
        $diagnostico23->descripcion = "Urticaria";
        $diagnostico23->save();

        $diagnostico24 = new Diagnostico();
        $diagnostico24->codigo = "H661";
        $diagnostico24->descripcion = "Infección Crónica del Oído";
        $diagnostico24->save();
        
        $diagnostico25 = new Diagnostico();
        $diagnostico25->codigo = "Z381";
        $diagnostico25->descripcion = "Parto y RN en Domicilio por Pers. Salud";
        $diagnostico25->save();

        $diagnostico26 = new Diagnostico();
        $diagnostico26->codigo = "PC2";
        $diagnostico26->descripcion = "Prev. Anemia en Embarazos";
        $diagnostico26->save();

        $diagnostico27 = new Diagnostico();
        $diagnostico27->codigo = "O140";
        $diagnostico27->descripcion = "Preelclapmcia Leve y Moderada";
        $diagnostico27->save();

        $diagnostico28 = new Diagnostico();
        $diagnostico28->codigo = "J00";
        $diagnostico28->descripcion = "Resfrío Común";
        $diagnostico28->save();

        $diagnostico29 = new Diagnostico();
        $diagnostico29->codigo = "B86";
        $diagnostico29->descripcion = "Sarcoptosis";
        $diagnostico29->save();

        $diagnostico30 = new Diagnostico();
        $diagnostico30->codigo = "A59";
        $diagnostico30->descripcion = "Tricomoniasis";
        $diagnostico30->save();

        $diagnostico31 = new Diagnostico();
        $diagnostico31->codigo = "PC88";
        $diagnostico31->descripcion = "Tuberculosis Extrapulmonar";
        $diagnostico31->save();

        $diagnostico32 = new Diagnostico();
        $diagnostico32->codigo = "PC58";
        $diagnostico32->descripcion = "Tuberculosis Pulmonar";
        $diagnostico32->save();

        $diagnostico33 = new Diagnostico();
        $diagnostico33->codigo = "PC106";
        $diagnostico33->descripcion = "Prev. Def. Vid. A 1 Dosis";
        $diagnostico33->save();

        $diagnostico34 = new Diagnostico();
        $diagnostico34->codigo = "PC107";
        $diagnostico34->descripcion = "Prev. Def. Vid. A 2 Dosis";
        $diagnostico34->save();

        $diagnostico35 = new Diagnostico();
        $diagnostico35->codigo = "PC34";
        $diagnostico35->descripcion = "Tratamiento Preferencia Referencia";
        $diagnostico35->save();
    }
}
