<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            Consulta Médica
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
                    <!-- Button trigger modal -->
                    <a type="button" class="dropdown-item" href="{{ route('hclinica.show', $anexo->nrohc) }}">
                        Historial Clínico
                    </a>
                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Recetar
                    </button>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a type="button" class="dropdown-item" href="{{ route('cmedica.index') }}">Volver</a></li>
            </ul>
        </div>
    </div>

    <!-- Contenido -->
    <div class="contenido p-3">
        <h1 id="val_nrohc" class="h3" hidden>{{ $anexo->nrohc }}</h1>
        <h1 class="h3">{{ $persona->nombres . ' ' . $persona->apaterno . ' ' . $persona->amaterno }}</h1>
        <form id="cmedica" class="row g-3 needs-validation" method="POST"
            action="{{ route('cmedica.update', $anexo) }}" novalidate>
            @csrf
            @method('PUT')
            <input class="col-md-3" type="hidden" value="{{ $anexo->nroanexo }}" name="nroanexo">

            <div class="col-md-3 position-relative">
                <label for="val_hingreso" class="form-label">Hora</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Ingreso</span>
                    <label type="time" class="form-control" id="val_hingreso" 
                        name="hingreso" readonly>{{ $amedica->hingreso }}</label>
                </div>
            </div>

            <div class="col-md-3 position-relative align-self-end">
                <div class="input-group has-validation">
                    <span class="input-group-text" id="val_hegreso">Egreso</span>
                    <label type="text" class="form-control" id="val_hegreso"
                        name="hegreso" readonly>{{ $amedica->hegreso }}</label>
                </div>
            </div>

            <div class="col-md-6"></div>

            <?php
                $fecha_actual = date('Y-m-d');
                $edad_diff = date_diff(date_create($paciente->fnac), date_create($fecha_actual));
            ?>

            <div class="col-md-3 position-relative">
                <label for="val_talla" class="form-label">Edad</label>
                <div class="input-group has-validation">
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">Año(s)</span>
                        <label type="number" class="form-control" id="anios"
                            name="anios" readonly>{{ $edad_diff->format('%y') }}</label>
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">Mes(es)</span>
                        <label type="number" class="form-control" id="meses" 
                            name="meses" readonly>{{ $edad_diff->format('%m') }}</label>
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">Día(s)</span>
                        <label type="number" class="form-control" id="dias"
                            name="dias" readonly>{{ $edad_diff->format('%d') }}</label>
                    </div>
                </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_talla" class="form-label">Talla (Metros)</label>
                <div class="input-group has-validation">
                    <input type="number" step="0.01" min="0.00" max="2.99" class="form-control" id="val_talla"
                        value="{{ isset($amedica->talla) ? $amedica->talla : '' }}"
                        aria-describedby="validationTooltipUsernamePrepend" name="talla" required>
                    <div class="invalid-tooltip">
                        Por favor intoduzca talla.
                    </div>
                </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_peso" class="form-label">Peso</label>
                <div class="input-group has-validation">
                    <input type="number" step="0.01" min="0.00" max="699.9" class="form-control" id="val_peso"
                        name="peso" value="{{ isset($amedica->peso) ? $amedica->peso : '' }}" required>
                    <div class="invalid-tooltip">
                        Por favor intoduzca peso.
                    </div>
                </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_talla" class="form-label">Indice de Masa Corporal</label>
                <p id="imc" class="fs-3"></p>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_temperatura" class="form-label">Temperatura</label>
                <input type="number" step="0.01" min="0.00" max="99.9" class="form-control" id="val_temperatura"
                    name="temperatura" value="{{ isset($amedica->temperatura) ? $amedica->temperatura : '' }}"
                    required>
                <div class="invalid-tooltip">
                    Por favor intoduzca Temperatura.
                </div>
                <div id="alerta_temperatura"></div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_fc" class="form-label">Frecuencia Cardiaca</label>
                <input type="number" min="0" max="220" class="form-control" id="val_fc" name="fc"
                    value="{{ isset($amedica->fc) ? $amedica->fc : '' }}" required>
                <div class="invalid-tooltip">
                    Por favor intoduzca Frec. cardiaca.
                </div>
                <div id="alerta_fc"></div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_pa" class="form-label">Presión Arterial</label>
                <input type="text" class="form-control" id="val_pa" name="pa"
                    value="{{ isset($amedica->pa) ? $amedica->pa : '' }}" required>
                <div class="invalid-tooltip">
                    Por favor intoduzca Presión arterial.
                </div>
                <div id="alerta_pa"></div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="val_fr" class="form-label">Frecuencia Respiratoria</label>
                <input type="number" min="0" max="199" class="form-control" id="val_fr" name="fr"
                    value="{{ isset($amedica->fr) ? $amedica->fr : '' }}" required>
                <div class="invalid-tooltip">
                    Por favor intoduzca Frec. respiratoria.
                </div>
                <div id="alerta_fr"></div>
            </div>

            @if (Auth::user()->nivel == 5 or Auth::user()->nivel == 6)
                @include('consulta_medica.formulario_medico')
            @endif

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>

    @if (Auth::user()->nivel == 4 or Auth::user()->nivel == 5 or Auth::user()->nivel == 6)
        @include('consulta_medica.formulario_receta')
    @endif

    <!-- Mis Librerias JS -->
    <x-slot name="scriptjs">
        <!-- Código de inicio, introduce datos del Responsable si existe -->
        <script src="{{ asset('js/amedica.js') }}"></script>
        <script src="{{ asset('js/tablaDatos.js') }}"></script>
    </x-slot>

</x-app-layout>