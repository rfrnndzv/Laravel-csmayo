<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            Recaudaciones
        </h2>
    </x-slot>
    
    <!-- Menu de Opciones -->
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
          <button id="BGD_menuPrincipal" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Recaudaciones
          </button>
          <ul class="dropdown-menu" aria-labelledby="BGD_menuPrincipal">
            <li><a type="button" class="dropdown-item" href="/recaudaciones">Volver</a></li>
          </ul>
        </div>
      </div>
  
      <!-- Contenido -->
      <div class="contenido p-3">
        <table id="example" class="display" style="width:100%">
          <thead>
            <tr>
              <th>C.I.</th>
              <th>Nombres</th>
              <th>Ap. Paterno</th>
              <th>Ap. Materno</th>
              <th>Fecha Nac.</th>
              <th>Sexo</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pacientes as $paciente)
              <tr>
                <td> {{ $paciente->cipaciente }} </td>
                <td> {{ $paciente->nombres }} </td>
                <td> {{ $paciente->apaterno }} </td>
                <td> {{ $paciente->amaterno }} </td>
                <td> {{ $paciente->fnac }} </td>
                <td> {{ $paciente->sexo }} </td>
                <td> <a href="{{ route('recaudaciones.activa', $paciente->ci) }}" class="btn btn-success">Habilitar</a></td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>C.I.</th>
              <th>Nombres</th>
              <th>Ap. Paterno</th>
              <th>Ap. Materno</th>
              <th>Fecha Nac.</th>
              <th>Sexo</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>

      <!-- Mis Librerias JS -->
      <x-slot name="scriptjs">
        <!-- Código de inicio, introduce datos del Responsable si existe -->
        <script src="{{ asset('js/recaudaciones.js') }}"></script>
        <script>
          $(document).ready(function() {
              $('#example').DataTable();
          });
        </script>
      </x-slot>

</x-app-layout>

