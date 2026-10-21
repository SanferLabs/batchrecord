@php
    /**
     * Reusable signature cell for Realizó (blue) and Verificó (pink)
     * Automatically stamps current user's Name, Date, and Time (no drawing).
     */
    $sigData = $batch->sig($sigKey);
    $userName = $sigData['user_name'] ?? '';
    $signedAt = $sigData['signed_at'] ?? '';
    $isSigned = !empty($userName);
    $cellClass = ($type ?? 'blue') === 'pink' ? 'ebr-cell-pink' : 'ebr-cell-blue';
    $compact = $compact ?? false;
@endphp

<div class="ebr-sig-widget {{ $cellClass }} {{ $compact ? 'p-2' : 'p-2' }} position-relative"
     id="sig_widget_{{ $sigKey }}"
     data-sig-key="{{ $sigKey }}"
     data-sig-label="{{ $label ?? $sigKey }}"
     style="cursor: pointer; transition: background-color 0.15s ease;"
     onclick="quickStampUser('{{ $sigKey }}')"
     title="Se llena automáticamente con tu nombre, fecha y hora (clic para firmar o actualizar)">
    {{-- Hidden inputs so form submission persists signature data --}}
    <input type="hidden" name="payload[signatures][{{ $sigKey }}][user_name]" id="sig_user_{{ $sigKey }}" value="{{ $userName }}">
    <input type="hidden" name="payload[signatures][{{ $sigKey }}][signed_at]" id="sig_date_{{ $sigKey }}" value="{{ $signedAt }}">
    <input type="hidden" name="payload[signatures][{{ $sigKey }}][drawing]"   id="sig_draw_{{ $sigKey }}" value="">

    {{-- Botón sutil para limpiar (solo visible en pantalla cuando está firmado) --}}
    <button type="button"
            id="sig_clear_btn_{{ $sigKey }}"
            class="btn btn-link text-danger p-0 position-absolute d-print-none {{ $isSigned ? '' : 'd-none' }}"
            style="top: 4px; right: 6px; font-size: 0.72rem; line-height: 1; opacity: 0.55; text-decoration: none;"
            onclick="event.stopPropagation(); clearSignature('{{ $sigKey }}')"
            title="Borrar firma">
        <i class="bi bi-x-circle-fill"></i>
    </button>

    {{-- Contenedor de Nombre, Fecha y Hora --}}
    <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height: {{ $compact ? '42px' : '48px' }};">
        <div id="sig_text_{{ $sigKey }}" class="lh-sm">
            @if($isSigned)
                <span class="fw-bold d-block" style="color: #0f172a; font-size: 0.84rem;">{{ $userName }}</span>
                @if($signedAt)
                    <span class="text-secondary fw-medium d-block" style="font-size: 0.74rem;">{{ $signedAt }}</span>
                @endif
            @else
                <span class="text-muted fst-italic d-print-none" style="font-size: 0.75rem;">
                    <i class="bi bi-clock-history me-1"></i>Automático al capturar / clic
                </span>
            @endif
        </div>
    </div>
</div>
