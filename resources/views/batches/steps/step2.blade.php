{{-- PASO 2 DEL ASISTENTE: PÁGINA 2/14 y PÁGINA 3/14 (Parte I: Pasos 1, 2 y 3) --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '2/14', 'batch' => $batch])

        {{-- Cuadro de Precauciones y Referencias --}}
        <table class="table table-bordered ebr-table mb-3 small">
            <tbody>
                <tr>
                    <td style="width: 82%; font-size: 0.74rem;" class="lh-sm">
                        <div class="text-decoration-underline fw-bold mb-1">Precauciones:</div>
                        <ol class="mb-0 ps-3">
                            <li>Usar la indumentaria adecuada, limpia para el proceso de fabricación: uniforme, lentes de seguridad, guantes, cofia <strong>(1)</strong>.</li>
                            <li>En caso de utilizar indumentaria desechable, esta deberá ser estrictamente nueva, no de rehuso: Cofia, cubrebocas, guantes, zapatones, tyvek.</li>
                            <li>Verificar que los empaques de las materias primas estén identificados conforme a la orden de producción y cerrados.<strong>(8)</strong></li>
                            <li>En caso de que el proceso esté fuera de lo establecido en el procedimiento reportarlo con el supervisor de producción antes de continuar con el proceso y tomar las medidas correctivas a través del formato de desviaciones <strong>(2); (3); (4); (5)</strong>.</li>
                            <li>Se debe verificar que el área de fabricación tenga iluminación amarilla, en caso necesario solicitar el cambio de iluminación, antes de iniciar con cualquier actividad relacionada con la fabricación.</li>
                            <li>La limpieza del equipo "procesador de triple efecto y vacío TFZRJ-750L-Q" deberá ser no mayor a 12 horas previas a la fabricación de un lote por lo que se deberá anexar al expediente copia de la bitácora del equipo donde se indique la fecha y hora en que se realizó la limpieza del mismo.</li>
                            <li>Cuando se trate de una campaña de fabricación, se deberá realizar limpieza profunda entre cada lote del contenedor principal, tanque auxiliar (marmita de fase acuosa), bomba y líneas de descargo. A su vez se deberá solicitar monitoreo microbiológico al finalizar cada limpieza.</li>
                            <li>En caso de exceder el tiempo establecido de 12H y no realizar fabricación se deberá realizar nuevamente la limpieza profunda del equipo.</li>
                        </ol>
                    </td>
                    <td style="width: 18%; font-size: 0.74rem;" class="lh-sm">
                        <div class="text-decoration-underline fw-bold mb-1">Referencias:</div>
                        Ver referencias al final del procedimiento<br>
                        <strong>(1); (2); (3); (4); (5); (9)</strong>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Paso No. 1 --}}
        <p class="fw-bold small mb-2">
            Paso No. 1 Indique el cumplimiento de cada actividad, colocando C=Cumple, NC=No Cumple, según sea el caso <em>(5); (6), (7)</em>
            <button type="button" class="btn btn-xs btn-outline-success py-0 px-2 ms-2 d-print-none" style="font-size: 0.72rem;" onclick="markAllCumplePaso1()">
                <i class="bi bi-check2-all me-1"></i>Marcar todos "C" (Cumple)
            </button>
        </p>

        @php
            $criteriosPaso1 = [
                1 => 'El área está libre de producto, materiales, documentos e identificaciones de lotes diferentes al que se va a procesar.',
                2 => 'Los equipos y áreas están limpios y tienen su registro correspondiente en la bitácora.',
                3 => 'El área está identificada con el nombre del producto, número de lote, operación a realizar, fecha, nombre de los operadores y tiene su registro en bitácora.',
                4 => 'Los equipos están ajustados, lubricados y calificados y está registrado en sus bitácoras como evidencia de la operación.',
                5 => 'Los sistemas críticos y servicios están funcionando: aire acondicionado, iluminación, corriente eléctrica, aire comprimido.',
            ];
        @endphp

        <table class="table table-bordered ebr-table align-middle mb-3 small">
            <tbody>
                <tr>
                    <td class="text-end fw-bold" style="width: 64%;">Fecha:</td>
                    <td class="ebr-cell-blue p-1" style="width: 18%;">
                        <input type="date" id="paso1_col1_fecha" name="payload[parte1_paso1][col1_fecha]" value="{{ $batch->val('parte1_paso1.col1_fecha') }}" class="form-control form-control-sm ebr-input text-center">
                    </td>
                    <td class="ebr-cell-blue p-1" style="width: 18%;">
                        <input type="date" id="paso1_col2_fecha" name="payload[parte1_paso1][col2_fecha]" value="{{ $batch->val('parte1_paso1.col2_fecha') }}" class="form-control form-control-sm ebr-input text-center">
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">Hora:</td>
                    <td class="ebr-cell-blue p-1">
                        <input type="time" id="paso1_col1_hora" name="payload[parte1_paso1][col1_hora]" value="{{ $batch->val('parte1_paso1.col1_hora') }}" class="form-control form-control-sm ebr-input text-center">
                    </td>
                    <td class="ebr-cell-blue p-1">
                        <input type="time" id="paso1_col2_hora" name="payload[parte1_paso1][col2_hora]" value="{{ $batch->val('parte1_paso1.col2_hora') }}" class="form-control form-control-sm ebr-input text-center">
                    </td>
                </tr>
                <tr class="text-center fw-bold bg-light">
                    <td class="text-end">Identificación del área validada :</td>
                    <td>FL-03<br>C/NC</td>
                    <td>FL-03<br>C/NC</td>
                </tr>
                @foreach($criteriosPaso1 as $idx => $textoCriterio)
                    <tr>
                        <td>{{ $textoCriterio }}</td>
                        <td class="ebr-cell-blue p-1 text-center">
                            <select name="payload[parte1_paso1][criterio_{{ $idx }}_col1]" class="form-select form-select-sm ebr-input text-center fw-bold paso1-col1-select paso1-criterio-select">
                                <option value="">—</option>
                                <option value="C" @selected($batch->val("parte1_paso1.criterio_{$idx}_col1") === 'C')>C</option>
                                <option value="NC" @selected($batch->val("parte1_paso1.criterio_{$idx}_col1") === 'NC')>NC</option>
                                <option value="NA" @selected($batch->val("parte1_paso1.criterio_{$idx}_col1") === 'NA')>NA</option>
                            </select>
                        </td>
                        <td class="ebr-cell-blue p-1 text-center">
                            <select name="payload[parte1_paso1][criterio_{{ $idx }}_col2]" class="form-select form-select-sm ebr-input text-center fw-bold paso1-col2-select paso1-criterio-select">
                                <option value="">—</option>
                                <option value="C" @selected($batch->val("parte1_paso1.criterio_{$idx}_col2") === 'C')>C</option>
                                <option value="NC" @selected($batch->val("parte1_paso1.criterio_{$idx}_col2") === 'NC')>NC</option>
                                <option value="NA" @selected($batch->val("parte1_paso1.criterio_{$idx}_col2") === 'NA')>NA</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td rowspan="2" class="text-end fw-bold align-middle">Sanitizante usado según lo indicado en el Rol de Sanitizantes:</td>
                    <td class="ebr-cell-blue p-1">
                        <label class="form-label mb-0 w-100 text-center" style="font-size: 0.7rem;">Indicar sanitizante:</label>
                        <input type="text" name="payload[parte1_paso1][sanitizante_col1]" value="{{ $batch->val('parte1_paso1.sanitizante_col1') }}" class="form-control form-control-sm ebr-input text-center" placeholder="Sanitizante">
                    </td>
                    <td class="ebr-cell-blue p-1">
                        <label class="form-label mb-0 w-100 text-center" style="font-size: 0.7rem;">Indicar sanitizante:</label>
                        <input type="text" name="payload[parte1_paso1][sanitizante_col2]" value="{{ $batch->val('parte1_paso1.sanitizante_col2') }}" class="form-control form-control-sm ebr-input text-center" placeholder="Sanitizante">
                    </td>
                </tr>
                <tr>
                    <td class="ebr-cell-blue p-1">
                        <label class="form-label mb-0 w-100 text-center" style="font-size: 0.7rem;">Lote de sanitizante:</label>
                        <input type="text" name="payload[parte1_paso1][lote_sanitizante_col1]" value="{{ $batch->val('parte1_paso1.lote_sanitizante_col1') }}" class="form-control form-control-sm ebr-input text-center" placeholder="Lote">
                    </td>
                    <td class="ebr-cell-blue p-1">
                        <label class="form-label mb-0 w-100 text-center" style="font-size: 0.7rem;">Lote de sanitizante:</label>
                        <input type="text" name="payload[parte1_paso1][lote_sanitizante_col2]" value="{{ $batch->val('parte1_paso1.lote_sanitizante_col2') }}" class="form-control form-control-sm ebr-input text-center" placeholder="Lote">
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">Realizó: Antefirma</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p1_paso1_realizo_col1', 'type' => 'blue', 'label' => 'Paso 1 Despeje Col 1 - Realizó', 'batch' => $batch, 'compact' => true])
                    </td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p1_paso1_realizo_col2', 'type' => 'blue', 'label' => 'Paso 1 Despeje Col 2 - Realizó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">Verificó: Antefirma</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p1_paso1_verifico_col1', 'type' => 'pink', 'label' => 'Paso 1 Despeje Col 1 - Verificó', 'batch' => $batch, 'compact' => true])
                    </td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p1_paso1_verifico_col2', 'type' => 'pink', 'label' => 'Paso 1 Despeje Col 2 - Verificó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Paso No. 2 --}}
        <p class="fw-bold small mb-2">Paso No. 2 Antes de iniciar el proceso de fabricación, verificar el código y la vigencia de los siguientes equipos:</p>
        @php
            $equiposPaso2 = [
                1 => ['codigo' => 'FL03-01', 'equipo' => 'PROCESADOR DE TRIPLE EFECTO Y VACIO TFZRJ-750L-Q'],
                2 => ['codigo' => '07F010-1', 'equipo' => 'BASCULA ELECTRONICA'],
                3 => ['codigo' => '22F014', 'equipo' => 'POTENCIOMETRO MARCA METTLER TOLEDO'],
                4 => ['codigo' => 'NA', 'equipo' => 'JUEGO DE MANGUERAS DEDICADAS AL PRODUCTO, ESTRICTAMENTE NUEVAS Y ESTERILIZADAS'],
                5 => ['codigo' => 'NA', 'equipo' => 'CONTENEDOR DE ACERO INOXIDABLE'],
            ];
        @endphp

        <table class="table table-bordered ebr-table align-middle mb-3 small">
            <thead>
                <tr class="bg-light text-center">
                    <th style="width: 15%;">CÓDIGO</th>
                    <th style="width: 50%;">EQUIPO</th>
                    <th style="width: 35%;">FECHA DE VIGENCIA DE CALIFICACIÓN / CALIBRACIÓN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equiposPaso2 as $idx => $eq)
                    <tr>
                        <td class="text-center fw-bold">{{ $eq['codigo'] }}</td>
                        <td>{{ $eq['equipo'] }}</td>
                        <td class="ebr-cell-blue p-1">
                            <input type="date" name="payload[parte1_paso2][equipo_{{ $idx }}_vigencia]" value="{{ $batch->val("parte1_paso2.equipo_{$idx}_vigencia") }}" class="form-control form-control-sm ebr-input text-center fw-semibold">
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p1_paso2_equipos_realizo', 'type' => 'blue', 'label' => 'Paso 2 Equipos - Realizó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p1_paso2_equipos_verifico', 'type' => 'pink', 'label' => 'Paso 2 Equipos - Verificó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Fecha de inicio de proceso de fabricación --}}
        <table class="table table-bordered ebr-table align-middle mb-2 small">
            <tbody>
                <tr>
                    <td class="text-end fw-bold" style="width: 65%;">FECHA DE INICIO DE PROCESO DE FABRICACIÓN:</td>
                    <td class="ebr-cell-blue p-1" style="width: 35%;">
                        <input type="date" name="payload[parte1_paso2][fecha_inicio_proceso]" value="{{ $batch->val('parte1_paso2.fecha_inicio_proceso') }}" class="form-control form-control-sm ebr-input text-center fw-bold">
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">Realizó: Antefirma</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p1_paso2_inicio_realizo', 'type' => 'blue', 'label' => 'Fecha Inicio Proceso - Realizó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">Verificó: Antefirma</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p1_paso2_inicio_verifico', 'type' => 'pink', 'label' => 'Fecha Inicio Proceso - Verificó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
            </tbody>
        </table>

        @include('batches.partials.page-footer')
    </div>
</div>
