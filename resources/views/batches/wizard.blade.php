@extends('layouts.app')

@section('title', "Lote {$batch->lote} · Asistente Paso a Paso (332FB487)")

@push('styles')
<style>
    .ebr-page {
        background: #ffffff;
        border: 1px solid #cbd5e1 !important;
        border-radius: 0.5rem;
    }
    .ebr-header-table th,
    .ebr-header-table td,
    .ebr-table th,
    .ebr-table td {
        border-color: #475569 !important;
        padding: 0.35rem 0.5rem;
    }
    .ebr-th-gray {
        background-color: #d9d9d9 !important;
        color: #111827;
        font-size: 0.8rem;
        text-transform: uppercase;
    }
    /* Exact PDF color coding: Blue for Operator (Realizó), Pink for Verifier (Verificó) */
    .ebr-cell-blue {
        background-color: #cfe2f3 !important;
    }
    .ebr-cell-pink {
        background-color: #f4cccc !important;
    }
    .ebr-input {
        background-color: rgba(255, 255, 255, 0.85);
        border: 1px solid #94a3b8;
        font-size: 0.85rem;
    }
    .ebr-input:focus {
        background-color: #ffffff;
        border-color: #1d4ed8;
        box-shadow: 0 0 0 0.15rem rgba(29, 78, 216, 0.2);
    }
    .ebr-input.out-of-spec {
        background-color: #fee2e2 !important;
        border: 2px solid #dc2626 !important;
        color: #991b1b !important;
        font-weight: 700;
    }
    .ebr-input.in-spec {
        border: 1.5px solid #16a34a !important;
    }
    .ebr-field-missing {
        border: 2px solid #e11d48 !important;
        background-color: #fff1f2 !important;
        box-shadow: 0 0 0 0.18rem rgba(225, 29, 72, 0.18) !important;
    }
    .ebr-sig-widget.ebr-field-missing {
        outline: 2px dashed #e11d48 !important;
        outline-offset: -2px;
        background-color: #ffe4e6 !important;
    }
    @keyframes ebrMissingPulse {
        0%, 100% { box-shadow: 0 0 0 0.2rem rgba(225, 29, 72, 0.25); transform: scale(1); }
        50% { box-shadow: 0 0 0 0.45rem rgba(225, 29, 72, 0.42); transform: scale(1.015); }
    }
    .ebr-field-missing-focus {
        animation: ebrMissingPulse 0.65s ease-in-out 3;
        z-index: 5;
        position: relative;
    }
    #stepCompletionStatusBadge {
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.22, 1, 0.36, 1);
    }
    #stepCompletionStatusBadge:hover {
        transform: translateY(-1.5px) scale(1.02);
        box-shadow: 0 6px 14px rgba(217, 119, 6, 0.18), inset 0 1.5px 2px rgba(255, 255, 255, 0.95);
    }
    .wiz-action-pill.wiz-btn-incomplete {
        opacity: 0.62;
        background: linear-gradient(180deg, rgba(148, 163, 184, 0.85) 0%, rgba(100, 116, 139, 0.92) 100%) !important;
        border-color: rgba(255, 255, 255, 0.65) !important;
        color: #f8fafc !important;
        cursor: not-allowed;
    }

    /* =========================================================================
       WIZARD TOP BAR & STEPPER — 3D LIQUID GLASS KIT
       ========================================================================= */
    .wizard-glass-bar {
        background: var(--glass-white-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: var(--glass-border) !important;
        box-shadow: var(--glass-shadow);
        border-radius: 26px;
    }

    .wiz-back-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.42rem;
        padding: 0.42rem 0.98rem;
        border-radius: 999px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.94) 0%, rgba(243, 232, 237, 0.72) 100%);
        border: 1.5px solid rgba(255, 255, 255, 0.92);
        color: #2d3748;
        font-size: 0.78rem;
        font-weight: 700;
        text-decoration: none;
        box-shadow:
            0 8px 18px -4px rgba(45, 55, 72, 0.14),
            inset 0 2px 2px rgba(255, 255, 255, 1),
            inset 0 -2px 4px rgba(102, 111, 136, 0.12);
        transition: all 0.22s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .wiz-back-pill:hover {
        background: #ffffff;
        color: #1a202c;
        transform: translateX(-2px) translateY(-1px);
        box-shadow:
            0 12px 22px -4px rgba(45, 55, 72, 0.20),
            inset 0 2px 3px rgba(255, 255, 255, 1);
    }

    .wiz-chip-op {
        display: inline-flex;
        align-items: center;
        gap: 0.38rem;
        padding: 0.4rem 0.9rem;
        border-radius: 999px;
        background: linear-gradient(180deg, rgba(120, 129, 153, 0.92) 0%, rgba(62, 74, 96, 0.94) 50%, rgba(45, 55, 72, 0.98) 100%);
        border: 1.5px solid rgba(255, 255, 255, 0.68);
        color: #ffffff;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: -0.01em;
        box-shadow:
            0 10px 20px -4px rgba(45, 55, 72, 0.32),
            inset 0 2.5px 3px rgba(255, 255, 255, 0.6),
            inset 0 -2px 5px rgba(243, 232, 237, 0.25);
    }

    .wiz-chip-lote {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.38rem 0.88rem;
        border-radius: 999px;
        background: var(--glass-accent-bg);
        border: 1.5px solid rgba(255, 255, 255, 0.88);
        box-shadow:
            0 8px 16px -4px rgba(45, 55, 72, 0.12),
            inset 0 2px 2px rgba(255, 255, 255, 0.95);
        color: #2d3748;
        font-size: 0.76rem;
        font-weight: 700;
    }

    .wiz-chip-approved {
        display: inline-flex;
        align-items: center;
        gap: 0.38rem;
        padding: 0.38rem 0.85rem;
        border-radius: 999px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.92) 0%, rgba(236, 253, 245, 0.75) 100%);
        border: 1.5px solid rgba(255, 255, 255, 0.92);
        box-shadow:
            0 8px 16px -4px rgba(16, 185, 129, 0.14),
            inset 0 2px 2px rgba(255, 255, 255, 1);
        color: #065f46;
        font-size: 0.74rem;
        font-weight: 600;
    }

    .wiz-chip-code {
        display: inline-flex;
        align-items: center;
        padding: 0.36rem 0.8rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.72);
        border: 1px solid rgba(255, 255, 255, 0.85);
        box-shadow: inset 0 1.5px 2px rgba(255, 255, 255, 0.95);
        color: #4a5568;
        font-size: 0.73rem;
        font-weight: 600;
    }

    .wiz-progress-wrap {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.88) 0%, rgba(243, 232, 237, 0.58) 100%);
        border: 1.5px solid rgba(255, 255, 255, 0.9);
        box-shadow:
            0 8px 16px -4px rgba(45, 55, 72, 0.10),
            inset 0 2px 2px rgba(255, 255, 255, 1);
        padding: 0.34rem 0.85rem;
        border-radius: 999px;
    }

    .wiz-progress-track {
        width: 90px;
        height: 7px;
        border-radius: 999px;
        background: rgba(102, 111, 136, 0.18);
        box-shadow: inset 0 1px 2px rgba(45, 55, 72, 0.15);
        overflow: hidden;
    }

    .wiz-progress-fill {
        height: 100%;
        border-radius: 999px;
        background: linear-gradient(90deg, #2d3748 0%, #666F88 100%);
        transition: width 0.45s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .wiz-status-select {
        appearance: none;
        background-color: rgba(255, 255, 255, 0.9);
        border: 1.5px solid rgba(255, 255, 255, 0.92);
        border-radius: 999px;
        padding: 0.4rem 2rem 0.4rem 0.9rem;
        font-size: 0.77rem;
        font-weight: 600;
        color: #2d3748;
        cursor: pointer;
        box-shadow:
            0 8px 18px -4px rgba(45, 55, 72, 0.12),
            inset 0 2px 2px rgba(255, 255, 255, 1);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%232d3748' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 0.65rem center;
        background-size: 11px 11px;
        transition: all 0.2s ease;
    }
    .wiz-status-select:focus {
        outline: none;
        border-color: #666F88;
        box-shadow: 0 0 0 3px rgba(102, 111, 136, 0.15);
    }

    .wiz-action-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.42rem 0.95rem;
        border-radius: 999px;
        font-size: 0.77rem;
        font-weight: 600;
        border: 1.5px solid rgba(255, 255, 255, 0.9);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.92) 0%, rgba(248, 249, 252, 0.75) 100%);
        color: #2d3748;
        text-decoration: none;
        box-shadow:
            0 10px 20px -4px rgba(45, 55, 72, 0.13),
            inset 0 2px 2px rgba(255, 255, 255, 1),
            inset 0 -2px 4px rgba(102, 111, 136, 0.10);
        transition: all 0.22s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .wiz-action-pill:hover {
        background: #ffffff;
        color: #1a202c;
        transform: translateY(-2px) scale(1.015);
        box-shadow:
            0 14px 24px -4px rgba(45, 55, 72, 0.18),
            inset 0 2px 3px rgba(255, 255, 255, 1);
    }

    .wiz-action-pill-save {
        background: var(--glass-accent-bg);
        border-color: rgba(255, 255, 255, 0.92);
        color: #2d3748;
    }
    .wiz-action-pill-save:hover {
        background: var(--glass-accent-hover);
        color: #1a202c;
    }

    .wiz-action-pill-dark {
        background: linear-gradient(180deg, rgba(120, 129, 153, 0.92) 0%, rgba(62, 74, 96, 0.94) 50%, rgba(45, 55, 72, 0.98) 100%);
        border: 1.5px solid rgba(255, 255, 255, 0.68);
        color: #ffffff;
        box-shadow:
            0 12px 22px -4px rgba(45, 55, 72, 0.32),
            inset 0 2.5px 4px rgba(255, 255, 255, 0.6),
            inset 0 -2px 5px rgba(243, 232, 237, 0.25);
    }
    .wiz-action-pill-dark:hover {
        background: linear-gradient(180deg, #788199 0%, #555d73 50%, #1e2633 100%);
        color: #ffffff;
        transform: translateY(-2px) scale(1.015);
        box-shadow:
            0 16px 28px -4px rgba(45, 55, 72, 0.40),
            inset 0 3px 5px rgba(255, 255, 255, 0.72);
    }

    /* =========================================================================
       7-STEP NAVIGATION BAR (3D LIQUID GLASS PILLS)
       ========================================================================= */
    .wizard-stepper {
        display: grid;
        grid-template-columns: repeat(7, minmax(0, 1fr));
        gap: 0.55rem;
        background: var(--glass-white-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: var(--glass-border);
        border-radius: 24px;
        padding: 0.55rem;
        box-shadow: var(--glass-shadow);
    }
    @media (max-width: 1199.98px) {
        .wizard-stepper {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
    }
    @media (max-width: 575.98px) {
        .wizard-stepper {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    .wizard-step-btn {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        text-align: left;
        padding: 0.58rem 0.72rem;
        border-radius: 18px;
        border: 1.5px solid rgba(255, 255, 255, 0.88);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.90) 0%, rgba(243, 232, 237, 0.58) 100%);
        color: #334155;
        box-shadow:
            0 10px 20px -5px rgba(45, 55, 72, 0.12),
            inset 0 2px 3px rgba(255, 255, 255, 0.98),
            inset 0 -2px 4px rgba(102, 111, 136, 0.10);
        transition: all 0.22s var(--hig-spring);
        cursor: pointer;
        min-width: 0;
    }
    .wizard-step-btn:hover:not(.active) {
        background: linear-gradient(180deg, #ffffff 0%, rgba(243, 232, 237, 0.78) 100%);
        border-color: #ffffff;
        color: #0f172a;
        transform: translateY(-2px) scale(1.012);
        box-shadow:
            0 14px 24px -5px rgba(45, 55, 72, 0.18),
            inset 0 2.5px 3px rgba(255, 255, 255, 1);
    }

    .wizard-step-icon-box {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 12px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.95) 0%, rgba(243, 232, 237, 0.75) 100%);
        border: 1px solid rgba(255, 255, 255, 0.95);
        box-shadow:
            0 6px 12px -2px rgba(45, 55, 72, 0.12),
            inset 0 1.5px 2px rgba(255, 255, 255, 1);
        color: #2d3748;
        font-size: 0.95rem;
        flex-shrink: 0;
        transition: all 0.2s var(--hig-spring);
    }
    .wizard-step-btn:hover:not(.active) .wizard-step-icon-box {
        background: #ffffff;
        color: #1e293b;
        transform: scale(1.05);
    }

    .wizard-step-info {
        min-width: 0;
        flex: 1;
    }

    .wizard-step-title {
        font-size: 0.76rem;
        font-weight: 700;
        line-height: 1.2;
        color: #1e293b;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .wizard-step-pages {
        font-size: 0.65rem;
        font-weight: 500;
        color: #64748b;
        line-height: 1.15;
        margin-top: 0.12rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Active Step — 3D Glossy Liquid Glass Pill */
    .wizard-step-btn.active {
        background: linear-gradient(180deg, rgba(120, 129, 153, 0.94) 0%, rgba(62, 74, 96, 0.95) 50%, rgba(45, 55, 72, 0.98) 100%);
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.72);
        box-shadow:
            0 14px 26px -4px rgba(45, 55, 72, 0.34),
            inset 0 2.5px 4px rgba(255, 255, 255, 0.65),
            inset 0 -3px 6px rgba(243, 232, 237, 0.28);
        transform: translateY(-1px);
    }
    .wizard-step-btn.active .wizard-step-icon-box {
        background: rgba(255, 255, 255, 0.22);
        border-color: rgba(255, 255, 255, 0.45);
        box-shadow: inset 0 1.5px 2px rgba(255, 255, 255, 0.55);
        color: #ffffff;
    }
    .wizard-step-btn.active .wizard-step-title {
        color: #ffffff;
    }
    .wizard-step-btn.active .wizard-step-pages {
        color: rgba(243, 232, 237, 0.9);
    }

    /* Legend Strip */
    .wizard-legend-bar {
        background: var(--glass-white-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: var(--glass-border);
        border-radius: 20px;
        padding: 0.65rem 1.15rem;
        box-shadow: var(--glass-shadow);
    }

    .wizard-legend-dot {
        display: inline-block;
        width: 14px;
        height: 14px;
        border-radius: 5px;
        vertical-align: middle;
        margin-right: 0.35rem;
        border: 1px solid rgba(255, 255, 255, 0.85);
        box-shadow: 0 2px 6px rgba(45, 55, 72, 0.12);
    }

    .wizard-step-pane {
        animation: higSpringEnter 0.42s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    /* Signature canvas */
    #signatureCanvas {
        border: 2px dashed #64748b;
        border-radius: 14px;
        background-color: #f8fafc;
        cursor: crosshair;
        touch-action: none;
        width: 100%;
        height: 200px;
    }
</style>
@endpush

@section('content')
@php
    $wizardSteps = [
        1 => ['title' => 'Portada y Personal',     'pages' => 'Pág. 1/14',      'icon' => 'bi-person-vcard'],
        2 => ['title' => 'Despeje y Equipos',      'pages' => 'Pág. 2/14',      'icon' => 'bi-clipboard2-check'],
        3 => ['title' => 'Monitoreo y MP',         'pages' => 'Págs. 3-4/14',   'icon' => 'bi-box-seam'],
        4 => ['title' => 'Preparación Fase I',     'pages' => 'Págs. 5-7/14',   'icon' => 'bi-droplet-half'],
        5 => ['title' => 'Preparación Fase II',    'pages' => 'Pág. 8/14',      'icon' => 'bi-moisture'],
        6 => ['title' => 'Mezcla Final y pH',      'pages' => 'Págs. 9-11/14',  'icon' => 'bi-sliders2'],
        7 => ['title' => 'Descargo y Rendimiento', 'pages' => 'Págs. 12-14/14', 'icon' => 'bi-bar-chart-line'],
    ];
    $pct = $batch->progressPercentage();
    $opFormatted = str_starts_with(strtoupper(trim($batch->orden_produccion)), 'OP')
        ? trim($batch->orden_produccion)
        : 'OP-' . trim($batch->orden_produccion);
@endphp

<div class="container-fluid px-0 px-md-1">
    <form id="batchWizardForm" method="POST" action="{{ route('batches.update', $batch->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="current_step" id="current_step_input" value="{{ $step }}">
        <input type="hidden" name="next_step" id="next_step_input" value="{{ $step }}">

        {{-- Barra superior estática de control del Lote (Apple Glassmorphism) --}}
        <div class="card wizard-glass-bar mb-3">
            <div class="card-body py-2.5 px-3">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                    {{-- Izquierda: Regresar + Chips de OP (Primero), Lote, Estado y Código --}}
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <a href="{{ route('dashboard', ['section' => 'historial']) }}" class="wiz-back-pill">
                            <i class="bi bi-arrow-left"></i>
                            <span>Fabricación</span>
                        </a>

                        <span class="wiz-chip-op">
                            <i class="bi bi-layers-fill" style="font-size: 0.7rem; opacity: 0.85;"></i>
                            <span class="ebr-display-op">{{ $opFormatted }}</span>
                        </span>

                        <span class="wiz-chip-lote">
                            <span>Lote:</span>
                            <span class="ebr-display-lote">{{ $batch->lote }}</span>
                        </span>

                        <span class="wiz-chip-approved d-none d-md-inline-flex">
                            <i class="bi bi-check-circle-fill" style="color: #10b981;"></i>
                            <span>OP Aprobada · 14 Págs.</span>
                        </span>

                        <span class="wiz-chip-code d-none d-xl-inline-flex">
                            {{ $batch->codigo ?: '332FB487' }} · Rev {{ $batch->revision ?: '09' }}
                        </span>
                    </div>

                    {{-- Derecha: Avance + Controles de Acción --}}
                    @php
                        $isWizardFinished = ($batch->status === 'Finalizado');
                    @endphp
                    <input type="hidden" name="status" id="wizardStatusSelect" value="{{ $batch->status }}">
                    <input type="hidden" name="payload[wizard_progress_pct]" id="wizard_progress_pct_input" value="{{ $pct }}">
                    <div class="d-flex flex-wrap align-items-center gap-2 ms-auto">
                        <div class="wiz-progress-wrap">
                            <span class="text-muted fw-semibold" style="font-size: 0.73rem;">Avance</span>
                            <div class="wiz-progress-track">
                                <div id="topProgressBar" class="wiz-progress-fill" role="progressbar" style="width: {{ $pct }}%"></div>
                            </div>
                            <span id="topProgressText" class="fw-bold" style="font-size: 0.75rem; color: #2d3748;">{{ $pct }}%</span>
                        </div>

                        <a href="{{ route('batches.print', $batch->id) }}"
                           id="btnWizardPrintPdf"
                           target="_blank"
                           class="wiz-action-pill wiz-action-pill-dark {{ $isWizardFinished ? '' : 'd-none' }}">
                            <i class="bi bi-printer-fill"></i>
                            <span>Vista Impresión (14 Hojas)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Navegador sencillo y limpio de los 7 pasos con iconos --}}
        <div class="wizard-stepper mb-3">
            @foreach($wizardSteps as $sNum => $sInfo)
                <button type="button"
                        class="wizard-step-btn {{ $step === $sNum ? 'active' : '' }}"
                        id="stepper_btn_{{ $sNum }}"
                        onclick="switchWizardStep({{ $sNum }})">
                    <span class="wizard-step-icon-box">
                        <i class="bi {{ $sInfo['icon'] }}"></i>
                    </span>
                    <div class="wizard-step-info">
                        <div class="wizard-step-title">{{ $sInfo['title'] }}</div>
                        <div class="wizard-step-pages">Paso {{ $sNum }} · {{ $sInfo['pages'] }}</div>
                    </div>
                </button>
            @endforeach
        </div>

        {{-- Leyenda de colores y ayuda de firma (Glassmorphic Bar) --}}
        <div class="wizard-legend-bar mb-3 d-flex flex-wrap align-items-center justify-content-between gap-2 small">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <span class="text-dark">
                    <span class="wizard-legend-dot" style="background:#cfe2f3;"></span>
                    <strong>Celda Azul:</strong> Captura y Firma de quien <strong>Realizó (Operador)</strong>
                </span>
                <span class="text-dark">
                    <span class="wizard-legend-dot" style="background:#f4cccc;"></span>
                    <strong>Celda Rosa:</strong> Firma de quien <strong>Verificó (Supervisor)</strong>
                </span>
            </div>
            <div class="text-muted d-flex align-items-center gap-1" style="font-size: 0.78rem;">
                <i class="bi bi-person-check-fill" style="color: #666F88;"></i>
                <span>Firma automática con tu nombre, fecha y hora (<strong>{{ Auth::user()->name ?? 'Usuario' }}</strong>).</span>
            </div>
        </div>

        {{-- Contenedores de los 7 pasos (14 páginas) --}}
        @for($s = 1; $s <= 7; $s++)
            <div class="wizard-step-pane {{ $step === $s ? '' : 'd-none' }}" id="wizard_pane_{{ $s }}" data-step="{{ $s }}">
                @include("batches.steps.step{$s}", ['batch' => $batch])
            </div>
        @endfor

        {{-- Alerta de validación de campos obligatorios del paso --}}
        <div id="stepValidationAlert" class="alert alert-danger d-none mb-3 py-2.5 px-3"
             style="background: rgba(255, 228, 230, 0.92); backdrop-filter: blur(16px); border: 1.5px solid #fda4af; border-radius: 18px; color: #9f1239; box-shadow: 0 8px 20px rgba(225, 29, 72, 0.12);">
            <div class="d-flex align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center gap-2 small fw-semibold">
                    <i class="bi bi-exclamation-octagon-fill fs-6"></i>
                    <span id="stepValidationAlertText">Todos los campos de este paso son obligatorios. Completa los campos marcados en rojo para poder avanzar al siguiente paso (tu avance actual ya fue guardado).</span>
                </div>
                <button type="button" class="btn-close btn-sm" onclick="document.getElementById('stepValidationAlert').classList.add('d-none')"></button>
            </div>
        </div>

        {{-- Barra inferior de navegación Paso a Paso --}}
        <div class="card wizard-glass-bar mt-3 mb-5">
            <div class="card-body py-3 px-4 d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div>
                    <button type="button"
                            id="btnPrevStep"
                            class="wiz-action-pill {{ $step <= 1 ? 'disabled opacity-50 pe-none' : '' }}"
                            onclick="navigateAndSaveStep(-1)">
                        <i class="bi bi-arrow-left"></i>
                        <span>Paso Anterior</span>
                    </button>
                </div>

                <div class="d-flex flex-wrap align-items-center justify-content-center gap-2">
                    <span id="stepCompletionStatusBadge"
                          class="wiz-chip-code py-1.5 px-3"
                          onclick="goToNextMissingField()"
                          title="Haz clic para resaltar y desplazarte a los campos faltantes">
                        <i class="bi bi-hourglass-split me-1"></i>
                        <span>Verificando campos del paso...</span>
                    </span>

                    <span id="saveToastBadge" class="wiz-chip-approved py-1.5 px-3 d-none">
                        <i class="bi bi-check-circle-fill" style="color: #10b981;"></i>
                        <span>Guardado en la base de datos</span>
                    </span>

                    <button type="button" id="btnSaveCurrentStep" class="wiz-action-pill wiz-action-pill-save" onclick="saveCurrentStepOnly()">
                        <i class="bi bi-floppy"></i>
                        <span>Guardar Paso Actual</span>
                    </button>
                </div>

                <div>
                    <button type="button"
                            id="btnNextStep"
                            class="wiz-action-pill wiz-action-pill-dark {{ $step >= 7 ? 'd-none' : '' }}"
                            onclick="navigateAndSaveStep(1)">
                        <i id="btnNextStepLockIcon" class="bi bi-lock-fill d-none"></i>
                        <span>Guardar y Siguiente Paso</span>
                        <i class="bi bi-arrow-right"></i>
                    </button>

                    <button type="button"
                            id="btnFinishWizard"
                            class="wiz-action-pill wiz-action-pill-dark {{ $step === 7 ? '' : 'd-none' }}"
                            onclick="attemptFinishWizard()">
                        <i id="btnFinishLockIcon" class="bi bi-lock-fill d-none"></i>
                        <i class="bi bi-check2-circle"></i>
                        <span>Guardar Todo y Finalizar Captura</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    const CURRENT_USER_NAME = @json(Auth::user()->name ?? 'Usuario Actual');
    let currentWizardStep = {{ $step }};
    let allStepsVisible = false;

    document.addEventListener('DOMContentLoaded', () => {
        initAutoSignatures();
        initRangeChecks();
        recalculateContainersAndYield();
        initStepValidationListeners();
        updateCurrentStepCompletionState(false);
    });

    function formatNowDateTime() {
        const now = new Date();
        const pad = n => String(n).padStart(2, '0');
        const meses = ['ENE','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SEP','OCT','NOV','DIC'];
        return `${pad(now.getDate())} ${meses[now.getMonth()]} ${now.getFullYear()} ${pad(now.getHours())}:${pad(now.getMinutes())}`;
    }

    function fillNowDateTime(dateInputId, timeInputId) {
        const now = new Date();
        const pad = n => String(n).padStart(2, '0');
        const dateEl = document.getElementById(dateInputId);
        const timeEl = document.getElementById(timeInputId);
        if (dateEl) {
            dateEl.value = `${now.getFullYear()}-${pad(now.getMonth() + 1)}-${pad(now.getDate())}`;
            dateEl.classList.remove('ebr-field-missing');
        }
        if (timeEl) {
            timeEl.value = `${pad(now.getHours())}:${pad(now.getMinutes())}`;
            timeEl.classList.remove('ebr-field-missing');
        }
        // Auto-stamp the Realizó signature in that time-block column if present
        if (dateInputId && dateInputId.startsWith('tiempos_') && dateInputId.endsWith('_fecha')) {
            const sigSuffix = dateInputId.replace(/^tiempos_/, 'tiempo_').replace(/_fecha$/, '_realizo');
            const uInput = document.getElementById(`sig_user_${sigSuffix}`);
            if (uInput && !uInput.value.trim()) {
                updateSignatureDOM(sigSuffix, CURRENT_USER_NAME, formatNowDateTime());
            }
        }
        updateCurrentStepCompletionState(false);
    }

    let missingFieldFocusIdx = -1;

    // --- VALIDACIÓN ESTRICTA DE TODOS LOS CAMPOS DEL PASO ---
    function validateWizardStep(stepNum, highlight = false) {
        const pane = document.getElementById(`wizard_pane_${stepNum}`);
        if (!pane) {
            return { isValid: true, totalRequired: 0, filledCount: 0, missingCount: 0, firstMissingEl: null, missingElements: [] };
        }

        let totalRequired = 0;
        let filledCount = 0;
        let firstMissingEl = null;
        const missingElements = [];

        const markElement = (el, isFilled) => {
            if (!el) return;
            if (isFilled) {
                el.classList.remove('ebr-field-missing', 'ebr-field-missing-focus');
            } else {
                missingElements.push(el);
                if (!firstMissingEl) firstMissingEl = el;
                if (highlight) {
                    el.classList.add('ebr-field-missing');
                }
            }
        };

        if (stepNum === 1) {
            // 1) Al menos una presentación marcada con ✓
            const stChk = pane.querySelector('input[type="checkbox"][name="payload[presentacion_st]"]');
            const vtChk = pane.querySelector('input[type="checkbox"][name="payload[presentacion_vt]"]');
            const exChk = pane.querySelector('input[type="checkbox"][name="payload[presentacion_extra_chk]"]');
            const exProd = pane.querySelector('input[name="payload[presentacion_extra_prod]"]');
            const exTipo = pane.querySelector('input[name="payload[presentacion_extra_tipo]"]');

            totalRequired++;
            const anyPresChecked = Boolean((stChk && stChk.checked) || (vtChk && vtChk.checked) || (exChk && exChk.checked));
            if (anyPresChecked) {
                filledCount++;
                [stChk, vtChk, exChk].forEach(c => c && c.classList.remove('ebr-field-missing'));
            } else {
                [stChk, vtChk].forEach(c => markElement(c, false));
            }

            // Si la 3ra fila de presentación se marca o tiene texto, exigir sus campos
            const extraUsed = Boolean((exChk && exChk.checked) || (exProd && exProd.value.trim() !== '') || (exTipo && exTipo.value.trim() !== ''));
            if (extraUsed) {
                [exProd, exTipo].forEach(inp => {
                    if (!inp) return;
                    totalRequired++;
                    const ok = inp.value.trim() !== '';
                    if (ok) filledCount++;
                    markElement(inp, ok);
                });
                if (exChk) {
                    totalRequired++;
                    const okChk = exChk.checked;
                    if (okChk) filledCount++;
                    markElement(exChk, okChk);
                }
            } else {
                [exProd, exTipo, exChk].forEach(el => el && el.classList.remove('ebr-field-missing'));
            }

            // 2) Los 6 renglones de Personal Involucrado y sus firmas
            for (let i = 1; i <= 6; i++) {
                const nameInp = document.getElementById(`personal_nombre_${i}`);
                if (nameInp) {
                    totalRequired++;
                    const ok = nameInp.value.trim() !== '';
                    if (ok) filledCount++;
                    markElement(nameInp, ok);
                }
            }
        } else {
            // Pasos 2 al 7: Validar todos los inputs (date, time, text, number), selects y textareas
            const controls = pane.querySelectorAll('input:not([type="hidden"]):not([type="checkbox"]):not([type="radio"]):not([type="file"]), select, textarea');
            controls.forEach(ctrl => {
                // En Paso 7, la descripción de desviación solo es obligatoria cuando "SI" está seleccionado
                if (ctrl.name === 'payload[desviacion][descripcion]') {
                    const desvSi = document.getElementById('desv_si');
                    if (!desvSi || !desvSi.checked) {
                        ctrl.classList.remove('ebr-field-missing');
                        return;
                    }
                }
                totalRequired++;
                const ok = String(ctrl.value || '').trim() !== '';
                if (ok) filledCount++;
                markElement(ctrl, ok);
            });

            // Validar grupos de radio buttons si existen (ej. Desviación SI/NO en Paso 7)
            const radioNames = new Set();
            pane.querySelectorAll('input[type="radio"]').forEach(r => {
                if (r.name) radioNames.add(r.name);
            });
            radioNames.forEach(rName => {
                totalRequired++;
                const radios = Array.from(pane.querySelectorAll(`input[type="radio"][name="${CSS.escape(rName)}"]`));
                const anyChecked = radios.some(r => r.checked);
                if (anyChecked) {
                    filledCount++;
                    radios.forEach(r => r.classList.remove('ebr-field-missing'));
                } else {
                    radios.forEach(r => markElement(r, false));
                }
            });
        }

        // Validar TODAS las cajas de firma (Realizó y Verificó) dentro del paso
        const sigWidgets = pane.querySelectorAll('.ebr-sig-widget');
        sigWidgets.forEach(widget => {
            const sigKey = widget.dataset.sigKey;
            const uInput = sigKey ? document.getElementById(`sig_user_${sigKey}`) : null;
            totalRequired++;
            const ok = Boolean(uInput && uInput.value.trim() !== '');
            if (ok) filledCount++;
            markElement(widget, ok);
        });

        const missingCount = Math.max(0, totalRequired - filledCount);
        return {
            isValid: missingCount === 0,
            totalRequired,
            filledCount,
            missingCount,
            firstMissingEl,
            missingElements,
        };
    }

    function goToNextMissingField() {
        const res = updateCurrentStepCompletionState(true);
        if (res.isValid || !res.missingElements || res.missingElements.length === 0) {
            return;
        }

        missingFieldFocusIdx = (missingFieldFocusIdx + 1) % res.missingElements.length;
        const targetEl = res.missingElements[missingFieldFocusIdx];
        if (!targetEl) return;

        document.querySelectorAll('.ebr-field-missing-focus').forEach(el => el.classList.remove('ebr-field-missing-focus'));
        targetEl.classList.add('ebr-field-missing-focus');

        targetEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
        if (typeof targetEl.focus === 'function' && !targetEl.classList.contains('ebr-sig-widget')) {
            setTimeout(() => targetEl.focus(), 220);
        }
    }

    function updateCurrentStepCompletionState(highlight = false) {
        const res = validateWizardStep(currentWizardStep, highlight);
        const statusBadge = document.getElementById('stepCompletionStatusBadge');
        const btnNext = document.getElementById('btnNextStep');
        const btnFin = document.getElementById('btnFinishWizard');
        const nextLockIcon = document.getElementById('btnNextStepLockIcon');
        const finLockIcon = document.getElementById('btnFinishLockIcon');
        const alertBox = document.getElementById('stepValidationAlert');

        if (statusBadge) {
            if (res.isValid) {
                statusBadge.style.background = 'linear-gradient(180deg, rgba(220, 252, 231, 0.92) 0%, rgba(187, 247, 208, 0.78) 100%)';
                statusBadge.style.color = '#166534';
                statusBadge.style.borderColor = '#86efac';
                statusBadge.innerHTML = `<i class="bi bi-check-circle-fill me-1" style="color:#16a34a;"></i><span>Paso ${currentWizardStep} completo (${res.filledCount}/${res.totalRequired}) · Ya puedes avanzar</span>`;
            } else {
                statusBadge.style.background = 'linear-gradient(180deg, rgba(254, 243, 199, 0.92) 0%, rgba(253, 230, 138, 0.78) 100%)';
                statusBadge.style.color = '#92400e';
                statusBadge.style.borderColor = '#fcd34d';
                statusBadge.innerHTML = `<i class="bi bi-exclamation-triangle-fill me-1" style="color:#d97706;"></i><span>Faltan <strong>${res.missingCount}</strong> de ${res.totalRequired} campos por llenar para avanzar <u class="ms-1">(ir al campo)</u></span>`;
            }
        }

        if (btnNext) {
            btnNext.classList.toggle('wiz-btn-incomplete', !res.isValid);
            if (nextLockIcon) nextLockIcon.classList.toggle('d-none', res.isValid);
        }
        if (btnFin) {
            btnFin.classList.toggle('wiz-btn-incomplete', !res.isValid);
            if (finLockIcon) finLockIcon.classList.toggle('d-none', res.isValid);
        }

        if (res.isValid && alertBox) {
            alertBox.classList.add('d-none');
        }

        // Calcular el porcentaje real de avance global sumando los 7 pasos (nunca llega a 100% si falta algún campo en cualquiera de los 7 pasos)
        let globalRequired = 0;
        let globalFilled = 0;
        let allSevenComplete = true;
        for (let s = 1; s <= 7; s++) {
            const stepCheck = (s === currentWizardStep) ? res : validateWizardStep(s, false);
            globalRequired += stepCheck.totalRequired;
            globalFilled += stepCheck.filledCount;
            if (!stepCheck.isValid) {
                allSevenComplete = false;
            }
        }

        const stInput = document.getElementById('wizardStatusSelect');
        const isFinalized = stInput && stInput.value === 'Finalizado' && allSevenComplete;
        const globalPct = isFinalized
            ? 100
            : (globalRequired > 0 ? Math.min(99, Math.max(5, Math.round((globalFilled / globalRequired) * 100))) : 5);

        const bar = document.getElementById('topProgressBar');
        const txt = document.getElementById('topProgressText');
        const pctHidden = document.getElementById('wizard_progress_pct_input');
        const printBtn = document.getElementById('btnWizardPrintPdf');

        if (bar) bar.style.width = `${globalPct}%`;
        if (txt) txt.textContent = `${globalPct}%`;
        if (pctHidden) pctHidden.value = String(globalPct);
        if (printBtn) printBtn.classList.toggle('d-none', !allSevenComplete);

        return res;
    }

    function initStepValidationListeners() {
        const form = document.getElementById('batchWizardForm');
        if (!form) return;

        const onFieldModified = (e) => {
            if (e.target && e.target.classList) {
                if (String(e.target.value || '').trim() !== '' || e.target.checked) {
                    e.target.classList.remove('ebr-field-missing');
                }
            }
            updateCurrentStepCompletionState(false);
        };

        form.addEventListener('input', onFieldModified);
        form.addEventListener('change', onFieldModified);
    }

    function showStepIncompleteWarning(stepNum, validationResult) {
        const alertBox = document.getElementById('stepValidationAlert');
        const alertText = document.getElementById('stepValidationAlertText');
        if (alertBox && alertText) {
            alertText.innerHTML = `No se puede avanzar al siguiente paso porque faltan <strong>${validationResult.missingCount} campos obligatorios</strong> por completar en el <strong>Paso ${stepNum}</strong> (marcados en rojo). Tu avance actual ha sido guardado automáticamente.`;
            alertBox.classList.remove('d-none');
        }
        if (validationResult.firstMissingEl) {
            validationResult.firstMissingEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
            if (typeof validationResult.firstMissingEl.focus === 'function' && !validationResult.firstMissingEl.classList.contains('ebr-sig-widget')) {
                setTimeout(() => validationResult.firstMissingEl.focus(), 250);
            }
        }
    }

    function saveCurrentStepOnly() {
        document.getElementById('current_step_input').value = currentWizardStep;
        document.getElementById('next_step_input').value = currentWizardStep;
        saveProgressAjax();
    }

    function attemptFinishWizard() {
        for (let s = 1; s <= 7; s++) {
            const check = validateWizardStep(s, true);
            if (!check.isValid) {
                if (s !== currentWizardStep) {
                    switchWizardStep(s, true);
                }
                updateCurrentStepCompletionState(true);
                saveCurrentStepOnly();
                showStepIncompleteWarning(s, check);
                return;
            }
        }
        document.getElementById('next_step_input').value = 7;
        const stSel = document.getElementById('wizardStatusSelect');
        if (stSel) stSel.value = 'Finalizado';
        const pctHidden = document.getElementById('wizard_progress_pct_input');
        if (pctHidden) pctHidden.value = '100';
        document.getElementById('batchWizardForm')?.submit();
    }

    // --- WIZARD STEP NAVIGATION ---
    function switchWizardStep(stepNum, skipValidation = false) {
        if (!skipValidation && stepNum > currentWizardStep) {
            // Verificar que todos los pasos desde el actual hasta stepNum - 1 estén completos
            for (let s = currentWizardStep; s < stepNum; s++) {
                const check = validateWizardStep(s, true);
                if (!check.isValid) {
                    if (s !== currentWizardStep) {
                        switchWizardStep(s, true);
                    }
                    updateCurrentStepCompletionState(true);
                    saveCurrentStepOnly();
                    showStepIncompleteWarning(s, check);
                    return false;
                }
            }
        }

        currentWizardStep = stepNum;
        missingFieldFocusIdx = -1;
        document.getElementById('current_step_input').value = stepNum;
        document.getElementById('next_step_input').value = stepNum;

        if (!allStepsVisible) {
            document.querySelectorAll('.wizard-step-pane').forEach(pane => {
                pane.classList.toggle('d-none', parseInt(pane.dataset.step) !== stepNum);
            });
        } else {
            const targetPane = document.getElementById(`wizard_pane_${stepNum}`);
            if (targetPane) targetPane.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        document.querySelectorAll('.wizard-step-btn').forEach((btn, idx) => {
            btn.classList.toggle('active', (idx + 1) === stepNum);
        });

        const btnPrev = document.getElementById('btnPrevStep');
        const btnNext = document.getElementById('btnNextStep');
        const btnFin  = document.getElementById('btnFinishWizard');

        if (btnPrev) {
            btnPrev.classList.toggle('disabled', stepNum <= 1);
            btnPrev.classList.toggle('opacity-50', stepNum <= 1);
            btnPrev.classList.toggle('pe-none', stepNum <= 1);
        }
        if (btnNext) btnNext.classList.toggle('d-none', stepNum >= 7);
        if (btnFin)  btnFin.classList.toggle('d-none', stepNum !== 7);

        updateCurrentStepCompletionState(false);

        const activePane = document.getElementById(`wizard_pane_${stepNum}`);
        if (activePane && typeof refreshLiquidScrollAnimations === 'function') {
            refreshLiquidScrollAnimations(activePane);
        }

        const url = new URL(window.location);
        url.searchParams.set('step', stepNum);
        window.history.replaceState({}, '', url);
        window.scrollTo({ top: 0, behavior: 'smooth' });
        return true;
    }

    function toggleAllStepsView() {
        allStepsVisible = !allStepsVisible;
        const btn = document.getElementById('btnToggleAllSteps');
        document.querySelectorAll('.wizard-step-pane').forEach(pane => {
            if (allStepsVisible) {
                pane.classList.remove('d-none');
            } else {
                pane.classList.toggle('d-none', parseInt(pane.dataset.step) !== currentWizardStep);
            }
        });
        if (typeof refreshLiquidScrollAnimations === 'function') {
            refreshLiquidScrollAnimations(document);
        }
        if (btn) {
            btn.innerHTML = allStepsVisible
                ? '<i class="bi bi-Segmented-nav me-1"></i>Modo Paso por Paso'
                : '<i class="bi bi-view-stacked me-1"></i>Ver 14 Págs. Juntas';
        }
    }

    function navigateAndSaveStep(delta) {
        if (delta > 0) {
            const res = updateCurrentStepCompletionState(true);
            if (!res.isValid) {
                saveCurrentStepOnly();
                showStepIncompleteWarning(currentWizardStep, res);
                return;
            }
        }
        const target = Math.max(1, Math.min(7, currentWizardStep + delta));
        const switched = switchWizardStep(target, delta < 0);
        if (switched !== false) {
            saveProgressAjax();
        }
    }

    function saveProgressAjax() {
        updateCurrentStepCompletionState(false);
        const form = document.getElementById('batchWizardForm');
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(r => r.json())
        .then(data => {
            if (data.ok) {
                const badge = document.getElementById('saveToastBadge');
                if (badge) {
                    badge.classList.remove('d-none');
                    setTimeout(() => badge.classList.add('d-none'), 3000);
                }
                updateCurrentStepCompletionState(false);
            }
        })
        .catch(err => console.error('Error guardando avance:', err));
    }

    // --- FIRMA AUTOMÁTICA (NOMBRE, FECHA Y HORA SIN DIBUJO) ---
    function initAutoSignatures() {
        // Si la fila 1 de Personal Involucrado ya tiene nombre pero aún no tiene sello de firma, sellarlo automáticamente
        const p1Input = document.getElementById('personal_nombre_1');
        const p1SigUser = document.getElementById('sig_user_personal_involucrado_1');
        if (p1Input && p1Input.value.trim() && p1SigUser && !p1SigUser.value.trim()) {
            updateSignatureDOM('personal_involucrado_1', p1Input.value.trim(), formatNowDateTime());
        }

        // Cuando el usuario captura o modifica cualquier campo dentro de una fila (tr),
        // llenar automáticamente la celda de firma (Realizó) de esa misma fila si aún no está firmada
        const form = document.getElementById('batchWizardForm');
        if (!form) return;

        const handleRowInput = (e) => {
            const target = e.target;
            if (!target || target.type === 'hidden') return;
            const tr = target.closest('tr');
            if (!tr) return;

            const sigWidgets = tr.querySelectorAll('.ebr-sig-widget.ebr-cell-blue');
            sigWidgets.forEach(widget => {
                const sigKey = widget.dataset.sigKey;
                const uInput = document.getElementById(`sig_user_${sigKey}`);
                if (sigKey && uInput && !uInput.value.trim()) {
                    updateSignatureDOM(sigKey, CURRENT_USER_NAME, formatNowDateTime());
                }
            });
        };

        form.addEventListener('change', handleRowInput);
        form.addEventListener('input', handleRowInput);
    }

    function quickStampUser(sigKey) {
        let userName = CURRENT_USER_NAME;
        // Si pertenece a Personal Involucrado y no tenía nombre escrito en la columna izquierda, llenarlo también
        if (sigKey && sigKey.startsWith('personal_involucrado_')) {
            const idx = sigKey.replace('personal_involucrado_', '');
            const nameInput = document.getElementById(`personal_nombre_${idx}`);
            if (nameInput) {
                if (!nameInput.value.trim()) {
                    nameInput.value = CURRENT_USER_NAME;
                } else {
                    userName = nameInput.value.trim();
                }
            }
        }
        const signedAt = formatNowDateTime();
        updateSignatureDOM(sigKey, userName, signedAt);
        saveProgressAjax();
    }

    function quickStampUserWithCustomName(sigKey, customName) {
        const signedAt = document.getElementById(`sig_date_${sigKey}`)?.value || formatNowDateTime();
        updateSignatureDOM(sigKey, customName || CURRENT_USER_NAME, signedAt);
    }

    function clearSignature(sigKey) {
        updateSignatureDOM(sigKey, '', '');
        saveProgressAjax();
    }

    function updateSignatureDOM(sigKey, userName, signedAt) {
        const uInput = document.getElementById(`sig_user_${sigKey}`);
        const dInput = document.getElementById(`sig_date_${sigKey}`);
        const wInput = document.getElementById(`sig_draw_${sigKey}`);

        if (uInput) uInput.value = userName || '';
        if (dInput) dInput.value = signedAt || '';
        if (wInput) wInput.value = '';

        const txtWrap = document.getElementById(`sig_text_${sigKey}`);
        const clrBtn  = document.getElementById(`sig_clear_btn_${sigKey}`);

        const isSigned = Boolean(userName);
        if (txtWrap) {
            if (isSigned) {
                txtWrap.innerHTML = `<span class="fw-bold d-block" style="color: #0f172a; font-size: 0.84rem;">${userName}</span><span class="text-secondary fw-medium d-block" style="font-size: 0.74rem;">${signedAt}</span>`;
            } else {
                txtWrap.innerHTML = `<span class="text-muted fst-italic d-print-none" style="font-size: 0.75rem;"><i class="bi bi-clock-history me-1"></i>Automático al capturar / clic</span>`;
            }
        }
        if (clrBtn) {
            clrBtn.classList.toggle('d-none', !isSigned);
        }
        const widgetEl = document.getElementById(`sig_widget_${sigKey}`);
        if (widgetEl && isSigned) {
            widgetEl.classList.remove('ebr-field-missing');
        }
        if (typeof updateCurrentStepCompletionState === 'function') {
            updateCurrentStepCompletionState(false);
        }
    }

    // --- HELPERS FOR PASO 1, PASO 6, CONTAINERS, YIELD & RANGE CHECKS ---
    function syncHeaderFields(field, val) {
        if (field === 'lote') {
            document.querySelectorAll('.ebr-display-lote').forEach(el => el.textContent = val);
        } else if (field === 'op') {
            document.querySelectorAll('.ebr-display-op').forEach(el => el.textContent = val);
        }
    }

    function markAllCumplePaso1() {
        document.querySelectorAll('.paso1-criterio-select, .paso1-col1-select, .paso1-col2-select').forEach(sel => {
            sel.value = 'C';
            sel.classList.remove('ebr-field-missing');
        });

        const f1 = document.getElementById('paso1_col1_fecha');
        const h1 = document.getElementById('paso1_col1_hora');
        const f2 = document.getElementById('paso1_col2_fecha');
        const h2 = document.getElementById('paso1_col2_hora');
        if (f1 && !f1.value) fillNowDateTime('paso1_col1_fecha', 'paso1_col1_hora');
        if (f2 && !f2.value) fillNowDateTime('paso1_col2_fecha', 'paso1_col2_hora');

        const nowStamp = formatNowDateTime();
        updateSignatureDOM('p1_paso1_realizo_col1', CURRENT_USER_NAME, nowStamp);
        updateSignatureDOM('p1_paso1_realizo_col2', CURRENT_USER_NAME, nowStamp);
        updateCurrentStepCompletionState(false);
        saveProgressAjax();
    }

    function copyTheoreticalWeightsToPhysical() {
        document.querySelectorAll('.mp-fisica-input').forEach(inp => {
            if (!inp.value.trim() && inp.dataset.theoretical) {
                inp.value = inp.dataset.theoretical;
                inp.classList.remove('ebr-field-missing');
            }
        });
        updateSignatureDOM('p1_paso6_mp_realizo', CURRENT_USER_NAME, formatNowDateTime());
        updateCurrentStepCompletionState(false);
    }

    function recalculateContainersAndYield() {
        let totalNeto = 0;
        let hasAnyContainer = false;

        const parseNum = (val) => {
            if (val === undefined || val === null || String(val).trim() === '') return NaN;
            return parseFloat(String(val).replace(',', '.'));
        };

        for (let c = 1; c <= 5; c++) {
            const brutoEl = document.getElementById(`cont_${c}_bruto`);
            const taraEl  = document.getElementById(`cont_${c}_tara`);
            const netoEl  = document.getElementById(`cont_${c}_neto`);
            if (!brutoEl || !taraEl || !netoEl) continue;

            const b = parseNum(brutoEl.value);
            const t = parseNum(taraEl.value);
            if (!isNaN(b) || !isNaN(t)) {
                hasAnyContainer = true;
                const brutoVal = isNaN(b) ? 0 : b;
                const taraVal  = isNaN(t) ? 0 : t;
                const neto = brutoVal - taraVal;
                netoEl.value = neto.toFixed(3);
                totalNeto += neto;
            } else {
                netoEl.value = '';
            }
        }

        const totalEl = document.getElementById('cont_total_neto');
        const pesoObtenido1 = document.getElementById('rend_peso_obtenido_1');
        if (hasAnyContainer) {
            if (totalEl) totalEl.value = totalNeto.toFixed(3);
            if (pesoObtenido1) pesoObtenido1.value = totalNeto.toFixed(3);
        } else {
            if (totalEl) totalEl.value = '';
            if (pesoObtenido1) pesoObtenido1.value = '';
        }
        recalculateYieldFromVariables();
    }

    function recalculateYieldFromVariables() {
        const parseNum = (val) => {
            if (val === undefined || val === null || String(val).trim() === '') return NaN;
            return parseFloat(String(val).replace(',', '.'));
        };

        const p1Raw = document.getElementById('rend_peso_obtenido_1')?.value;
        const p2Raw = document.getElementById('rend_peso_muestras_2')?.value;
        const p3Raw = document.getElementById('rend_peso_teorico_3')?.value;

        const p1 = parseNum(p1Raw);
        const p2 = parseNum(p2Raw);
        const p3 = parseNum(p3Raw);

        const live1 = document.getElementById('formula_live_1');
        const live2 = document.getElementById('formula_live_2');
        const live3 = document.getElementById('formula_live_3');

        if (live1) live1.textContent = !isNaN(p1) ? p1.toFixed(3) : '0.000';
        if (live2) live2.textContent = !isNaN(p2) ? p2.toFixed(3) : '0.000';
        if (live3) live3.textContent = !isNaN(p3) ? p3.toFixed(3) : '500.000';

        const outEl = document.getElementById('rendimiento_porcentaje_final');
        if (!outEl) return;

        const samplesVal = isNaN(p2) ? 0 : p2;
        if ((!isNaN(p1) || (!isNaN(p2) && p2 > 0)) && !isNaN(p3) && p3 > 0) {
            const netVal = isNaN(p1) ? 0 : p1;
            const yieldPct = ((netVal + samplesVal) / p3) * 100;
            outEl.value = yieldPct.toFixed(2);
            outEl.classList.remove('ebr-field-missing');
            validateRangeElement(outEl);
        } else {
            outEl.value = '';
            outEl.classList.remove('out-of-spec', 'in-spec');
        }
        if (typeof updateCurrentStepCompletionState === 'function') {
            updateCurrentStepCompletionState(false);
        }
    }

    function initRangeChecks() {
        document.querySelectorAll('.ebr-range-check').forEach(inp => {
            validateRangeElement(inp);
            inp.addEventListener('input', () => validateRangeElement(inp));
        });
    }

    function validateRangeElement(inp) {
        const raw = (inp.value || '').replace(',', '.');
        const match = raw.match(/-?\d+(\.\d+)?/);
        inp.classList.remove('out-of-spec', 'in-spec');
        if (!match) return;

        const val = parseFloat(match[0]);
        const min = parseFloat(inp.dataset.min);
        const max = parseFloat(inp.dataset.max);
        if (isNaN(val)) return;

        if ((!isNaN(min) && val < min) || (!isNaN(max) && val > max)) {
            inp.classList.add('out-of-spec');
            inp.title = `Fuera de especificación (${min} a ${max}). Requiere desviación.`;
        } else {
            inp.classList.add('in-spec');
            inp.title = 'Dentro de especificación';
        }
    }
</script>
@endpush
