<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            Consulta Médica
        </h2>
    </x-slot>

    <!-- Menu de Opciones -->
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
          <button id="BGD_menuPrincipal" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
          </button>
          <ul class="dropdown-menu" aria-labelledby="BGD_menuPrincipal">
            <li><a class="dropdown-item" href="">Recetar</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a type="button" class="dropdown-item" href="{{ route('cmedica.index') }}">Volver</a></li>
          </ul>
        </div>
      </div>

    <!-- Contenido -->
    <div class="contenido p-3">
        <form id="cmedica" class="row g-3 needs-validation" method="POST" action="{{ route('cmedica.update', $anexo) }}" novalidate>
            @csrf
            @method('PUT')
            <input class="col-md-3" type="hidden" value="{{ $anexo->nroanexo }}" name="nroanexo">

            <div class="col-md-3 position-relative">
                <label for="val_hingreso" class="form-label">Hora</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Ingreso</span>
                    <input type="time" class="form-control" id="val_hingreso" value="{{ $amedica->hingreso }}" name="hingreso" readonly>
                </div>
            </div>

            <div class="col-md-3 position-relative align-self-end">
                <div class="input-group has-validation">
                    <span class="input-group-text" id="val_hegreso">Egreso</span>
                    <input type="time" class="form-control" id="val_hegreso" value="{{ isset($amedica->hegreso)?$amedica->hegreso:'' }}" name="hegreso" readonly>
                </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_talla" class="form-label">Talla</label>
                <div class="input-group has-validation">
                    <input type="number" step="0.01" min="0.00" max="299.9" class="form-control" id="val_talla" value="{{ isset($amedica->talla)?$amedica->talla:'' }}"
                        aria-describedby="validationTooltipUsernamePrepend" name="talla" required>
                    <div class="invalid-tooltip">
                        Por favor intoduzca talla.
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 position-relative">
                <label for="val_peso" class="form-label">Peso</label>
                <input type="number" step="0.01" min="0.00" max="699.9" class="form-control" id="val_peso" name="peso"
                    value="{{ isset($amedica->peso)?$amedica->peso:'' }}" required>
                <div class="invalid-tooltip">
                    Por favor intoduzca peso.
                </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_temperatura" class="form-label">Temperatura</label>
                <input type="number" step="0.01" min="0.00" max="99.9" class="form-control" id="val_temperatura"
                    name="temperatura" value="{{ isset($amedica->temperatura)?$amedica->temperatura:'' }}" required>
                <div class="invalid-tooltip">
                    Por favor intoduzca Temperatura.
                </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_fc" class="form-label">Frecuencia Cardiaca</label>
                <input type="number" min="0" max="220" class="form-control" id="val_fc" name="fc" value="{{ isset($amedica->fc)?$amedica->fc:'' }}" required>
                <div class="invalid-tooltip">
                    Por favor intoduzca Frec. cardiaca.
                </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_pa" class="form-label">Presión Arterial</label>
                <input type="text" class="form-control" id="val_pa" name="pa" value="{{ isset($amedica->pa)?$amedica->pa:'' }}" required>
                <div class="invalid-tooltip">
                    Por favor intoduzca Presión arterial.
                </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_fr" class="form-label">Frecuencia Respiratoria</label>
                <input type="number" min="0" max="199" class="form-control" id="val_fr" name="fr" value="{{ isset($amedica->fr)?$amedica->fr:'' }}" required>
                <div class="invalid-tooltip">
                    Por favor intoduzca Frec. respiratoria.
                </div>
            </div>

            @if (Auth::user()->nivel == 5)
                <div class="col-md-3 position-relative">
                    <label for="val_subjetivo" class="form-label">Subjetivo</label>
                    <input type="textarea" class="form-control" id="val_subjetivo" name="subjetivo" required>
                    <div class="invalid-tooltip">
                        Por favor intoduzca Subjetivo.
                    </div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="val_objetivo" class="form-label">Objetivo</label>
                    <textarea class="form-control" id="val_objetivo" name="objetivo" rows="10" cols="40"></textarea>
                    <div class="invalid-tooltip">
                        Por favor intoduzca Objetivo.
                    </div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="val_analisis" class="form-label">Análisis</label>
                    <input type="textarea" class="form-control" id="val_analisis" name="analisis" required>
                    <div class="invalid-tooltip">
                        Por favor intoduzca Análisis.
                    </div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="val_paccion" class="form-label">Plan de Acción</label>
                    <input type="textarea" class="form-control" id="val_paccion" name="paccion" required>
                    <div class="invalid-tooltip">
                        Por favor intoduzca Plan de Acción.
                    </div>
                </div>
            @endif

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
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
