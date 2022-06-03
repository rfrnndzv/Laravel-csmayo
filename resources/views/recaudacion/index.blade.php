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
            <li><a class="dropdown-item
              @if (Auth::user()->nivel != 3)
                deshabilitar
              @endif" href="{{ route('recaudaciones.create') }}">Registro a Paciente</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a type="button" class="dropdown-item" href="{{ route('recaudaciones.archivados') }}">Pacientes Archivados</a></li>
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
              <th>Ap. Casada</th>
              <th>Fecha Nac.</th>
              <th>Sexo</th>
              <th>Ficha para:</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pacientes as $paciente)
              <tr>
                <td> {{ $paciente->cipaciente }} </td>
                <td> {{ $paciente->nombres }} </td>
                <td> {{ $paciente->apaterno }} </td>
                <td> {{ $paciente->amaterno }} </td>
                <td> {{ $paciente->apcasada }} </td>
                <td> {{ $paciente->fnac }} </td>
                <td> {{ $paciente->sexo }} </td>
                <td>
  
                  <nav class="navbar navbar-expand">
                    <div class="container">
                      <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                          <li id="course" class="dropdown">
                            <a class="btn" href="#"><span class="opciones"></span> </a>
                            <ul class="dropdown-menu">
                              <li id="sub-dropdown" class="dropdown">
                                <a class="dropdown-item" href="#">Consulta Médica<span class="dir-der"></span> </a>
                                <ul id="sub-dropdown-menu" class="dropdown-menu left">

                                  @foreach ($medicos as $medico)
                                  <li>
                                    <form name="reserva" action="{{ route('anexo.reserva') }}" method="POST">
                                      @csrf
                                      <input name="cipaciente" type="hidden" value="{{ $paciente->cipaciente }}">
                                      <input name="cimed" type="hidden" value="{{ $medico->cimed }}">
                                        <button class="dropdown-item" type="submit">{{ $medico->nombres.' '.$medico->apaterno.' - '.$medico->especialidad }}</button>
                                    </form>
                                  </li>
                                  @endforeach

                                </ul>
                              </li>
                              <li><a class="dropdown-item" href="#">Curaciones</a></li>
                              <li><a class="dropdown-item" href="#">Emergencias</a></li>
                              <li><a class="dropdown-item" href="#">Nutrición</a></li>
                              <li><a class="dropdown-item" href="#">Sala Covid-19</a></li>
                              <li><a class="dropdown-item" href="#">Toma de Presión</a></li>
                              <li><a class="dropdown-item" href="#">Vacunas - Peso y Talla</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
  
                </td>
                <td> <a href="{{ route('recaudaciones.edit', $paciente->ci) }}" class="btn"><span class="editar"></span></a></td>
                <td>
                  <form action="{{ route('recaudaciones.destroy', $paciente->ci) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn" type="submit"><span class="eliminar"></span></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>C.I.</th>
              <th>Nombres</th>
              <th>Ap. Paterno</th>
              <th>Ap. Materno</th>
              <th>Ap. Casada</th>
              <th>Fecha Nac.</th>
              <th>Sexo</th>
              <th>Ficha para:</th>
              <th>Editar</th>
              <th>Eliminar</th>
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