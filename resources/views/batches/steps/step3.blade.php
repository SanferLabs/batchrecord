{{-- PASO 3 DEL ASISTENTE: PÁGINA 3/14 y PÁGINA 4/14 (Parte I: Pasos 3, 4, 5 y 6 + Inicio Parte II) --}}

{{-- PÁGINA 3/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '3/14', 'batch' => $batch])

        <p class="small mb-2">
            <strong>NOTA:</strong> Antes de iniciar el proceso de fabricación se debe verificar que se cuente con iluminación amarilla del área, en caso necesario, solicitar el cambio de iluminación antes de iniciar cualquier actividad relacionada con la fabricación.
        </p>

        <p class="fw-bold small mb-2">Paso No. 3 Registre el inicio y final de todo el proceso de fabricación:</p>

        @include('batches.partials.time-block', ['blockKey' => 'p1_paso3_bloque1', 'batch' => $batch])
        @include('batches.partials.time-block', ['blockKey' => 'p1_paso3_bloque2', 'batch' => $batch])

        <p class="fw-bold small mb-2 mt-3">
            Paso No. 4 Registrar los datos de temperatura, humedad y presión diferencial al inicio, medio y final del proceso por turno si aplica. <em>(11)</em>
        </p>

        @php
            $etapasTurno = [
                1 => 'Inicio de Turno',
                2 => 'Mitad de Turno',
                3 => 'Final de Turno',
                4 => 'Inicio de Turno',
                5 => 'Mitad de Turno',
                6 => 'Final de Turno',
            ];
        @endphp

        <div class="table-responsive">
            <table class="table table-bordered ebr-table align-middle text-center mb-2 small">
                <thead>
                    <tr class="bg-light">
                        <th style="width: 13%;">Etapa</th>
                        <th style="width: 10%;">Hora</th>
                        <th style="width: 13%;">Fecha</th>
                        <th style="width: 11%;">Humedad relativa<br>30 - 65%</th>
                        <th style="width: 11%;">Temperatura<br>18 – 25 °C</th>
                        <th style="width: 16%;">Presión diferencial entre áreas en proceso y áreas adyacentes<br>≥ 0.025 in H₂O (6Pa)</th>
                        <th style="width: 13%;">Realizó</th>
                        <th style="width: 13%;">Verificó</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etapasTurno as $idx => $etapaLabel)
                        <tr>
                            <td class="fw-semibold">{{ $etapaLabel }}</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="time" name="payload[parte1_paso4][fila_{{ $idx }}][hora]" value="{{ $batch->val("parte1_paso4.fila_{$idx}.hora") }}" class="form-control form-control-sm ebr-input text-center">
                            </td>
                            <td class="ebr-cell-blue p-1">
                                <input type="date" name="payload[parte1_paso4][fila_{{ $idx }}][fecha]" value="{{ $batch->val("parte1_paso4.fila_{$idx}.fecha") }}" class="form-control form-control-sm ebr-input text-center">
                            </td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text"
                                       name="payload[parte1_paso4][fila_{{ $idx }}][humedad]"
                                       value="{{ $batch->val("parte1_paso4.fila_{$idx}.humedad") }}"
                                       class="form-control form-control-sm ebr-input text-center ebr-range-check"
                                       data-min="30" data-max="65"
                                       placeholder="30-65%">
                            </td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text"
                                       name="payload[parte1_paso4][fila_{{ $idx }}][temperatura]"
                                       value="{{ $batch->val("parte1_paso4.fila_{$idx}.temperatura") }}"
                                       class="form-control form-control-sm ebr-input text-center ebr-range-check"
                                       data-min="18" data-max="25"
                                       placeholder="18-25°C">
                            </td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text"
                                       name="payload[parte1_paso4][fila_{{ $idx }}][presion]"
                                       value="{{ $batch->val("parte1_paso4.fila_{$idx}.presion") }}"
                                       class="form-control form-control-sm ebr-input text-center ebr-range-check"
                                       data-min="0.025" data-max="999"
                                       placeholder="≥ 0.025">
                            </td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', [
                                    'sigKey' => "p1_paso4_fila_{$idx}_realizo",
                                    'type' => 'blue',
                                    'label' => "Monitoreo Fila {$idx} ({$etapaLabel}) - Realizó",
                                    'batch' => $batch,
                                    'compact' => true,
                                ])
                            </td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', [
                                    'sigKey' => "p1_paso4_fila_{$idx}_verifico",
                                    'type' => 'pink',
                                    'label' => "Monitoreo Fila {$idx} ({$etapaLabel}) - Verificó",
                                    'batch' => $batch,
                                    'compact' => true,
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('batches.partials.page-footer')
    </div>
