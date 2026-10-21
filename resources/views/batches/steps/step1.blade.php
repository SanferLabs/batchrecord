{{-- PASO 1 DEL ASISTENTE: PÁGINA 1/14 (Portada, Presentación y Personal Involucrado) --}}
<div class="ebr-page card border shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        @include('batches.partials.page-header', ['pageNumber' => '1/14', 'editableHeader' => true, 'batch' => $batch])

        {{-- TAMAÑO DE LOTE (Generado automáticamente desde la OP) --}}
        <table class="table table-bordered ebr-table mb-3 align-middle text-center">
            <tbody>
                <tr>
                    <th class="ebr-th-gray" style="width: 35%;">TAMAÑO DE LOTE</th>
                    <td class="py-2">
                        <input type="hidden" name="tamano_lote" value="{{ $batch->tamano_lote }}">
                        <span class="fw-bold fs-6">{{ $batch->tamano_lote }}</span>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- FECHA DE APLICACIÓN / VIGENCIA / FIRMA --}}
        <table class="table table-bordered ebr-table mb-3 align-middle text-center">
            <thead>
                <tr class="ebr-th-gray">
                    <th style="width: 33%;">FECHA DE APLICACIÓN</th>
                    <th style="width: 33%;">FECHA DE VIGENCIA</th>
                    <th style="width: 34%;">FIRMA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-3 fw-bold fs-6">08 AGO 2023</td>
                    <td class="py-3 fw-bold fs-6">08 AGO 2026</td>
                    <td class="py-2">
                        <div class="fst-italic text-secondary" style="font-family: cursive; font-size: 1.15rem;">A. Siles</div>
                        <div class="small fw-semibold">Químico de Documentación</div>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- AUTORIZACIÓN DEL DOCUMENTO --}}
        <table class="table table-bordered ebr-table mb-4 align-middle text-center" style="overflow: visible;">
            <thead>
                <tr class="ebr-th-gray">
                    <th colspan="4">AUTORIZACIÓN DEL DOCUMENTO</th>
                </tr>
                <tr class="ebr-th-gray">
                    <th style="width: 25%;">ELABORÓ</th>
                    <th style="width: 25%;">REVISÓ</th>
                    <th style="width: 25%;">APROBÓ</th>
                    <th style="width: 25%;">AUTORIZÓ</th>
                </tr>
            </thead>
            <tbody>
                <tr class="small" style="height: 155px;">
                    {{-- ELABORÓ --}}
                    <td class="position-relative align-bottom pb-2 pt-5" style="overflow: visible;">
                        <img src="{{ asset('images/firmas/firma_elaboro.png') }}"
                             alt="Firma Elaboró"
                             class="position-absolute pe-none"
                             style="top: -18px; left: 8%; width: 78%; max-width: 175px; height: 128px; object-fit: contain; z-index: 2;">
                        <div class="position-relative" style="z-index: 1; line-height: 1.25; color: #222;">
                            <div>IQ. Macloven Hidalgo</div>
                            <div>Benitez</div>
                            <div>Gte. de Producción</div>
                        </div>
                    </td>

                    {{-- REVISÓ --}}
                    <td class="position-relative align-bottom pb-2 pt-5" style="overflow: visible;">
                        <div class="d-flex justify-content-center align-items-center mb-1" style="height: 76px;">
                            <img src="{{ asset('images/firmas/firma_reviso.png') }}"
                                 alt="Firma Revisó"
                                 class="pe-none"
                                 style="max-width: 155px; max-height: 74px; object-fit: contain;">
                        </div>
                        <div style="line-height: 1.25; color: #222;">
                            <div>QFB. Javier Rafael García</div>
                            <div>Fragoso</div>
                            <div>Gte. de Validación</div>
                        </div>
                    </td>

                    {{-- APROBÓ --}}
                    <td class="position-relative align-bottom pb-2 pt-5" style="overflow: visible;">
                        <img src="{{ asset('images/firmas/firma_aprobo.png') }}"
                             alt="Firma Aprobó"
                             class="position-absolute pe-none"
                             style="top: -42px; left: -12%; width: 118%; max-width: 265px; height: 150px; object-fit: contain; z-index: 2;">
                        <div class="position-relative" style="z-index: 1; line-height: 1.25; color: #222;">
                            <div>MBA. Francisco Jesús</div>
                            <div>Mendoza Amezcua</div>
                            <div>Director de Planta</div>
                        </div>
                    </td>

                    {{-- AUTORIZÓ --}}
                    <td class="position-relative align-bottom pb-2 pt-5" style="overflow: visible;">
                        <div class="d-flex justify-content-center align-items-center mb-1" style="height: 80px;">
                            <img src="{{ asset('images/firmas/firma_autorizo.png') }}"
                                 alt="Firma Autorizó"
                                 class="pe-none"
                                 style="max-width: 165px; max-height: 78px; object-fit: contain;">
                        </div>
                        <div style="line-height: 1.25; color: #222;">
                            <div>QFB. Blanca Rivera Arroyo</div>
                            <div>Responsable Sanitario</div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- I. PRESENTACIÓN --}}
        <div class="mb-4">
            <h6 class="fw-bold text-uppercase mb-1">I. &nbsp;&nbsp;&nbsp;&nbsp; PRESENTACIÓN</h6>
            <p class="small mb-2">En el cuadro siguiente marque con una "✓" la presentación que le corresponde a este producto:</p>

            <div class="row justify-content-center">
                <div class="col-md-9">
                    <table class="table table-bordered ebr-table align-middle text-center mb-0">
                        <thead>
                            <tr class="bg-light">
                                <th style="width: 55%;">Producto</th>
                                <th style="width: 25%;">Presentación</th>
                                <th style="width: 20%;">✓</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start fw-semibold">ISOTIPENDILO GEL ST</td>
                                <td class="fw-semibold">ST</td>
                                <td class="ebr-cell-blue p-1">
                                    <input type="hidden" name="payload[presentacion_st]" value="0">
                                    <input type="checkbox" class="form-check-input fs-5 border-dark" name="payload[presentacion_st]" value="1" @checked($batch->val('presentacion_st') == '1')>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start fw-semibold">ANDANTOL GEL 100 G</td>
                                <td class="fw-semibold">VT</td>
                                <td class="ebr-cell-blue p-1">
                                    <input type="hidden" name="payload[presentacion_vt]" value="0">
                                    <input type="checkbox" class="form-check-input fs-5 border-dark" name="payload[presentacion_vt]" value="1" @checked($batch->val('presentacion_vt') == '1')>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-1">
                                    <input type="text" name="payload[presentacion_extra_prod]" value="{{ $batch->val('presentacion_extra_prod') }}" class="form-control form-control-sm ebr-input" placeholder="(Opcional) Otra presentación">
                                </td>
                                <td class="p-1">
                                    <input type="text" name="payload[presentacion_extra_tipo]" value="{{ $batch->val('presentacion_extra_tipo') }}" class="form-control form-control-sm text-center ebr-input" placeholder="Código">
                                </td>
                                <td class="ebr-cell-blue p-1">
                                    <input type="hidden" name="payload[presentacion_extra_chk]" value="0">
                                    <input type="checkbox" class="form-check-input fs-5 border-dark" name="payload[presentacion_extra_chk]" value="1" @checked($batch->val('presentacion_extra_chk') == '1')>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- II. FABRICACIÓN - Parte I. Dispensado de Materia Prima --}}
        <div>
            <h6 class="fw-bold text-uppercase mb-1">II. &nbsp;&nbsp;&nbsp;&nbsp; FABRICACIÓN</h6>
            <p class="fw-bold small mb-1">Parte I. Dispensado de Materia Prima.</p>
            <p class="fw-bold small mb-2">Personal involucrado:</p>

            <table class="table table-bordered ebr-table align-middle text-center mb-2">
                <thead>
                    <tr class="bg-light">
                        <th style="width: 55%;">Nombre</th>
                        <th style="width: 45%;">Antefirma y Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 6; $i++)
                        @php
                            $savedNombre = $batch->val("personal.{$i}.nombre");
                            if ($i === 1 && empty($savedNombre)) {
                                $savedNombre = Auth::user()->name ?? '';
                            }
                        @endphp
                        <tr>
                            <td class="ebr-cell-blue p-1">
                                <div class="input-group input-group-sm">
                                    <input type="text"
                                           id="personal_nombre_{{ $i }}"
                                           name="payload[personal][{{ $i }}][nombre]"
                                           value="{{ $savedNombre }}"
                                           class="form-control ebr-input fw-semibold"
                                           placeholder="Nombre del operador {{ $i }}..."
                                           onfocus="if(!this.value.trim()){ this.value = CURRENT_USER_NAME; quickStampUser('personal_involucrado_{{ $i }}'); }"
                                           oninput="if(this.value.trim()){ quickStampUserWithCustomName('personal_involucrado_{{ $i }}', this.value.trim()); } else { clearSignature('personal_involucrado_{{ $i }}'); }">
                                    <button type="button"
                                            class="btn btn-outline-secondary d-print-none"
                                            onclick="document.getElementById('personal_nombre_{{ $i }}').value = CURRENT_USER_NAME; quickStampUser('personal_involucrado_{{ $i }}');"
                                            title="Llenar con mi usuario actual, fecha y hora">
                                        <i class="bi bi-person-check-fill"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="p-0">
                                @include('batches.partials.sig-box', [
                                    'sigKey' => "personal_involucrado_{$i}",
                                    'type' => 'blue',
                                    'label' => "Personal Involucrado Fila {$i} - Antefirma y Fecha",
                                    'batch' => $batch,
                                    'compact' => true,
                                ])
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        @include('batches.partials.page-footer')
    </div>
</div>
