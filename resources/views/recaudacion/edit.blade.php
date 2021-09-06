<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            Recaudaciones
        </h2>
    </x-slot>
    
    <!-- Menu superior -->
    <div class="btn-group" role="group">
      <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Opciones
      </button>
      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="btnGroupDrop1">
        <li><a class="dropdown-item text-danger" href="{{ route('recaudaciones.index') }}">Cancelar</a></li>
      </ul>
    </div>

    <!-- Cuerpo de la Página -->
    <div class="contenido p-2">
      <form class="row g-3 needs-validation" id="registro" name="registro" method="POST" action="{{ route('recaudaciones.update', $paciente) }}" autocomplete="off" novalidate>
        @method('put')
        @include('recaudacion.formulario')
      </form>
    </div>

    <!-- Mis Librerias JS -->
    <x-slot name="scriptjs">

      <script src="{{ asset('js/recaudaciones.js') }}"></script>
      <!-- Código de inicio, introduce datos del Responsable si existe -->
      <script>
        if ($('#val_responsable').prop('checked')) {
          $("#responsable").append('<p class="division">A.1. IDENTIFICACIÓN DEL RESPONSABLE</p><div class="col-lg-2"><label for="val_ciresponsable" class="form-label">C.I. Responsable</label> <input type="text" class="form-control" id="val_ciresponsable" name="ciresponsable"  value="{{ $responsable->ci }}" require> <div class="invalid-feedback"> Ingrece Cédula de Identidad </div></div><div class="col-lg-2"> <label for="val_nombresresp" class="form-label">Nombres</label> <input disabled type="text" class="form-control" id="val_nombresresp" name="nombresresp"  value="{{ $responsable->nombres }}" required> <div class="invalid-feedback"> Introduzca al menos un nombre </div></div><div class="col-lg-2"> <label for="val_apaternoresp" class="form-label">Apellido Paterno</label> <input disabled type="text" class="form-control" id="val_apaternoresp" name="apaternoresp"  value="{{ isset($responsable->apaterno)? $responsable->apaterno : '' }}"></div><div class="col-lg-2"> <label for="val_amaternoresp" class="form-label">Apellido Materno</label> <div class="input disabled-group has-validation">  <input disabled type="text" class="form-control" id="val_amaternoresp" name="amaternoresp"   value="{{ isset($responsable->amaterno)? $responsable->amaterno : '' }}"> </div></div><div class="col-lg-2"> <label for="val_fnacresp" class="form-label">Fecha de Nacimiento</label> <input disabled type="date" class="form-control" id="val_fnacresp" name="fnacresp"  value="{{ $responsable->fnac }}" required> <div class="invalid-feedback"> Por favor proporcione una fecha de nacimiento. </div></div><div class="col-lg-2"> <label class="form-label">Sexo</label> <div class="form-check">  <input disabled type="radio" class="form-check-input disabled" id="val_sexofresp" name="sexoresp" value="F"   @if (isset($responsable->sexo) && $responsable->sexo == 'F')    CHECKED   @endif  required>  <label class="form-check-label" for="val_sexofresp">Femenino</label> </div> <div class="form-check">  <input disabled type="radio" class="form-check-input disabled" id="val_sexomresp" name="sexoresp" value="M"   @if (isset($responsable->sexo) && $responsable->sexo == 'M')    CHECKED   @endif  required>  <label class="form-check-label" for="val_sexom">Masculino</label>  <div class="invalid-feedback">Seleccione almenos uno</div> </div></div><div class="col-lg-2"> <label for="val_ocupacionresp" class="form-label">Ocupación</label> <input disabled type="text" class="form-control" id="val_ocupacionresp" name="ocupacionresp"  value="{{ isset($responsable->ocupacion)? $responsable->ocupacion : '' }}" require> <div class="invalid-feedback"> Por favor complete el campo. </div></div><div class="col-lg-2"> <label for="val_ocomunitariaresp" class="form-label">Gestión Comunitaria</label><input disabled  type="text" class="form-control" id="val_ocomunitariaresp" name="ocomunitariaresp"  value="{{ isset($responsable->ocomunitaria)? $responsable->ocomunitaria : '' }}"></div><div class="col-lg-2"> <label for="val_nacionalidadresp" class="form-label">Nacionalidad</label> <input disabled type="text" class="form-control" id="val_nacionalidadresp" name="nacionalidadresp"  value="{{ isset($responsable->nacionalidad)? $responsable->nacionalidad : '' }}"></div><div class="col-lg-2"> <label for="val_telefonoresp" class="form-label">Telefono</label> <input disabled type="text" class="form-control" id="val_telefonoresp" name="telefonoresp"  value="{{ isset($responsable->telefono)? $responsable->telefono : '' }}"></div>');
        }
      </script>
      
    </x-slot>    

</x-app-layout>
