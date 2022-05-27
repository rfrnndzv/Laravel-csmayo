<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            Farmacia
        </h2>
    </x-slot>

    <!-- Menu de Opciones -->
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Opciones
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="btnGroupDrop1">
            <li><a id="opt-imprimir" class="dropdown-item text-danger">Imprimir</a></li>
            <li><a class="dropdown-item text-danger" href="{{ route('farmacia.index') }}">Cancelar</a></li>
        </ul>
      </div>
      
    <!-- Contenido -->
    <div class="contenido p-3">
        <label id="ciusuario" class="form-label invisible">{{ Auth::user()->ciusuario }}</label>
        <label id="nroreceta" class="form-label invisible">{{ $receta->nroreceta }}</label>
        <div class="row">

            <div class="col-md-3">
                <label class="form-label">SEDES: LA PAZ</label>
            </div>

            <div class="col-md-3">
                <label class="form-label">RED: COREA</label>
            </div>

            <div class="col-md-3">
                <label class="form-label">SEGURO: {{ $hclinica->seguro }}</label>
            </div>

            <div class="col-md-12">
                <label class="form-label">MUNICIPIO: EL ALTO</label>
            </div>

            <div class="col-md-12">
                <label class="form-label">ESTABLECIMIENTO: CENTRO DE SALUD INTEGRAL 1º DE MAYO</label>
            </div>

            <div class="col-md-8">
                <label class="form-label">TIPO DE ATENCIÓN: {{ $receta->tipoatencion }}</label>
            </div>

            <div class="col-md-4">
                <label class="form-label">NRO. HISTORIA CLICINA: {{ $hclinica->nrohc }} </label>
            </div>

            <div class="col-md-8">
                <label class="form-label">NOMBRE DEL PACIENTE:
                    {{ $persona->nombres . ' ' . $persona->apaterno . ' ' . $persona->amaterno }} </label>
            </div>

            <div class="col-md-4">
                <label class="form-label">FECHA DE NACIMIENTO: {{ $paciente->fnac }} </label>
            </div>

            <div class="col-md-6">
                <label class="form-label">DOMICILIO: {{ $paciente->direccion . ' #' . $paciente->nrodomicilio }}
                </label>
            </div>

            <div class="col-md-3">
                <label class="form-label">SEXO: {{ $paciente->sexo }} </label>
            </div>

            <div class="col-md-3">
                <label class="form-label">FECHA: {{ date('d/m/Y') }} </label>
            </div>

            
            <label class="division" for="">DIAGNOSTICO(S)</label>
            

            <table id="TablaDiagnosticos" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Diagnostico</th>
                        <th>N/R</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescribes as $prescribe)
                        <tr>
                            <td> {{ $prescribe->codd }} </td>
                            <td> {{ $prescribe->descripcion }} </td>
                            <td> {{ $prescribe->nr }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <label class="division" for="">MEDICAMENTO(S)</label>

            <table id="TablaMedicamentos" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>Cod</th>
                        <th>Medicamentos e Insumos</th>
                        <th>Indicaciones para el Paciente</th>
                        <th>Cantidad Recetada</th>
                        <th>Cantidad a Dispensar</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicamentos as $medicamento)
                        <tr>
                            <td>{{ $medicamento->id }}</td>
                            <td>{{ $medicamento->medicamento }}</td>
                            <td>{{ $medicamento->indicacion }}</td>
                            <td>{{ $medicamento->crecetada }}</td>
                            <td class="editable" contenteditable="true">0</td>
                            <td class="editable" contenteditable="true">0.00</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Mis Librerias JS -->
    <x-slot name="scriptjs">
        <script src="{{ asset('js/farmacia.js') }}"></script>
    </x-slot>

</x-app-layout>
