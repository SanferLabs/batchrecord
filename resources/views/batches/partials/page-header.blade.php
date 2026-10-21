@php
    $pageNumber = $pageNumber ?? '1/14';
    $editableHeader = $editableHeader ?? false;
@endphp

<div class="ebr-doc-header mb-3">
    <div class="d-flex align-items-center justify-content-between mb-2">
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('images/grimann logo.png') }}" alt="Grimann" style="height: 40px; object-fit: contain;">
        </div>
        <h4 class="fw-bold text-uppercase m-0 text-center flex-grow-1" style="letter-spacing: 0.5px; color: #333;">
            PROCEDIMIENTO DE FABRICACIÓN
        </h4>
        <div style="width: 110px;" class="text-end">
            <span class="badge bg-light text-dark border d-print-none">Pág. {{ $pageNumber }}</span>
        </div>
    </div>

    <table class="table table-bordered ebr-header-table mb-0 align-middle text-center">
        <thead>
            <tr class="ebr-th-gray">
                <th style="width: 56%;">PRODUCTO</th>
                <th style="width: 18%;">CÓDIGO</th>
                <th style="width: 13%;">REVISIÓN</th>
                <th style="width: 13%;">PÁGINA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="fw-bold fs-6">{{ $batch->producto }}</td>
                <td class="fw-bold">{{ $batch->codigo }}</td>
                <td class="fw-bold">{{ $batch->revision }}</td>
                <td class="fw-bold">{{ $pageNumber }}</td>
            </tr>
            <tr class="ebr-th-gray">
                <th>LOTE</th>
                <th colspan="3">ORDEN DE PRODUCCIÓN</th>
            </tr>
            <tr>
                <td class="py-2">
                    @if($editableHeader)
                        <input type="hidden" name="lote" value="{{ $batch->lote }}">
                    @endif
                    <span class="fw-bold fs-6 ebr-display-lote">{{ $batch->lote }}</span>
                </td>
                <td colspan="3" class="py-2">
                    @if($editableHeader)
                        <input type="hidden" name="orden_produccion" value="{{ $batch->orden_produccion }}">
                    @endif
                    <span class="fw-bold fs-6 ebr-display-op">{{ $batch->orden_produccion }}</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
