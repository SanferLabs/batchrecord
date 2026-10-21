{{-- PASO 7 DEL ASISTENTE: PÁGINAS 12/14, 13/14 y 14/14 (Parte V: Descargo, Contenedores, Control de Rendimiento, Desviaciones y Anexos) --}}

{{-- PÁGINA 12/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '12/14', 'batch' => $batch])

        <p class="fw-bold small mb-2">
            Paso No. 2 Verificar que la temperatura del producto la cual deberá de estar entre 25°C – 35°C. Registrar los siguientes parámetros
        </p>

        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle text-center mb-3 small">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 38%;">Parámetro</th>
                            <th style="width: 30%;">Especificación</th>
                            <th style="width: 32%;">Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Temperatura</td>
                            <td class="fw-bold">25°C - 35°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte5_paso2][temperatura]" value="{{ $batch->val('parte5_paso2.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="25" data-max="35" placeholder="25°C - 35°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad de agitación de propela</td>
                            <td class="fw-bold">20 rpm - 25 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte5_paso2][velocidad_propela]" value="{{ $batch->val('parte5_paso2.velocidad_propela') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="20" data-max="25" placeholder="20 - 25 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p5_paso2_param_realizo', 'type' => 'blue', 'label' => 'Parte V Paso 2 Parámetros - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p5_paso2_param_verifico', 'type' => 'pink', 'label' => 'Parte V Paso 2 Parámetros - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="small mb-2">
            <strong>Nota.</strong> Una vez que el granel contenido en el tanque es poco, abrir la tapa y con la ayuda de una pala limpia y sanitizada ayudar a la descarga raspando las superficies interiores del tanque y del agitador.
        </p>

        <table class="table table-bordered ebr-table align-middle mb-3 small">
            <tbody>
                <tr>
                    <td class="text-end fw-bold" style="width: 68%;">Realizó: Antefirma y Fecha</td>
                    <td class="p-0" style="width: 32%;">
                        @include('batches.partials.sig-box', ['sigKey' => 'p5_paso2_raspado_realizo', 'type' => 'blue', 'label' => 'Parte V Nota Raspado - Realizó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p5_paso2_raspado_verifico', 'type' => 'pink', 'label' => 'Parte V Nota Raspado - Verificó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="small mb-3 lh-sm">
            <div><strong>2.1</strong> Encender la bomba de descarga y abrir la válvula de descargo.</div>
            <div><strong>2.2</strong> Realizar una purga de las líneas antes de iniciar el descargo de aproximadamente 2-3 kg de producto, colocarlo en una bolsa identificada, este granel será desechado.</div>
            <div><strong>2.3 Recibir el producto a granel en bolsa (Bol Cal 300 110X140) previamente sanitizada por sus caras externas, dentro de contenedores de acero inoxidable y capacidad adecuada, la manipulación de dicha bolsa deberá ser estrictamente con guantes nuevos y sanitizados, posterior a su descargo cerrar perfectamente la bolsa y resguardar de la luz.</strong></div>
            <div><strong>2.4</strong> Antes de finalizar el descargo, llevar a cabo un raspado en las superficies de propelas, aspas y paredes del tanque de Procesador de triple efecto y vacío con la finalidad de extraer la mayor cantidad de producto, todos los utensilios a utilizar para esta actividad deberán estar perfectamente sanitizados con alcohol etílico al 70%.</div>
            <div><strong>2.5</strong> Cerrar las bolsas perfectamente para trasladar los contenedores al área de llenado.</div>
        </div>

        {{-- Tabla de Contenedores (1 al 5) con cálculo automático Bruto - Tara = Neto --}}
        <table class="table table-bordered ebr-table align-middle text-center mb-4 small">
            <thead>
                <tr class="bg-light">
                    <th style="width: 16%;">CONTENEDOR</th>
                    <th style="width: 28%;">BRUTO (Kg)</th>
                    <th style="width: 28%;">TARA (Kg)</th>
                    <th style="width: 28%;">NETO (Kg)</th>
                </tr>
            </thead>
            <tbody>
                @for($c = 1; $c <= 5; $c++)
                    <tr>
                        <td class="fw-bold">{{ $c }}</td>
                        <td class="ebr-cell-blue p-1">
                            <input type="number" step="any"
                                   id="cont_{{ $c }}_bruto"
                                   name="payload[contenedores][{{ $c }}][bruto]"
                                   value="{{ $batch->val("contenedores.{$c}.bruto") }}"
                                   class="form-control form-control-sm ebr-input text-center fw-semibold"
                                   placeholder="0.000"
                                   oninput="recalculateContainersAndYield()"
                                   onkeyup="recalculateContainersAndYield()"
                                   onchange="recalculateContainersAndYield()">
                        </td>
                        <td class="ebr-cell-blue p-1">
                            <input type="number" step="any"
                                   id="cont_{{ $c }}_tara"
                                   name="payload[contenedores][{{ $c }}][tara]"
                                   value="{{ $batch->val("contenedores.{$c}.tara") }}"
                                   class="form-control form-control-sm ebr-input text-center fw-semibold"
                                   placeholder="0.000"
                                   oninput="recalculateContainersAndYield()"
                                   onkeyup="recalculateContainersAndYield()"
                                   onchange="recalculateContainersAndYield()">
                        </td>
                        <td class="ebr-cell-blue p-1">
                            <input type="number" step="any"
                                   id="cont_{{ $c }}_neto"
                                   name="payload[contenedores][{{ $c }}][neto]"
                                   value="{{ $batch->val("contenedores.{$c}.neto") }}"
                                   class="form-control form-control-sm ebr-input text-center fw-bold"
                                   placeholder="0.000"
                                   readonly>
                        </td>
                    </tr>
                @endfor
                <tr>
                    <td colspan="2" class="border-0 bg-white"></td>
                    <td class="fw-bold bg-light">TOTAL</td>
                    <td class="ebr-cell-blue p-1">
                        <input type="number" step="0.001"
                               id="cont_total_neto"
                               name="payload[contenedores][total_neto]"
                               value="{{ $batch->val('contenedores.total_neto') }}"
                               class="form-control form-control-sm ebr-input text-center fw-bold fs-6"
                               placeholder="0.000"
                               readonly>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- CONTROL DEL RENDIMIENTO --}}
        @php
            $defaultTeorico = preg_replace('/[^0-9.]/', '', (string) ($batch->tamano_lote ?? '500.000'));
            if ($defaultTeorico === '' || !is_numeric($defaultTeorico)) {
                $defaultTeorico = '500.000';
            } else {
                $defaultTeorico = number_format((float) $defaultTeorico, 3, '.', '');
            }
            $valPesoObtenido1 = $batch->val('rendimiento.peso_obtenido');
            $valPesoMuestras2 = $batch->val('rendimiento.peso_muestras', '0.000');
            $valPesoTeorico3  = $batch->val('rendimiento.peso_teorico', $defaultTeorico);
        @endphp
        <h6 class="fw-bold text-uppercase mb-2">CONTROL DEL RENDIMIENTO</h6>
        <div class="border border-dark p-3 mb-2">
            <div class="row align-items-center text-center g-2 mb-3 small">
                <div class="col-md-2 fw-bold">
                    RENDIMIENTO =
                </div>
                <div class="col-md-3">
                    <div class="border-bottom border-dark pb-1 fw-semibold">Peso Neto (Kg)</div>
                    <div class="pt-1 fw-semibold">Peso Teórico ( Kg )</div>
                </div>
                <div class="col-md-1 fw-bold">
                    X 100 =
                </div>
                <div class="col-md-2">
                    <div class="border-bottom border-dark pb-1 fw-bold">
                        1 + 2
                        <div class="text-primary fw-normal" style="font-size: 0.72rem;">
                            (<span id="formula_live_1">{{ $valPesoObtenido1 !== '' ? $valPesoObtenido1 : '0.000' }}</span> + <span id="formula_live_2">{{ $valPesoMuestras2 !== '' ? $valPesoMuestras2 : '0.000' }}</span>)
                        </div>
                    </div>
                    <div class="pt-1 fw-bold">
                        3
                        <div class="text-primary fw-normal" style="font-size: 0.72rem;">
                            (<span id="formula_live_3">{{ $valPesoTeorico3 !== '' ? $valPesoTeorico3 : $defaultTeorico }}</span>)
                        </div>
                    </div>
                </div>
                <div class="col-md-1 fw-bold">
                    X 100 =
                </div>
                <div class="col-md-3">
                    <div class="input-group input-group-sm ebr-cell-blue p-1 rounded">
                        <input type="number" step="any"
                               id="rendimiento_porcentaje_final"
                               name="payload[rendimiento][porcentaje_final]"
                               value="{{ $batch->val('rendimiento.porcentaje_final') }}"
                               class="form-control ebr-input text-center fw-bold fs-6 ebr-range-check"
                               data-min="90.00" data-max="101.00"
                               placeholder="0.00"
                               readonly>
                        <span class="input-group-text fw-bold bg-transparent border-0">%</span>
                    </div>
                </div>
            </div>

            <div class="text-center fw-bold small mb-2">
                Límites: &nbsp;&nbsp; Máximo: 101.00% &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Límites: Mínimo: 90.00%
            </div>
            <div class="text-center small text-decoration-underline mb-3">
                Justifique un rendimiento mayor o menor de los límites establecidos elaborando una desviación.
            </div>

            <table class="table table-bordered ebr-table align-middle mb-0 small">
                <tbody>
                    <tr>
                        <td class="text-end fw-bold" style="width: 60%;">Realizó: Antefirma y Fecha</td>
                        <td class="p-0" style="width: 40%;">
                            @include('batches.partials.sig-box', ['sigKey' => 'p5_rendimiento_formula_realizo', 'type' => 'blue', 'label' => 'Control del Rendimiento (Pág 12) - Realizó', 'batch' => $batch, 'compact' => true])
                        </td>
                    </tr>
                    <tr>
                        <td class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                        <td class="p-0">
                            @include('batches.partials.sig-box', ['sigKey' => 'p5_rendimiento_formula_verifico', 'type' => 'pink', 'label' => 'Control del Rendimiento (Pág 12) - Verificó', 'batch' => $batch, 'compact' => true])
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @include('batches.partials.page-footer')
    </div>
</div>

{{-- PÁGINA 13/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '13/14', 'batch' => $batch])

        <table class="table table-bordered ebr-table align-middle mb-4 small">
            <tbody>
                <tr>
                    <td class="text-center fw-bold" style="width: 6%;">1</td>
                    <td style="width: 58%;">Peso obtenido para la siguiente etapa (llenado):</td>
                    <td class="ebr-cell-blue p-1" style="width: 36%;">
                        <input type="number" step="any"
                               id="rend_peso_obtenido_1"
                               name="payload[rendimiento][peso_obtenido]"
                               value="{{ $valPesoObtenido1 }}"
                               class="form-control form-control-sm ebr-input text-center fw-bold"
                               placeholder="Kg obtenidos (Total Neto)"
                               oninput="recalculateYieldFromVariables()"
                               onchange="recalculateYieldFromVariables()"
                               onkeyup="recalculateYieldFromVariables()">
                    </td>
                </tr>
                <tr>
                    <td class="text-center fw-bold">2</td>
                    <td>Peso de muestras para pruebas:</td>
                    <td class="ebr-cell-blue p-1">
                        <input type="number" step="any"
                               id="rend_peso_muestras_2"
                               name="payload[rendimiento][peso_muestras]"
                               value="{{ $valPesoMuestras2 }}"
                               class="form-control form-control-sm ebr-input text-center fw-semibold"
                               placeholder="0.000"
                               oninput="recalculateYieldFromVariables()"
                               onchange="recalculateYieldFromVariables()"
                               onkeyup="recalculateYieldFromVariables()">
                    </td>
                </tr>
                <tr>
                    <td class="text-center fw-bold">3</td>
                    <td>Peso teórico:</td>
                    <td class="ebr-cell-blue p-1">
                        <input type="number" step="any"
                               id="rend_peso_teorico_3"
                               name="payload[rendimiento][peso_teorico]"
                               value="{{ $valPesoTeorico3 }}"
                               class="form-control form-control-sm ebr-input text-center fw-bold"
                               placeholder="{{ $defaultTeorico }}"
                               oninput="recalculateYieldFromVariables()"
                               onchange="recalculateYieldFromVariables()"
                               onkeyup="recalculateYieldFromVariables()">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p5_rendimiento_pesos_realizo', 'type' => 'blue', 'label' => 'Pesos Rendimiento (Pág 13) - Realizó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p5_rendimiento_pesos_verifico', 'type' => 'pink', 'label' => 'Pesos Rendimiento (Pág 13) - Verificó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Desviaciones --}}
        <div class="mb-4 small">
            <div class="d-flex flex-wrap align-items-center gap-3 mb-2">
                <span class="fw-bold">Se tuvo alguna desviación durante el proceso de acondicionamiento del producto:</span>
                <div class="form-check form-check-inline">
                    <input class="form-check-input border-dark" type="radio" name="payload[desviacion][tuvo_desviacion]" id="desv_si" value="SI" @checked($batch->val('desviacion.tuvo_desviacion') === 'SI')>
                    <label class="form-check-label fw-bold" for="desv_si">SI</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input border-dark" type="radio" name="payload[desviacion][tuvo_desviacion]" id="desv_no" value="NO" @checked($batch->val('desviacion.tuvo_desviacion', 'NO') === 'NO')>
                    <label class="form-check-label fw-bold" for="desv_no">NO</label>
                </div>
            </div>
            <label class="form-label fw-semibold mb-1">Describa brevemente y anote el número de la misma:</label>
            <textarea name="payload[desviacion][descripcion]" rows="2" class="form-control form-control-sm border-dark" placeholder="En caso afirmativo, anote el folio de la desviación y una breve descripción...">{{ $batch->val('desviacion.descripcion') }}</textarea>
        </div>

        {{-- III. REFERENCIAS --}}
        <div class="mb-3 small">
            <h6 class="fw-bold text-uppercase mb-2">III. &nbsp;&nbsp;&nbsp; REFERENCIAS</h6>
            <div class="row g-1" style="font-size: 0.78rem;">
                <div class="col-12">1) &nbsp; <strong>3.PF.0278</strong> &nbsp;&nbsp;&nbsp; Procedimiento de vestido para el ingreso y egreso de personal que labora en la planta farmacéuticos</div>
                <div class="col-12">2) &nbsp; <strong>1.GE.0824</strong> &nbsp;&nbsp;&nbsp; Manejo de Desviaciones</div>
                <div class="col-12">3) &nbsp; <strong>PRG.002</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Controles en Proceso</div>
                <div class="col-12">4) &nbsp; <strong>1.GE.1016</strong> &nbsp;&nbsp;&nbsp; Procedimiento de Acciones a tomar cuando un sistema crítico falle</div>
                <div class="col-12">5) &nbsp; <strong>PRG.008</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Despeje y preparación de área</div>
                <div class="col-12">6) &nbsp; <strong>3.PF.0664</strong> &nbsp;&nbsp;&nbsp; Identificación de áreas y equipos</div>
                <div class="col-12">7) &nbsp; <strong>PRF.015</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Limpieza de áreas, accesorios y equipos de fabricación Planta Farmacéuticos</div>
                <div class="col-12">8) &nbsp; <strong>2.PF.0226</strong> &nbsp;&nbsp;&nbsp; Procedimiento de recepción de órdenes de fabricación</div>
                <div class="col-12">9) &nbsp; <strong>4.PF.0282</strong> &nbsp;&nbsp;&nbsp; Procedimiento de limpieza de procesador de Triple efecto y Vacío TFZRJ-750L-Q</div>
                <div class="col-12">10) <strong>4.PF.0360</strong> &nbsp;&nbsp;&nbsp; Procedimiento de operación para Procesador de Triple efecto y Vacío TFZRJ-750L-Q</div>
                <div class="col-12">11) <strong>3.GE.0616</strong> &nbsp;&nbsp;&nbsp; Monitoreo y registro de temperatura, humedad relativa y presión diferencial</div>
                <div class="col-12">12) <strong>4.PF.0415</strong> &nbsp;&nbsp;&nbsp; Operación del potenciómetro Mettler Toledo</div>
                <div class="col-12">13) <strong>C 1.EC.0203</strong> &nbsp; Manejo Integral de residuos</div>
                <div class="col-12">14) <strong>GEN.018</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Elaboración y control de procedimientos de fabricación</div>
            </div>
        </div>

        {{-- IV. BIBLIOGRAFÍA --}}
        <div class="mb-3 small">
            <h6 class="fw-bold text-uppercase mb-1">IV. &nbsp;&nbsp;&nbsp; BIBLIOGRAFÍA</h6>
            <div>NORMA Oficial Mexicana NOM-059-SSA1-2015, Buenas prácticas de fabricación de medicamentos.</div>
        </div>

        {{-- V. REPORTES Y MUESTRAS --}}
        <div class="mb-3 small">
            <h6 class="fw-bold text-uppercase mb-1">V. &nbsp;&nbsp;&nbsp; REPORTES Y MUESTRAS</h6>
            <div>1 ) Boletas de identificación de materias primas</div>
            <div>2 ) Ticket o boletas de esterilización de mangueras</div>
        </div>

        @include('batches.partials.page-footer')
    </div>
</div>

{{-- PÁGINA 14/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '14/14', 'batch' => $batch])

        {{-- ANEXO 1: BOLETAS DE IDENTIFICACIÓN DE MATERIAS PRIMAS --}}
        <div class="pt-4 mb-4" style="min-height: 360px;">
            <h6 class="fw-bold text-center text-uppercase mb-0">1 ) BOLETAS DE IDENTIFICACIÓN DE MATERIAS PRIMAS</h6>
        </div>

        {{-- ANEXO 2: TICKET O BOLETAS DE ESTERILIZACIÓN DE MANGUERAS --}}
        <div class="pt-3 mb-3" style="min-height: 360px;">
            <h6 class="fw-bold text-center text-uppercase mb-0">2 ) TICKET O BOLETAS DE ESTERILIZACIÓN DE MANGUERAS</h6>
        </div>

        @include('batches.partials.page-footer')
    </div>
</div>
