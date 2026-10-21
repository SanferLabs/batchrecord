@php
    /**
     * Reusable Inicio / Término table matching the PDF layout
     * Props:
     * - $blockKey: unique key inside payload[tiempos][$blockKey]
     * - $batch: BatchRecord instance
     * - $titleLeft: optional (default 'Inicio')
     * - $titleRight: optional (default 'Término')
     */
    $titleLeft = $titleLeft ?? 'Inicio';
    $titleRight = $titleRight ?? 'Término';
    $iniFecha = $batch->val("tiempos.{$blockKey}.ini_fecha");
    $iniHora  = $batch->val("tiempos.{$blockKey}.ini_hora");
    $finFecha = $batch->val("tiempos.{$blockKey}.fin_fecha");
    $finHora  = $batch->val("tiempos.{$blockKey}.fin_hora");
@endphp

<table class="table table-bordered ebr-table mb-3 align-middle text-center">
    <thead>
        <tr class="bg-light">
            <th colspan="2" style="width: 50%;">
                {{ $titleLeft }}
                <button type="button" class="btn btn-xs btn-outline-primary py-0 px-1 ms-2 d-print-none" style="font-size:0.7rem;" onclick="fillNowDateTime('tiempos_{{ $blockKey }}_ini_fecha', 'tiempos_{{ $blockKey }}_ini_hora')">
                    <i class="bi bi-clock"></i> Ahora
                </button>
            </th>
            <th colspan="2" style="width: 50%;">
                {{ $titleRight }}
                <button type="button" class="btn btn-xs btn-outline-primary py-0 px-1 ms-2 d-print-none" style="font-size:0.7rem;" onclick="fillNowDateTime('tiempos_{{ $blockKey }}_fin_fecha', 'tiempos_{{ $blockKey }}_fin_hora')">
                    <i class="bi bi-clock"></i> Ahora
                </button>
            </th>
        </tr>
        <tr class="bg-white small">
            <th style="width: 25%;">Fecha</th>
            <th style="width: 25%;">Hora</th>
            <th style="width: 25%;">Fecha</th>
            <th style="width: 25%;">Hora</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="ebr-cell-blue p-1">
                <input type="date" id="tiempos_{{ $blockKey }}_ini_fecha" name="payload[tiempos][{{ $blockKey }}][ini_fecha]" value="{{ $iniFecha }}" class="form-control form-control-sm ebr-input text-center">
            </td>
            <td class="ebr-cell-blue p-1">
                <input type="time" id="tiempos_{{ $blockKey }}_ini_hora" name="payload[tiempos][{{ $blockKey }}][ini_hora]" value="{{ $iniHora }}" class="form-control form-control-sm ebr-input text-center">
            </td>
            <td class="ebr-cell-blue p-1">
                <input type="date" id="tiempos_{{ $blockKey }}_fin_fecha" name="payload[tiempos][{{ $blockKey }}][fin_fecha]" value="{{ $finFecha }}" class="form-control form-control-sm ebr-input text-center">
            </td>
            <td class="ebr-cell-blue p-1">
                <input type="time" id="tiempos_{{ $blockKey }}_fin_hora" name="payload[tiempos][{{ $blockKey }}][fin_hora]" value="{{ $finHora }}" class="form-control form-control-sm ebr-input text-center">
            </td>
        </tr>
        <tr>
            <td class="fw-semibold small bg-white">Realizó (antefirma):</td>
            <td class="p-0">
                @include('batches.partials.sig-box', [
                    'sigKey' => "tiempo_{$blockKey}_ini_realizo",
                    'type' => 'blue',
                    'label' => "{$titleLeft} - Realizó ({$blockKey})",
                    'batch' => $batch,
                    'compact' => true,
                ])
            </td>
            <td class="fw-semibold small bg-white">Realizó (antefirma):</td>
            <td class="p-0">
                @include('batches.partials.sig-box', [
                    'sigKey' => "tiempo_{$blockKey}_fin_realizo",
                    'type' => 'blue',
                    'label' => "{$titleRight} - Realizó ({$blockKey})",
                    'batch' => $batch,
                    'compact' => true,
                ])
            </td>
        </tr>
        <tr>
            <td class="fw-semibold small bg-white">Verificó (antefirma):</td>
            <td class="p-0">
                @include('batches.partials.sig-box', [
                    'sigKey' => "tiempo_{$blockKey}_ini_verifico",
                    'type' => 'pink',
                    'label' => "{$titleLeft} - Verificó ({$blockKey})",
                    'batch' => $batch,
                    'compact' => true,
                ])
            </td>
            <td class="fw-semibold small bg-white">Verificó (antefirma):</td>
            <td class="p-0">
                @include('batches.partials.sig-box', [
                    'sigKey' => "tiempo_{$blockKey}_fin_verifico",
                    'type' => 'pink',
                    'label' => "{$titleRight} - Verificó ({$blockKey})",
                    'batch' => $batch,
                    'compact' => true,
                ])
            </td>
        </tr>
    </tbody>
</table>