</div>

{{-- PÁGINA 4/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '4/14', 'batch' => $batch])

        {{-- Paso No. 5 --}}
        <p class="fw-bold small mb-2">Paso No. 5 Registrar los datos del producto anterior procesado:</p>

        <table class="table table-bordered ebr-table align-middle text-center mb-3 small">
            <thead>
                <tr class="bg-light">
                    <th style="width: 22%;">Identificación del área</th>
                    <th style="width: 38%;">Producto anterior procesado</th>
                    <th style="width: 20%;">Lote</th>
                    <th style="width: 20%;">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="ebr-cell-blue p-1">
                        @php
                            $areaPaso5 = $batch->val('parte1_paso5.area');
                            if ($areaPaso5 === 'FL-03' && empty($batch->val('parte1_paso5.producto_anterior'))) {
                                $areaPaso5 = '';
                            }
                        @endphp
                        <input type="text" name="payload[parte1_paso5][area]" value="{{ $areaPaso5 }}" class="form-control form-control-sm ebr-input text-center fw-semibold" placeholder="Identificación del área">
                    </td>
                    <td class="ebr-cell-blue p-1">
                        <input type="text" name="payload[parte1_paso5][producto_anterior]" value="{{ $batch->val('parte1_paso5.producto_anterior') }}" class="form-control form-control-sm ebr-input text-center" placeholder="Nombre del producto anterior">
                    </td>
                    <td class="ebr-cell-blue p-1">
                        <input type="text" name="payload[parte1_paso5][lote]" value="{{ $batch->val('parte1_paso5.lote') }}" class="form-control form-control-sm ebr-input text-center" placeholder="Lote anterior">
                    </td>
                    <td class="ebr-cell-blue p-1">
                        <input type="date" name="payload[parte1_paso5][fecha]" value="{{ $batch->val('parte1_paso5.fecha') }}" class="form-control form-control-sm ebr-input text-center">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                    <td colspan="2" class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p1_paso5_realizo', 'type' => 'blue', 'label' => 'Paso 5 Producto Anterior - Realizó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                    <td colspan="2" class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p1_paso5_verifico', 'type' => 'pink', 'label' => 'Paso 5 Producto Anterior - Verificó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Paso No. 6 --}}
        <p class="fw-bold small mb-2">
            Paso No. 6 Verificación de las materias primas. Verificar que las materias primas así como las boletas correspondan a los de la orden de producción:
            <button type="button" class="btn btn-xs btn-outline-primary py-0 px-2 ms-2 d-print-none" style="font-size: 0.72rem;" onclick="copyTheoreticalWeightsToPhysical()">
                <i class="bi bi-magic me-1"></i>Copiar cantidades teóricas a físicas
            </button>
        </p>

        @php
            $excipientesPaso6 = [
                1 => ['teorica' => '1.250 kg',    'nombre' => 'Vitamina E'],
                2 => ['teorica' => '2500.000 g',  'nombre' => 'Extracto de Aloe Vera'],
                3 => ['teorica' => '0.750 kg',    'nombre' => 'Metilparabeno'],
                4 => ['teorica' => '0.250 kg',    'nombre' => 'Propilparabeno'],
                5 => ['teorica' => '30.000 kg',   'nombre' => 'Polisorbato 20'],
                6 => ['teorica' => '1.300 kg',    'nombre' => 'Citrato de Sodio Dihidratado'],
                7 => ['teorica' => '7.500 kg',    'nombre' => 'Hidroxietilcelulosa'],
                8 => ['teorica' => '500.000 L',   'nombre' => 'Agua Purificada cbp'],
                9 => ['teorica' => '0.052 MR',    'nombre' => 'Bol Cal 300 70X100'],
                10 => ['teorica' => '0.005 MR',   'nombre' => 'Bol Cal 300 110X140'],
            ];
        @endphp

        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle mb-0 small">
                    <thead>
                        <tr class="bg-light text-center">
                            <th style="width: 24%;">Cantidad Teórica</th>
                            <th style="width: 41%;">Materia Prima</th>
                            <th style="width: 35%;">Cantidad Física (Kg ó L)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center fw-semibold">3.750 kg</td>
                            <td class="fw-semibold">Clorhidrato de isotipendilo</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte1_paso6][activo_fisica]" value="{{ $batch->val('parte1_paso6.activo_fisica') }}" data-theoretical="3.750 kg" class="form-control form-control-sm ebr-input text-center fw-semibold mp-fisica-input" placeholder="Cantidad física">
                            </td>
                        </tr>
                        <tr class="bg-light text-center fw-bold">
                            <td colspan="3">Excipientes</td>
                        </tr>
                        @foreach($excipientesPaso6 as $idx => $mp)
                            <tr>
                                <td class="text-center">{{ $mp['teorica'] }}</td>
                                <td>{{ $mp['nombre'] }}</td>
                                <td class="ebr-cell-blue p-1">
                                    <input type="text" name="payload[parte1_paso6][excipiente_{{ $idx }}_fisica]" value="{{ $batch->val("parte1_paso6.excipiente_{$idx}_fisica") }}" data-theoretical="{{ $mp['teorica'] }}" class="form-control form-control-sm ebr-input text-center fw-semibold mp-fisica-input" placeholder="Cantidad física">
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p1_paso6_mp_realizo', 'type' => 'blue', 'label' => 'Paso 6 Materias Primas - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p1_paso6_mp_verifico', 'type' => 'pink', 'label' => 'Paso 6 Materias Primas - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PARTE II Preparación de la fase I (Nota al pie de la página 4) --}}
        <h6 class="fw-bold text-uppercase mt-3 mb-1">PARTE II Preparación de la fase I</h6>
        <p class="small mb-2">
            <strong>NOTA.-</strong> Antes de iniciar con la preparación de la FASE I se deberá realizar un enjuague de seguridad del tanque auxiliar (marmita de fase acuosa).<br>
            Adicionar al tanque auxiliar (marmita de fase acuosa) <u>&nbsp;50 L&nbsp;</u> de agua purificada para enjuague de las paredes y la flecha, desechar esta agua utilizando exclusivamente mangueras limpias previamente esterilizadas. Los accesorios a utilizar para este enjuague así como la indumentaria necesaria (guantes nuevos) deberán estar limpios y debidamente sanitizados.
        </p>

        <table class="table table-bordered ebr-table align-middle mb-2 small">
            <tbody>
                <tr>
                    <td class="text-end fw-bold" style="width: 68%;">Toma de agua</td>
                    <td class="ebr-cell-blue p-1" style="width: 32%;">
                        <input type="text" name="payload[parte2_enjuague][toma_agua]" value="{{ $batch->val('parte2_enjuague.toma_agua') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="No. de toma de agua">
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p2_enjuague_realizo', 'type' => 'blue', 'label' => 'Parte II Enjuague 50L - Realizó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p2_enjuague_verifico', 'type' => 'pink', 'label' => 'Parte II Enjuague 50L - Verificó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
            </tbody>
        </table>

        @include('batches.partials.page-footer')
    </div>
</div>
