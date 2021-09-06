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
      <form class="row g-3 needs-validation" id="registro" name="registro" method="POST" action="{{ route('recaudaciones.store') }}" autocomplete="off" novalidate>
        @include('recaudacion.formulario')
      </form>
    </div>

    <!-- Mis Librerias JS -->
    <x-slot name="scriptjs">
      <!-- Código de inicio, introduce datos del Responsable si existe -->
      <script src="{{ asset('js/recaudaciones.js') }}"></script>
    </x-slot>    

</x-app-layout>

