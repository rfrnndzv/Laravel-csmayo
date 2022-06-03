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
                                <option selected value="EN CONSULTORIO">En consultorio</option>
                                <option value="DOMICILIARIA">Domiciliaria</option>
                                <option value="INTERNACIÓN DE TRANSITO">Internación de Transito</option>
                                <option value="REFERENCIA">Referencia</option>
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