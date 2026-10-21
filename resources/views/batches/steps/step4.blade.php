{{-- PASO 4 DEL ASISTENTE: PÁGINAS 5/14, 6/14 y 7/14 (Parte II: Preparación de la Fase I - Pasos 1 al 7) --}}

{{-- PÁGINA 5/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '5/14', 'batch' => $batch])

        {{-- Parte II Paso No. 1 --}}
        <p class="fw-bold small mb-2">Paso No.1 Registrar el inicio y final de la preparación de la Fase I en el siguiente cuadro:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p2_paso1_fase1', 'batch' => $batch])

        {{-- Parte II Paso No. 2 --}}
        <p class="fw-bold small mb-2">
            Paso No. 2 Adicionar en el tanque auxiliar (marmita de fase acuosa) del Procesador de triple efecto y vacío TFZRJ-750L-Q <em>(10)</em> la cantidad de agua purificada indicada utilizando mangueras esterilizadas, registre el número de toma de agua:
        </p>

        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle mb-3 small">
                    <thead>
                        <tr class="bg-light text-center">
                            <th style="width: 24%;">Cantidad Teórica</th>
                            <th style="width: 41%;">Materia Prima</th>
                            <th style="width: 35%;">Cantidad Física (Kg ó L)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center fw-bold">420.0 L</td>
                            <td>Agua Purificada N2, P/Farmacéuticos</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso2][agua_fisica]" value="{{ $batch->val('parte2_paso2.agua_fisica') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="Ej. 420.0 L">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso2_agua_realizo', 'type' => 'blue', 'label' => 'Parte II Paso 2 Agua 420L - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso2_agua_verifico', 'type' => 'pink', 'label' => 'Parte II Paso 2 Agua 420L - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered ebr-table align-middle mb-2 small">
                    <tbody>
                        <tr>
                            <td class="text-end fw-bold" style="width: 65%;">Toma de agua</td>
                            <td class="ebr-cell-blue p-1" style="width: 35%;">
                                <input type="text" name="payload[parte2_paso2][toma_agua]" value="{{ $batch->val('parte2_paso2.toma_agua') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="No. toma de agua">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso2_toma_realizo', 'type' => 'blue', 'label' => 'Parte II Paso 2 Toma Agua - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso2_toma_verifico', 'type' => 'pink', 'label' => 'Parte II Paso 2 Toma Agua - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="small fst-italic mb-2">Nota. Colocar en el Anexo 2 el ticket o boleta comprobante de la esterilización de las mangueras</p>

        {{-- Parte II Paso No. 3 --}}
        <p class="fw-bold small mb-2">
            Paso No.3 Trasvasar por medio de vacío y utilizando manguera estéril el agua del tanque auxiliar (marmita de fase acuosa) al contenedor principal del Procesador de triple efecto y vacío TFZRJ-750L-Q <em>(10)</em>, calentar hasta llegar al rango de temperatura indicado, manteniendo agitación constante.
        </p>

        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle text-center mb-2 small">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 38%;">Control de proceso</th>
                            <th style="width: 30%;">Especificación</th>
                            <th style="width: 32%;">Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Temperatura:</td>
                            <td class="fw-bold">78°C - 82°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso3][temperatura]" value="{{ $batch->val('parte2_paso3.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="78" data-max="82" placeholder="78°C - 82°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad de agitación de la propela</td>
                            <td class="fw-bold">30 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso3][velocidad_propela]" value="{{ $batch->val('parte2_paso3.velocidad_propela') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="30" data-max="30" placeholder="30 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso3_ctrl_realizo', 'type' => 'blue', 'label' => 'Parte II Paso 3 Calentamiento - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso3_ctrl_verifico', 'type' => 'pink', 'label' => 'Parte II Paso 3 Calentamiento - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="small fw-semibold mb-1">Registrar el inicio y terminó del calentamiento:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p2_paso3_calentamiento', 'batch' => $batch])

        @include('batches.partials.page-footer')
    </div>
</div>

{{-- PÁGINA 6/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '6/14', 'batch' => $batch])

        {{-- Parte II Paso No. 4 (Metilparabeno) --}}
        <p class="fw-bold small mb-2">
            Paso No.4 Adicionar la siguiente materia prima y mezclar durante 10 min y/o hasta que se disuelva por completo con una velocidad de agitación de 30 rpm:
        </p>

        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle mb-3 small">
                    <thead>
                        <tr class="bg-light text-center">
                            <th style="width: 24%;">Cantidad</th>
                            <th style="width: 41%;">Materia Prima</th>
                            <th style="width: 35%;">Cantidad Física (Kg ó L)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center fw-bold">0.750 kg</td>
                            <td>Metilparabeno</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso4][metilparabeno_fisica]" value="{{ $batch->val('parte2_paso4.metilparabeno_fisica') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="Ej. 0.750 kg">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso4_mp_realizo', 'type' => 'blue', 'label' => 'Paso 4 Metilparabeno MP - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso4_mp_verifico', 'type' => 'pink', 'label' => 'Paso 4 Metilparabeno MP - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p class="small fw-semibold mb-1">Registrar las condiciones del proceso</p>
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
                            <td>Tiempo de agitación</td>
                            <td class="fw-bold">10min</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso4][tiempo]" value="{{ $batch->val('parte2_paso4.tiempo') }}" class="form-control form-control-sm ebr-input text-center" placeholder="10 min">
                            </td>
                        </tr>
                        <tr>
                            <td>Temperatura:</td>
                            <td class="fw-bold">78°C - 82°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso4][temperatura]" value="{{ $batch->val('parte2_paso4.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="78" data-max="82" placeholder="78°C - 82°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad de agitación de la propela</td>
                            <td class="fw-bold">30 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso4][velocidad]" value="{{ $batch->val('parte2_paso4.velocidad') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="30" data-max="30" placeholder="30 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso4_ctrl_realizo', 'type' => 'blue', 'label' => 'Paso 4 Metilparabeno Ctrl - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso4_ctrl_verifico', 'type' => 'pink', 'label' => 'Paso 4 Metilparabeno Ctrl - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="small fw-semibold mb-1">Registrar el inicio y terminó de la actividad:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p2_paso4_actividad', 'batch' => $batch])

        {{-- Parte II Paso No. 5 (Propilparabeno) --}}
        <p class="fw-bold small mb-2 mt-3">
            Paso No. 5 Adicionar la siguiente materia prima y mezclar durante 10 min y/o hasta que se disuelva por completo con una velocidad de agitación de 30 rpm:
        </p>

        <div class="row justify-content-center mb-2">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle mb-3 small">
                    <thead>
                        <tr class="bg-light text-center">
                            <th style="width: 24%;">Cantidad Teórica</th>
                            <th style="width: 41%;">Materia Prima</th>
                            <th style="width: 35%;">Cantidad Física (Kg ó L)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center fw-bold">0.250 kg</td>
                            <td>Propilparabeno</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso5][propilparabeno_fisica]" value="{{ $batch->val('parte2_paso5.propilparabeno_fisica') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="Ej. 0.250 kg">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso5_mp_realizo', 'type' => 'blue', 'label' => 'Paso 5 Propilparabeno MP - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso5_mp_verifico', 'type' => 'pink', 'label' => 'Paso 5 Propilparabeno MP - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p class="small fw-semibold mb-1">Registrar las condiciones del proceso</p>
                <table class="table table-bordered ebr-table align-middle text-center mb-2 small">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 38%;">Control de proceso</th>
                            <th style="width: 30%;">Especificación</th>
                            <th style="width: 32%;">Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiempo de agitación</td>
                            <td class="fw-bold">10min</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso5][tiempo]" value="{{ $batch->val('parte2_paso5.tiempo') }}" class="form-control form-control-sm ebr-input text-center" placeholder="10 min">
                            </td>
                        </tr>
                        <tr>
                            <td>Temperatura:</td>
                            <td class="fw-bold">78°C - 82°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso5][temperatura]" value="{{ $batch->val('parte2_paso5.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="78" data-max="82" placeholder="78°C - 82°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad de agitación de la propela</td>
                            <td class="fw-bold">30 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso5][velocidad]" value="{{ $batch->val('parte2_paso5.velocidad') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="30" data-max="30" placeholder="30 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso5_ctrl_realizo', 'type' => 'blue', 'label' => 'Paso 5 Propilparabeno Ctrl - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso5_ctrl_verifico', 'type' => 'pink', 'label' => 'Paso 5 Propilparabeno Ctrl - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @include('batches.partials.page-footer')
    </div>
</div>

{{-- PÁGINA 7/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '7/14', 'batch' => $batch])

        <p class="small fw-semibold mb-1">Registrar el inicio y terminó de la actividad:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p2_paso5_actividad', 'batch' => $batch])

        {{-- Parte II Paso No. 6 (Enfriamiento a 43°C - 47°C) --}}
        <p class="fw-bold small mb-2 mt-3">
            Paso No. 6 Una vez disueltos los parabenos dejar enfriar la solución a una temperatura de 43°C – 47°C con agitación constante.
        </p>

        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle text-center mb-2 small">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 38%;">Control de proceso</th>
                            <th style="width: 30%;">Especificación</th>
                            <th style="width: 32%;">Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Temperatura:</td>
                            <td class="fw-bold">43°C - 47°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso6][temperatura]" value="{{ $batch->val('parte2_paso6.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="43" data-max="47" placeholder="43°C - 47°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad de agitación de la propela</td>
                            <td class="fw-bold">30 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso6][velocidad]" value="{{ $batch->val('parte2_paso6.velocidad') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="30" data-max="30" placeholder="30 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso6_ctrl_realizo', 'type' => 'blue', 'label' => 'Paso 6 Enfriamiento Ctrl - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso6_ctrl_verifico', 'type' => 'pink', 'label' => 'Paso 6 Enfriamiento Ctrl - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="small fw-semibold mb-1">Registrar el tiempo de enfriamiento:</p>
        @include('batches.partials.time-block', [
            'blockKey' => 'p2_paso6_enfriamiento',
            'titleLeft' => 'Inicio de Enfriamiento',
            'titleRight' => 'Término de Enfriamiento',
            'batch' => $batch,
        ])

        {{-- Parte II Paso No. 7 (Citrato de Sodio Dihidratado) --}}
        <p class="fw-bold small mb-2 mt-3">
            Paso No. 7 Adicionar la siguiente materia prima y mezclar durante 10 min con una velocidad de agitación de 30 rpm:
        </p>

        <div class="row justify-content-center mb-2">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle mb-3 small">
                    <thead>
                        <tr class="bg-light text-center">
                            <th style="width: 24%;">Cantidad Teórica</th>
                            <th style="width: 41%;">Materia Prima</th>
                            <th style="width: 35%;">Cantidad Física (Kg ó L)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center fw-bold">1.300 kg</td>
                            <td>Citrato de Sodio Dihidratado</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso7][citrato_fisica]" value="{{ $batch->val('parte2_paso7.citrato_fisica') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="Ej. 1.300 kg">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso7_mp_realizo', 'type' => 'blue', 'label' => 'Paso 7 Citrato MP - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso7_mp_verifico', 'type' => 'pink', 'label' => 'Paso 7 Citrato MP - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p class="small fw-semibold mb-1">Registrar las condiciones de proceso</p>
                <table class="table table-bordered ebr-table align-middle text-center mb-2 small">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 38%;">Control de proceso</th>
                            <th style="width: 30%;">Especificación</th>
                            <th style="width: 32%;">Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiempo de agitación</td>
                            <td class="fw-bold">10min</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso7][tiempo]" value="{{ $batch->val('parte2_paso7.tiempo') }}" class="form-control form-control-sm ebr-input text-center" placeholder="10 min">
                            </td>
                        </tr>
                        <tr>
                            <td>Temperatura:</td>
                            <td class="fw-bold">43°C - 47°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso7][temperatura]" value="{{ $batch->val('parte2_paso7.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="43" data-max="47" placeholder="43°C - 47°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad de agitación de la propela</td>
                            <td class="fw-bold">30 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte2_paso7][velocidad]" value="{{ $batch->val('parte2_paso7.velocidad') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="30" data-max="30" placeholder="30 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso7_ctrl_realizo', 'type' => 'blue', 'label' => 'Paso 7 Citrato Ctrl - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p2_paso7_ctrl_verifico', 'type' => 'pink', 'label' => 'Paso 7 Citrato Ctrl - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @include('batches.partials.page-footer')
    </div>
</div>
