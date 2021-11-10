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
        <form id="cmedica" class="row g-3 needs-validation" method="POST"
            action="{{ route('cmedica.update', $anexo) }}" novalidate>
            @csrf
            @method('PUT')
            <input class="col-md-3" type="hidden" value="{{ $anexo->nroanexo }}" name="nroanexo">

            <div class="col-md-3 position-relative">
                <label for="val_hingreso" class="form-label">Hora</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Ingreso</span>
                    <input type="time" class="form-control" id="val_hingreso" value="{{ $amedica->hingreso }}"
                        name="hingreso" readonly>
                </div>
            </div>

            <div class="col-md-3 position-relative align-self-end">
                <div class="input-group has-validation">
                    <span class="input-group-text" id="val_hegreso">Egreso</span>
                    <input type="text" class="form-control" id="val_hegreso" value="{{ $amedica->hegreso }}"
                        name="hegreso" readonly>
                </div>
            </div>

            <div class="col-md-6"></div>

            <?php
            $dia_actual = date('Y-m-d');
            $edad_diff = date_diff(date_create($paciente->fnac), date_create($dia_actual));
            ?>

            <div class="col-md-3 position-relative">
                <label for="val_talla" class="form-label">Edad</label>
                <div class="input-group has-validation">
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">Año(s)</span>
                        <input type="number" class="form-control" id="anios" value="{{ $edad_diff->format('%y') }}"
                            name="anios" readonly>
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">Mes(es)</span>
                        <input type="number" class="form-control" id="meses" value="{{ $edad_diff->format('%m') }}"
                            name="meses" readonly>
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">Día(s)</span>
                        <input type="number" class="form-control" id="dias" value="{{ $edad_diff->format('%d') }}"
                            name="dias" readonly>
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

            @if (Auth::user()->nivel == 5)
                @include('consulta_medica.formulario_medico')
            @endif

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>

    <div class="col-md-12">
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Receta Médica</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Tipo de Atención</label>
                                <select class="form-select" id="validationCustom04" required>
                                    <option selected disabled value="">Seleccionar...</option>
                                    <option value="consultorio">En consultorio</option>
                                    <option value="domiciliaria">Domiciliaria</option>
                                    <option value="internación">Internación de Transito</option>
                                    <option value="referencia">Referencia</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="validationCustom01" required>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
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
