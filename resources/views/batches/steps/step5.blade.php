{{-- PASO 5 DEL ASISTENTE: PÁGINA 8/14 (Fin Parte II Paso 7 y Parte III: Preparación de la FASE II) --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '8/14', 'batch' => $batch])

        <p class="small fw-semibold mb-1">Registrar el inicio y terminó de la actividad:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p2_paso7_actividad', 'batch' => $batch])

        <h6 class="fw-bold text-uppercase mt-4 mb-2">Parte III. Preparación de la FASE II</h6>

        <p class="fw-bold small mb-2">Paso No. 1 Registrar el inicio y final de la preparación de la Fase II en el siguiente cuadro:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p3_paso1_fase2', 'batch' => $batch])

        <p class="fw-bold small mb-2 mt-3">
            Paso No. 2 Adicionar en el Procesador de triple efecto y vacío TFZRJ-750L-Q (Marmita fase acuosa) las materias primas una a una, permitiendo que cada una se disuelva completamente antes de agregar la otra bajo el siguiente orden a la temperatura indicada y con agitación manual:
        </p>

        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle mb-3 small">
                    <thead>
                        <tr class="bg-light text-center">
                            <th style="width: 18%;">Orden de adición</th>
                            <th style="width: 22%;">Cantidad Teórica</th>
                            <th style="width: 30%;">Materia Prima</th>
                            <th style="width: 30%;">Cantidad Física (Kg ó L)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center fw-bold">1</td>
                            <td class="text-center fw-semibold">30.000</td>
                            <td>Polisorbato 20</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte3_paso2][polisorbato_fisica]" value="{{ $batch->val('parte3_paso2.polisorbato_fisica') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="Ej. 30.000 kg">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center fw-bold">2</td>
                            <td class="text-center fw-semibold">1.250</td>
                            <td>Vitamina E</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte3_paso2][vitamina_e_fisica]" value="{{ $batch->val('parte3_paso2.vitamina_e_fisica') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="Ej. 1.250 kg">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center fw-bold">3</td>
                            <td class="text-center fw-semibold">2.500</td>
                            <td>Extracto de Aloe Vera</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte3_paso2][aloe_fisica]" value="{{ $batch->val('parte3_paso2.aloe_fisica') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="Ej. 2.500 kg">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p3_paso2_mp_realizo', 'type' => 'blue', 'label' => 'Parte III Paso 2 MP - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p3_paso2_mp_verifico', 'type' => 'pink', 'label' => 'Parte III Paso 2 MP - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered ebr-table align-middle text-center mb-3 small">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 38%;">Control de proceso</th>
                            <th style="width: 30%;">Especificación</th>
                            <th style="width: 32%;">Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tipo de agitación</td>
                            <td class="fw-bold">Manual</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte3_paso2][tipo_agitacion]" value="{{ $batch->val('parte3_paso2.tipo_agitacion', 'Manual') }}" class="form-control form-control-sm ebr-input text-center fw-semibold">
                            </td>
                        </tr>
                        <tr>
                            <td>Temperatura:</td>
                            <td class="fw-bold">38°C - 42°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte3_paso2][temperatura]" value="{{ $batch->val('parte3_paso2.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="38" data-max="42" placeholder="38°C - 42°C">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p3_paso2_ctrl_realizo', 'type' => 'blue', 'label' => 'Parte III Paso 2 Ctrl - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p3_paso2_ctrl_verifico', 'type' => 'pink', 'label' => 'Parte III Paso 2 Ctrl - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="small fw-bold mb-2">*Nota.- se deberá monitorear que no se sobrepase del rango de temperatura indicado.</p>

        @include('batches.partials.page-footer')
    </div>
</div>
