{{-- PASO 6 DEL ASISTENTE: PÁGINAS 9/14, 10/14 y 11/14 (Parte IV: Preparación de la mezcla final + Inicio Parte V) --}}

{{-- PÁGINA 9/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '9/14', 'batch' => $batch])

        <h6 class="fw-bold text-uppercase mb-2">Parte IV. Preparación de la mezcla final</h6>

        <p class="fw-bold small mb-2">Paso No. 1 Registrar el inicio y final del proceso de preparación de la Mezcla final en el siguiente cuadro:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p4_paso1_mezcla_final', 'batch' => $batch])

        <p class="fw-bold small mb-2 mt-3">
            Paso No. 2 Verificar que las temperaturas del contenedor principal de fase I y la fase II se encuentren a las siguientes temperaturas:
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
                            <td>Temperatura de fase I</td>
                            <td class="fw-bold">43°C - 47°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso2][temp_fase1]" value="{{ $batch->val('parte4_paso2.temp_fase1') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="43" data-max="47" placeholder="43°C - 47°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Temperatura de fase II</td>
                            <td class="fw-bold">38°C - 42°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso2][temp_fase2]" value="{{ $batch->val('parte4_paso2.temp_fase2') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="38" data-max="42" placeholder="38°C - 42°C">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso2_temp_realizo', 'type' => 'blue', 'label' => 'Parte IV Paso 2 Temp - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso2_temp_verifico', 'type' => 'pink', 'label' => 'Parte IV Paso 2 Temp - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="fw-bold small mb-2">
            Paso No. 3 Por medio de vacío trasvasar la fase II al contenedor principal del equipo procesador de triple efecto y vacío TFZRJ-750L-Q, mantener las siguientes condiciones en el contenedor principal.
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
                            <td class="text-start">Temperatura</td>
                            <td class="fw-bold">43°C - 47°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso3][temperatura]" value="{{ $batch->val('parte4_paso3.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="43" data-max="47" placeholder="43°C - 47°C">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">Velocidad de agitación</td>
                            <td class="fw-bold">30 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso3][velocidad]" value="{{ $batch->val('parte4_paso3.velocidad') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="30" data-max="30" placeholder="30 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">Tiempo</td>
                            <td class="fw-bold">10 minutos</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso3][tiempo]" value="{{ $batch->val('parte4_paso3.tiempo') }}" class="form-control form-control-sm ebr-input text-center" placeholder="10 minutos">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso3_ctrl_realizo', 'type' => 'blue', 'label' => 'Parte IV Paso 3 Trasvase - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso3_ctrl_verifico', 'type' => 'pink', 'label' => 'Parte IV Paso 3 Trasvase - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="small fw-semibold mb-1">Registrar el inicio y terminó de la actividad:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p4_paso3_actividad', 'batch' => $batch])

        <p class="fw-bold small mb-2 mt-3">
            Paso No. 4 Adicionar cuidadosamente por la mirilla el Clorhidrato de Isotipendilo al contenedor principal el cual deberá permanecer a las condiciones indicadas:
        </p>

        <div class="row justify-content-center mb-2">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle text-center mb-0 small">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 24%;">Cantidad Teórica</th>
                            <th style="width: 41%;">Materia Prima</th>
                            <th style="width: 35%;">Cantidad Física (Kg ó L)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">3.750 kg</td>
                            <td>Clorhidrato de Isotipendilo</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso4][isotipendilo_fisica]" value="{{ $batch->val('parte4_paso4.isotipendilo_fisica') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="Ej. 3.750 kg">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso4_mp_realizo', 'type' => 'blue', 'label' => 'Parte IV Paso 4 Isotipendilo MP - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso4_mp_verifico', 'type' => 'pink', 'label' => 'Parte IV Paso 4 Isotipendilo MP - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @include('batches.partials.page-footer')
    </div>
</div>

{{-- PÁGINA 10/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '10/14', 'batch' => $batch])

        <p class="small fw-semibold mb-1">Registrar las condiciones de proceso</p>
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
                            <td>Temperatura</td>
                            <td class="fw-bold">43°C - 47°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso4][temperatura]" value="{{ $batch->val('parte4_paso4.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="43" data-max="47" placeholder="43°C - 47°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad de agitación de la propela</td>
                            <td class="fw-bold">30 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso4][velocidad_propela]" value="{{ $batch->val('parte4_paso4.velocidad_propela') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="30" data-max="30" placeholder="30 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad del homogenizador</td>
                            <td class="fw-bold">3000 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso4][velocidad_homogenizador]" value="{{ $batch->val('parte4_paso4.velocidad_homogenizador') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="3000" data-max="3000" placeholder="3000 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td>Tiempo</td>
                            <td class="fw-bold">10 minutos</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso4][tiempo]" value="{{ $batch->val('parte4_paso4.tiempo') }}" class="form-control form-control-sm ebr-input text-center" placeholder="10 minutos">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso4_ctrl_realizo', 'type' => 'blue', 'label' => 'Parte IV Paso 4 Ctrl - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso4_ctrl_verifico', 'type' => 'pink', 'label' => 'Parte IV Paso 4 Ctrl - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="small fw-semibold mb-1">Registrar el inicio y terminó de la actividad:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p4_paso4_actividad', 'batch' => $batch])

        {{-- Parte IV Paso No. 5 (Hidroxietilcelulosa + Agua Purificada) --}}
        <p class="fw-bold small mb-2 mt-3">
            Paso No. 5 Adicionar las siguientes materias primas y agitar de acuerdo a las condiciones indicadas a continuación:
        </p>

        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <table class="table table-bordered ebr-table align-middle text-center mb-3 small">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 24%;">Cantidad Teórica</th>
                            <th style="width: 41%;">Materia Prima</th>
                            <th style="width: 35%;">Cantidad Física (Kg ó L)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">7.500 kg</td>
                            <td class="text-start">Hidroxietilcelulosa</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso5][hec_fisica]" value="{{ $batch->val('parte4_paso5.hec_fisica') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="Ej. 7.500 kg">
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">32.700 L</td>
                            <td class="text-start">Agua Purificada</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso5][agua_fisica]" value="{{ $batch->val('parte4_paso5.agua_fisica') }}" class="form-control form-control-sm ebr-input text-center fw-bold" placeholder="Ej. 32.700 L">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso5_mp_realizo', 'type' => 'blue', 'label' => 'Parte IV Paso 5 HEC/Agua MP - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso5_mp_verifico', 'type' => 'pink', 'label' => 'Parte IV Paso 5 HEC/Agua MP - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p class="small fw-semibold mb-1 text-start">Registrar las condiciones de proceso</p>
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
                            <td>Temperatura</td>
                            <td class="fw-bold">43°C - 47°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso5][temperatura]" value="{{ $batch->val('parte4_paso5.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="43" data-max="47" placeholder="43°C - 47°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad de agitación de la propela</td>
                            <td class="fw-bold">30 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso5][velocidad_propela]" value="{{ $batch->val('parte4_paso5.velocidad_propela') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="30" data-max="30" placeholder="30 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad del homogenizador</td>
                            <td class="fw-bold">3000 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso5][velocidad_homogenizador]" value="{{ $batch->val('parte4_paso5.velocidad_homogenizador') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="3000" data-max="3000" placeholder="3000 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td>Tiempo</td>
                            <td class="fw-bold">25 minutos</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso5][tiempo]" value="{{ $batch->val('parte4_paso5.tiempo') }}" class="form-control form-control-sm ebr-input text-center" placeholder="25 minutos">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso5_ctrl_realizo', 'type' => 'blue', 'label' => 'Parte IV Paso 5 Ctrl - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso5_ctrl_verifico', 'type' => 'pink', 'label' => 'Parte IV Paso 5 Ctrl - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="small fw-semibold mb-1">Registrar el inicio y terminó de la actividad:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p4_paso5_actividad', 'batch' => $batch])

        @include('batches.partials.page-footer')
    </div>
</div>

{{-- PÁGINA 11/14 --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '11/14', 'batch' => $batch])

        {{-- Parte IV Paso No. 6 --}}
        <p class="fw-bold small mb-2">
            Paso No. 6 Abrir la tapa del contenedor principal del procesador de triple efecto y vacío TFZRJ-750L-Q, verificar ausencia de grumos de Hidroxietilcelulosa en el producto. Raspar las paredes y las superficies de propelas y aspas, cerrar la tapa y continuar con el segundo periodo de agitación.
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
                            <td>Temperatura</td>
                            <td class="fw-bold">43°C - 47°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso6][temperatura]" value="{{ $batch->val('parte4_paso6.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="43" data-max="47" placeholder="43°C - 47°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad de agitación de la propela</td>
                            <td class="fw-bold">30 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso6][velocidad_propela]" value="{{ $batch->val('parte4_paso6.velocidad_propela') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="30" data-max="30" placeholder="30 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad del homogenizador</td>
                            <td class="fw-bold">3000 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso6][velocidad_homogenizador]" value="{{ $batch->val('parte4_paso6.velocidad_homogenizador') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="3000" data-max="3000" placeholder="3000 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td>Tiempo</td>
                            <td class="fw-bold">25 minutos</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso6][tiempo]" value="{{ $batch->val('parte4_paso6.tiempo') }}" class="form-control form-control-sm ebr-input text-center" placeholder="25 minutos">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso6_ctrl_realizo', 'type' => 'blue', 'label' => 'Parte IV Paso 6 2do Periodo - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso6_ctrl_verifico', 'type' => 'pink', 'label' => 'Parte IV Paso 6 2do Periodo - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Parte IV Paso No. 7 --}}
        <p class="fw-bold small mb-2">
            Paso No. 7 Dejar enfriar a temperatura ambiente el producto manteniendo la agitación constante.
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
                            <td>Temperatura</td>
                            <td class="fw-bold">25°C - 35°C</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso7][temperatura]" value="{{ $batch->val('parte4_paso7.temperatura') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="25" data-max="35" placeholder="25°C - 35°C">
                            </td>
                        </tr>
                        <tr>
                            <td>Velocidad de agitación de la propela</td>
                            <td class="fw-bold">30 rpm</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso7][velocidad_propela]" value="{{ $batch->val('parte4_paso7.velocidad_propela') }}" class="form-control form-control-sm ebr-input text-center ebr-range-check" data-min="30" data-max="30" placeholder="30 rpm">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso7_ctrl_realizo', 'type' => 'blue', 'label' => 'Parte IV Paso 7 Enfriamiento Final - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso7_ctrl_verifico', 'type' => 'pink', 'label' => 'Parte IV Paso 7 Enfriamiento Final - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="small fw-semibold mb-1">Registrar el inicio y terminó de la actividad:</p>
        @include('batches.partials.time-block', ['blockKey' => 'p4_paso7_actividad', 'batch' => $batch])

        {{-- Parte IV Paso No. 8 (pH 5.0 - 7.0) --}}
        <p class="fw-bold small mb-2 mt-3">
            Paso No. 8 Tomar una muestra para llevar a cabo la determinación de pH:
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
                            <td class="fw-bold">pH</td>
                            <td class="fw-bold">5.0 – 7.0</td>
                            <td class="ebr-cell-blue p-1">
                                <input type="text" name="payload[parte4_paso8][ph]" value="{{ $batch->val('parte4_paso8.ph') }}" class="form-control form-control-sm ebr-input text-center fw-bold ebr-range-check" data-min="5.0" data-max="7.0" placeholder="5.0 - 7.0">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Realizó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso8_ph_realizo', 'type' => 'blue', 'label' => 'Parte IV Paso 8 pH - Realizó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', ['sigKey' => 'p4_paso8_ph_verifico', 'type' => 'pink', 'label' => 'Parte IV Paso 8 pH - Verificó', 'batch' => $batch, 'compact' => true])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Parte V. Descargo del producto (inicio en Pág. 11) --}}
        <h6 class="fw-bold text-uppercase mt-3 mb-1">Parte V. Descargo del producto</h6>
        <p class="fw-bold small mb-1">Paso No. 1 Notas:</p>
        <p class="small mb-2 ps-3">
            <strong>1.1</strong> Las mangueras a utilizar para el descargo del producto deberán ser nuevas para cada lote fabricado, deberán ser esterilizadas y al final de su uso se deberán desechar <em>(12)</em>. Verificar que se encuentren limpias las líneas de descargo así como de bombeo, colocar en el Anexo 2 el ticket o la boleta de esterilización de las mangueras firmada por el operador y supervisor y/o jefe del área.
        </p>

        <table class="table table-bordered ebr-table align-middle mb-2 small">
            <tbody>
                <tr>
                    <td class="text-end fw-bold" style="width: 68%;">Realizó: Antefirma y Fecha</td>
                    <td class="p-0" style="width: 32%;">
                        @include('batches.partials.sig-box', ['sigKey' => 'p5_paso1_mangueras_realizo', 'type' => 'blue', 'label' => 'Parte V Paso 1 Mangueras - Realizó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">Verificó: Antefirma y Fecha</td>
                    <td class="p-0">
                        @include('batches.partials.sig-box', ['sigKey' => 'p5_paso1_mangueras_verifico', 'type' => 'pink', 'label' => 'Parte V Paso 1 Mangueras - Verificó', 'batch' => $batch, 'compact' => true])
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="small mb-2 ps-3">
            <strong>1.2</strong> En el caso de que el producto no se pueda descargar con la válvula de descargo, avisar al supervisor o jefe inmediato para tomar las medidas necesarias.
        </p>

        @include('batches.partials.page-footer')
    </div>
</div>
