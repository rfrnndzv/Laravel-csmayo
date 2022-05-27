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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Receta Médica</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <label for="val_tipoatencion" class="form-label">Tipo de Atención</label>
                                <select class="form-select" id="val_atencion" required>
                                    <option selected value="consultorio">En consultorio</option>
                                    <option value="domiciliaria">Domiciliaria</option>
                                    <option value="internación">Internación de Transito</option>
                                    <option value="referencia">Referencia</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="val_fecha" class="form-label">Fecha</label>
                                <input type="text" class="form-control" id="val_fecha"
                                value=" {{  date('d/m/Y') }} "
                                readonly>
                            </div>

                            <label class="division" for="">Diagnostico</label>

                            <div class="col-md-8">
                                <label for="val_codigo" class="form-label">Código</label>
                                <select class="form-select" id="val_codigo">
                                    <option selected disabled value="">Seleccionar...</option>
                                    <option value="A03">A03 Disentería</option>
                                    <option value="A09">A09 Diarrea y Diarrea Persistente</option>
                                    <option value="A59">A59 Tricomoniasis</option>
                                    <option value="B359">B359 Nicosis Cutanea</option>
                                    <option value="B37">B37 Candidiasis Vaginal</option>
                                    <option value="B370">B370 Monoliasis Oral</option>
                                    <option value="B86">B86 Sarcoptosis</option>
                                    <option value="D50">D50 Anemias por Deficiencia de Hierro</option>
                                    <option value="E440">E440 Desnutrición Aguda Moderada</option>
                                    <option value="E45">E45 Desnutrición Crónica en Menores de 2 años</option>
                                    <option value="H10">H10 Conjuntivitis Vacteriana</option>
                                    <option value="H660">H660 Infección Aguda del Oído22</option>
                                    <option value="H661">H661 Infección Crónica del Oído</option>
                                    <option value="J00">J00 Resfrío Común</option>
                                    <option value="J030">J030 Faringoamigdalitis</option>
                                    <option value="J15">J15 Neumonia no Grave</option>
                                    <option value="K590">K590 Estreñimiento</option>
                                    <option value="L22">L22 Dermatitis del Pañal</option>
                                    <option value="L50">L50 Urticaria</option>
                                    <option value="M545">M545 Lumbalgia</option>
                                    <option value="N30">N30 Infección Urinaria Baja (Sistitis)</option>
                                    <option value="O140">O140 Preelclapmcia Leve y Moderada</option>
                                    <option value="O210">O210 Emesis e Hiperemesis del Embarazo</option>
                                    <option value="PC104">PC104 Prevención Anemias de Niños</option>
                                    <option value="PC106">PC106 Prev. Def. Vid. A 1 Dosis</option>
                                    <option value="PC107">PC107 Prev. Def. Vid. A 2 Dosis</option>
                                    <option value="PC1CCD">PC1CCD Peso Talla Normal</option>
                                    <option value="PC2">PC2 Prev. Anemia en Embarazos</option>
                                    <option value="PC34">PC34 Tratamiento Preferencia Referencia</option>
                                    <option value="PC58">PC58 Tuberculosis Pulmonar</option>
                                    <option value="PC88">PC88 Tuberculosis Extrapulmonar</option>
                                    <option value="PC91">PC91 Desnutrición Aguda Grave (Pre-ref.)</option>
                                    <option value="T140">T140 Contusiones Superficiales</option>
                                    <option value="Z381">Z381 Parto y RN en Domicilio por Pers. Salud</option>
                                    <option value="Z392">Z392 Control Puerperal</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="val_nr" class="form-label">N/R</label>
                                <input type="text" class="form-control" id="val_nr">
                            </div>

                            <div class="col-md-2 align-self-end">
                                <a class="btn btn-success" id="btn-aniadir1">Añadir</a>
                            </div>

                            <table id="TablaDiagnosticos" class="" style="width:100%">
                                <thead>
                                  <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">N/R</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>

                            <div class="row justify-content-end">
                                <div class="col-2 text-right">
                                    <a class="btn btn-danger" id="btn-quitar1">Quitar</a>
                                </div>
                            </div>
                            
                            <label class="division" for="">Medicamentos</label>

                            <div class="col-md-4">
                                <label for="val_medicamento" class="form-label">Medicamentos e Insumos</label>
                                <input type="text" class="form-control" id="val_medicamento">
                            </div>

                            <div class="col-md-4">
                                <label for="val_medicamento" class="form-label">Indicaciones para el Paciente</label>
                                <input type="text" class="form-control" id="val_indicaciones">
                            </div>

                            <div class="col-md-2">
                                <label for="val_medicamento" class="form-label">Cantidad</label>
                                <input type="text" class="form-control" id="val_cantidad">
                            </div>

                            <div class="col-md-2 align-self-end">
                                <a class="btn btn-success" id="btn-aniadir2">Añadir</a>
                            </div>

                            <table id="TablaMedicamentos" class="" style="width:100%">
                                <thead>
                                  <tr>
                                    <th scope="col">Medicamentos e Insumos</th>
                                    <th scope="col">Indicaciones</th>
                                    <th scope="col">Cantidad Recetada</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>

                            <div class="row justify-content-end">
                                <div class="col-2 text-right">
                                    <a class="btn btn-danger" id="btn-quitar2">Quitar</a>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" id="btn-recetar">Recetar</button>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mis Librerias JS -->
    <x-slot name="scriptjs">
        <!-- Código de inicio, introduce datos del Responsable si existe -->
        <script src="{{ asset('js/amedica.js') }}"></script>
        <script src="{{ asset('js/tablaDatos.js') }}"></script>
    </x-slot>

</x-app-layout>