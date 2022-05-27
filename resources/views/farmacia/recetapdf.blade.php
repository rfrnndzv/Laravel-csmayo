
      
    <!-- Contenido -->
    <div class="contenido p-3">

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

            <table id="TablaMedicamentos" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Cod</th>
                        <th>Medicamentos e Insumos</th>
                        <th>Indicaciones para el Paciente</th>
                        <th>Cantidad Recetada</th>
                        <th>Cantidad Dispensada</th>
                        <th>valor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicamentos as $medicamento)
                        <tr>
                            <td> {{ $medicamento->id }} </td>
                            <td> {{ $medicamento->medicamento }} </td>
                            <td> {{ $medicamento->indicacion }} </td>
                            <td> {{ $medicamento->crecetada }} </td>
                            <td> {{ $medicamento->cdispensada }} </td>
                            <td> {{ $medicamento->valor }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


        <script>
            $(document).ready(function() {
                $('#TablaDiagnosticos').DataTable()
                $('#TablaMedicamentos').DataTable()
            });
        </script>

