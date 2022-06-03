<html>
<head>
  
  <style>
    body{
      font-family: sans-serif;
    }

    @page {
      margin: 160px 50px;
      font-size: 7pt;
    }

    header {
      position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }

    header h3{
      margin: 10px 0;
    }

    header h4{
      margin: 0 0 10px 0;
    }

    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }

    footer .page:after {
      content: counter(page);
    }

    footer table {
      width: 100%;
    }

    footer p {
      text-align: right;
    }
    
    footer .izq {
      font-weight: bold;
      text-align: left;
    }

    #TablaDiagnosticos, #TablaMedicamentos {
      border: 1px solid rgba(0, 0, 0, 0.5);
    }

    .division{
      background-color: #ddd;
      text-align: center;
      padding: 5px;
    }

    table.tabla tbody tr td label, #TablaMedicamentos tbody tr td.costoTotal label {
      font-weight: bold;
    }

    #TablaMedicamentos tbody tr td.costoTotal {
      text-align: right;
    }
    
  </style>
<body>
  
  <header>
    <h3>RECETARIO / RECIBO</h3>
    <h4>ATENCIÓN AMBULATORIA</h4>
  </header>
  
  <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
              El prescriptor y dispensador certifican la veracidad de la información declarada en este documento médico legal.
              El usuario certifica haber recibido los medicamentos señalados en este documento médico legal.
            </p>
        </td>
      </tr>
    </table>
  </footer>

  <div id="content">
    
    <!-- Contenido -->
    <div class="contenido p-3">
      <table id="TablaDatos" class="tabla display" style="width:100%">
        <tbody>
          <tr>
            <td colspan="2"> <label class="form-label">SEDES: LA PAZ</label> </td>
            <td colspan="2"> <label class="form-label">RED: COREA</label> </td>
            <td colspan="2"> <label class="form-label">SEGURO: </label> {{ $hclinica->seguro }}</td>
          </tr>
          <tr>
            <td colspan="6"> <label class="form-label">MUNICIPIO: EL ALTO</label> </td>
          </tr>
          <tr>
            <td colspan="4"><label class="form-label">ESTABLECIMIENTO: CENTRO DE SALUD INTEGRAL 1º DE MAYO</label></td>
            <td colspan="2"><label class="form-label">VENTA: </label></td>
          </tr>
          <tr>
            <td colspan="4"> <label class="form-label">TIPO DE ATENCIÓN: </label>{{ $receta->tipoatencion }}</td>
            <td colspan="2"> <label class="form-label">NRO. HISTORIA CLICINA: </label>{{ $hclinica->nrohc }} </td>
          </tr>
          <tr>
            <td colspan="4"> <label class="form-label">NOMBRE DEL PACIENTE:</label>
              {{ $persona->nombres . ' ' . $persona->apaterno . ' ' . $persona->amaterno }} </td>
            <td colspan="2"> <label class="form-label">FECHA DE NACIMIENTO: </label>{{ $paciente->fnac }}</td>
          </tr>
          <tr>
            <td colspan="4"> <label class="form-label">DOMICILIO: </label>{{ $paciente->direccion . ' #' . $paciente->nrodomicilio }}</td>
            <td colspan="1"><label class="form-label">SEXO: </label>{{ $paciente->sexo }}</td>
            <td colspan="1"><label class="form-label"> FECHA: </label>{{ date('d/m/Y') }}</td>
          </tr>
        </tbody>
      </table>

      <div class="division" for="">DIAGNOSTICO(S)</div>
      
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

      <div class="division" for="">MEDICAMENTO(S)</div>

      <?php
        $costoTotal = 0;
      ?>

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
                  <?php $costoTotal = $costoTotal + $medicamento->valor ?>
              @endforeach
              <tr>
                <td class="costoTotal" colspan="6"> <label class="form-label"> Costo Total: </label>{{ $costoTotal }} </td>
              </tr>
          </tbody>
      </table>
    </div>

  </div>
</body>
</html>