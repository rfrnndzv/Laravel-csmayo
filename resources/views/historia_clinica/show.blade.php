<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            Historia Clínica
        </h2>
    </x-slot>

    <!-- Menu de Opciones -->
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <button id="BGD_menuPrincipal" type="button" class="btn btn-primary dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                Opciones
            </button>
            <ul class="dropdown-menu" aria-labelledby="BGD_menuPrincipal">
                <li>
                                        
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a type="button" class="dropdown-item" href="{{ route('cmedica.edit', $reserva[0]->nroanexo) }}">Volver</a></li>
            </ul>
        </div>
    </div>

    <!-- Contenido -->
    <div class="contenido p-3">
        <h1>Historia Clinica de Paciente en Consulta: {{ $hclinica->nrohc }}</h1>
        <div id="show" class="row">
            @include('historia_clinica.formularioPaciente')

            @if ( (count($amedicas)) > 0 )
                @include('historia_clinica.formularioAM')
            @endif
        </div>
    </div>

    <!-- Mis Librerias JS -->
    <x-slot name="scriptjs">
        <script>
            $(document).ready(function() {
                $('#Tabla').DataTable()
            });
        </script>

        <script>
            if ($('#val_responsable').text().trim() == "Responsable: Si") {   
                $("#responsable").append('<p class="division">A.1. IDENTIFICACIÓN DEL RESPONSABLE</p><div class="col-lg-2">  <label for="val_ciresponsable" class="form-label">C.I. Responsable: {{ $responsable->ci }}</label></div><div class="col-lg-4">  <label for="val_nombresresp" class="form-label">Nombre Completo: {{ $responsable->nombres . ' ' . (isset($responsable->apaterno) ? $responsable->apaterno : '') . ' ' . (isset($responsable->amaterno) ? $responsable->amaterno : '') }}</label></div>');
            }
        </script>
    </x-slot>

</x-app-layout>
