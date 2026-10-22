@extends('layouts.app')

@section('title', 'Inicio • Procedimiento de Fabricación | Grimann • Sanfer')
@section('topbar_title', 'Procedimiento de Fabricación')
@section('topbar_subtitle', 'Planta Farmacéutica • Grimann • Sanfer')

@push('styles')
<style>
    /* ==========================================================================
       3D LIQUID GLASS KIT — PORTAL & DASHBOARD COMPONENTS (BRAND COLORS PRESERVED)
       ========================================================================== */

    .min-hero-banner {
        background: var(--glass-white-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border-radius: 28px;
        border: var(--glass-border);
        box-shadow: var(--glass-shadow);
        padding: 2.3rem 2.6rem;
        position: relative;
        overflow: hidden;
        transition:
            transform 0.34s var(--hig-spring),
            box-shadow 0.34s var(--hig-spring),
            background 0.25s ease;
    }

    .min-hero-banner:hover {
        transform: translateY(-2px) scale(1.006);
        box-shadow: var(--glass-shadow-hover);
    }

    .min-hero-banner::before {
        content: '';
        position: absolute;
        top: 18px;
        bottom: 18px;
        left: 0;
        width: 5px;
        border-radius: 0 99px 99px 0;
        background: linear-gradient(180deg, #666F88 0%, #8990a2 100%);
        box-shadow: 2px 0 12px rgba(102, 111, 136, 0.35);
    }

    .min-pill-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.36rem 0.95rem;
        border-radius: 9999px;
        background: var(--glass-accent-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: 1.5px solid rgba(255, 255, 255, 0.85);
        box-shadow:
            0 8px 18px -4px rgba(45, 55, 72, 0.12),
            inset 0 2px 2px rgba(255, 255, 255, 0.95),
            inset 0 -2px 4px rgba(102, 111, 136, 0.12);
        color: #2d3748;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.055em;
        text-transform: uppercase;
        margin-bottom: 0.85rem;
    }

    .min-pill-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #666F88;
        box-shadow: 0 0 0 3px rgba(102, 111, 136, 0.22);
    }

    .min-hero-greeting {
        font-size: clamp(1.7rem, 2.5vw, 2.3rem);
        font-weight: 700;
        color: #2d3748;
        letter-spacing: -0.03em;
        line-height: 1.15;
        margin-bottom: 0.65rem;
    }

    .min-hero-name {
        background: linear-gradient(90deg, #2d3748 0%, #666F88 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
    }

    .min-hero-sub {
        font-size: 0.96rem;
        color: #4a5568;
        max-width: 720px;
        line-height: 1.55;
        margin-bottom: 0;
        letter-spacing: -0.01em;
    }

    /* 3D Liquid Glass Bento Squircle Cards */
    .bento-card {
        background: var(--glass-white-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border-radius: 26px;
        border: var(--glass-border);
        box-shadow: var(--glass-shadow);
        padding: 1.55rem 1.7rem;
        transition:
            transform 0.28s var(--hig-spring),
            box-shadow 0.28s var(--hig-spring),
            background 0.22s ease,
            border-color 0.22s ease;
        cursor: pointer;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        user-select: none;
    }

    /* Iridescent Rose/Slate Liquid Glass Card Variant */
    .bento-card.bento-card-accent {
        background: var(--glass-accent-bg);
    }

    .bento-card:hover {
        transform: translateY(-4px) scale(1.012);
        background: var(--glass-white-hover);
        border-color: rgba(255, 255, 255, 0.95);
        box-shadow: var(--glass-shadow-hover);
    }

    .bento-card.bento-card-accent:hover {
        background: var(--glass-accent-hover);
    }

    .bento-card:active {
        transform: scale(0.98);
        transition-duration: 0.1s;
    }

    .bento-icon {
        width: 46px;
        height: 46px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.95) 0%, rgba(243, 232, 237, 0.72) 100%);
        backdrop-filter: var(--glass-blur);
        color: #2d3748;
        border: 1.5px solid rgba(255, 255, 255, 0.92);
        box-shadow:
            0 10px 20px -4px rgba(45, 55, 72, 0.15),
            inset 0 2px 3px rgba(255, 255, 255, 1),
            inset 0 -2px 5px rgba(102, 111, 136, 0.12);
        transition: all 0.28s var(--hig-spring);
    }

    .bento-card:hover .bento-icon {
        background: linear-gradient(180deg, #788199 0%, #2d3748 100%);
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.75);
        box-shadow:
            0 12px 24px -4px rgba(45, 55, 72, 0.32),
            inset 0 2px 3px rgba(255, 255, 255, 0.55);
        transform: scale(1.06);
    }

    .bento-value {
        font-size: 1.85rem;
        font-weight: 800;
        color: #2d3748;
        letter-spacing: -0.03em;
        line-height: 1.08;
    }

    /* 3D Liquid Glass Row Item */
    .recent-row-item {
        background: var(--glass-accent-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: 1.5px solid rgba(255, 255, 255, 0.85);
        border-radius: 22px;
        padding: 1.05rem 1.35rem;
        box-shadow:
            0 14px 28px -6px rgba(45, 55, 72, 0.13),
            inset 0 2px 3px rgba(255, 255, 255, 0.92),
            inset 0 -2px 6px rgba(102, 111, 136, 0.12);
        transition:
            transform 0.26s var(--hig-spring),
            box-shadow 0.26s var(--hig-spring),
            background 0.2s ease,
            border-color 0.2s ease;
    }

    .recent-row-item:hover {
        background: var(--glass-accent-hover);
        border-color: rgba(255, 255, 255, 0.98);
        transform: translateY(-2px) scale(1.008);
        box-shadow: var(--glass-shadow-hover);
    }

    /* 3D Liquid Glass Jelly Pill Buttons (Matches top-left buttons of Liquid Glass Kit) */
    .btn-wine-pill {
        background: linear-gradient(180deg, rgba(120, 129, 153, 0.92) 0%, rgba(102, 111, 136, 0.88) 48%, rgba(45, 55, 72, 0.95) 100%);
        backdrop-filter: var(--glass-blur);
        color: #ffffff;
        border: 1.5px solid rgba(255, 255, 255, 0.72);
        border-radius: 9999px;
        padding: 0.7rem 1.5rem;
        font-size: 0.88rem;
        font-weight: 600;
        letter-spacing: -0.01em;
        box-shadow:
            0 16px 28px -5px rgba(45, 55, 72, 0.34),
            0 6px 12px -2px rgba(102, 111, 136, 0.22),
            inset 0 3px 5px rgba(255, 255, 255, 0.65),
            inset 0 -3px 6px rgba(243, 232, 237, 0.3);
        transition:
            transform 0.24s var(--hig-spring),
            box-shadow 0.24s var(--hig-spring),
            background 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.48rem;
    }

    .btn-wine-pill:hover {
        background: linear-gradient(180deg, #788199 0%, #565f75 48%, #1e2633 100%);
        color: #ffffff;
        transform: translateY(-2px) scale(1.015);
        box-shadow:
            0 20px 34px -5px rgba(45, 55, 72, 0.42),
            inset 0 3px 5px rgba(255, 255, 255, 0.78);
    }

    .btn-wine-pill:active {
        transform: scale(0.98) !important;
        transition-duration: 0.08s;
    }

    .btn-outline-wine-pill {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.92) 0%, rgba(243, 232, 237, 0.68) 100%);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        color: #2d3748;
        border: 1.5px solid rgba(255, 255, 255, 0.9);
        border-radius: 9999px;
        padding: 0.68rem 1.4rem;
        font-size: 0.88rem;
        font-weight: 600;
        letter-spacing: -0.01em;
        box-shadow:
            0 14px 26px -5px rgba(45, 55, 72, 0.14),
            inset 0 2.5px 3px rgba(255, 255, 255, 1),
            inset 0 -2px 5px rgba(102, 111, 136, 0.12);
        transition:
            transform 0.24s var(--hig-spring),
            box-shadow 0.24s var(--hig-spring),
            background 0.2s ease,
            color 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.48rem;
    }

    .btn-outline-wine-pill:hover {
        background: #ffffff;
        color: #2d3748;
        transform: translateY(-2px) scale(1.015);
        box-shadow: var(--glass-shadow-hover);
    }

    .btn-outline-wine-pill:active {
        transform: scale(0.98) !important;
    }

    .section-card {
        background: var(--glass-white-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border-radius: 26px;
        border: var(--glass-border);
        box-shadow: var(--glass-shadow);
    }

    /* Smooth Liquid Glass Progress Bar */
    .hig-progress-track {
        height: 9px;
        background: rgba(255, 255, 255, 0.72);
        border: 1px solid rgba(255, 255, 255, 0.85);
        box-shadow: inset 0 1.5px 3px rgba(45, 55, 72, 0.12);
        border-radius: 999px;
        overflow: hidden;
    }

    .hig-progress-fill {
        height: 100%;
        width: 0%;
        border-radius: 999px;
        background: linear-gradient(90deg, #2d3748 0%, #666F88 60%, #8990a2 100%);
        box-shadow: inset 0 1.5px 2px rgba(255, 255, 255, 0.5);
        transition: width 1.05s var(--hig-ease-in-out);
        position: relative;
    }

    /* 3D Tactile Circular Icon Button (Like the circular + and > buttons in Liquid Glass Kit) */
    .hig-icon-btn {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1.5px solid rgba(255, 255, 255, 0.92);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(243, 232, 237, 0.74) 100%);
        backdrop-filter: var(--glass-blur);
        color: #2d3748;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow:
            0 10px 20px -4px rgba(45, 55, 72, 0.18),
            inset 0 2px 2px rgba(255, 255, 255, 1),
            inset 0 -2px 4px rgba(102, 111, 136, 0.14);
        transition: all 0.24s var(--hig-spring);
    }
    .hig-icon-btn:hover {
        background: #ffffff;
        color: #2d3748;
        transform: translateY(-2px) scale(1.06);
        box-shadow:
            0 14px 24px -4px rgba(45, 55, 72, 0.24),
            inset 0 2px 3px rgba(255, 255, 255, 1);
    }
    .hig-icon-btn:active {
        transform: scale(0.95);
    }

    /* =========================================================================
       VISTA ÓRDENES DE PRODUCCIÓN — 3D LIQUID GLASS KIT
       ========================================================================= */
    .tc-top-banner {
        background: linear-gradient(165deg, rgba(64, 76, 98, 0.88) 0%, rgba(45, 55, 72, 0.84) 55%, rgba(33, 41, 54, 0.92) 100%);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: 1.5px solid rgba(255, 255, 255, 0.55);
        border-radius: 24px;
        padding: 0.95rem 1.45rem;
        color: #ffffff;
        box-shadow:
            0 18px 34px -6px rgba(45, 55, 72, 0.26),
            inset 0 2.5px 3px rgba(255, 255, 255, 0.45),
            inset 0 -3px 6px rgba(0, 0, 0, 0.22);
    }

    .tc-top-title {
        font-size: 0.96rem;
        font-weight: 700;
        letter-spacing: 0.03em;
        text-transform: uppercase;
        margin: 0;
        color: #ffffff;
    }

    /* 3D Capsule Search Input (Matches "Create workspace" / "Search projects..." in Liquid Glass Kit) */
    .tc-search-box {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.94) 0%, rgba(248, 249, 252, 0.82) 100%);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: 1.5px solid rgba(255, 255, 255, 0.95);
        border-radius: 999px;
        padding: 0.58rem 1.15rem;
        box-shadow:
            0 14px 26px -5px rgba(45, 55, 72, 0.14),
            inset 0 2px 3px rgba(255, 255, 255, 1),
            inset 0 -2px 5px rgba(102, 111, 136, 0.10);
        display: flex;
        align-items: center;
        gap: 0.65rem;
        transition: all 0.22s var(--hig-spring);
    }

    .tc-search-box:focus-within {
        background: #ffffff;
        border-color: #ffffff;
        transform: translateY(-1px);
        box-shadow:
            0 18px 32px -5px rgba(45, 55, 72, 0.20),
            0 0 0 3px rgba(243, 232, 237, 0.7),
            inset 0 2px 3px rgba(255, 255, 255, 1);
    }

    .tc-search-box input {
        border: none;
        background: transparent;
        outline: none;
        width: 100%;
        font-size: 0.86rem;
        font-weight: 500;
        color: #2d3748;
    }

    .tc-search-box input::placeholder {
        color: #788199;
    }

    .tc-select-control {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.92) 0%, rgba(243, 232, 237, 0.68) 100%);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: 1.5px solid rgba(255, 255, 255, 0.92);
        border-radius: 999px;
        padding: 0.56rem 1.1rem;
        font-size: 0.83rem;
        font-weight: 600;
        color: #2d3748;
        box-shadow:
            0 14px 26px -5px rgba(45, 55, 72, 0.13),
            inset 0 2px 3px rgba(255, 255, 255, 1),
            inset 0 -2px 4px rgba(102, 111, 136, 0.10);
        outline: none;
        transition: all 0.2s var(--hig-spring);
    }

    .tc-select-control:hover,
    .tc-select-control:focus {
        background: #ffffff;
        transform: translateY(-1px);
        box-shadow: var(--glass-shadow-hover);
    }

    /* 3D Liquid Glass Filter Tabs (Matches "Toast | Tabs" pills in Liquid Glass Kit) */
    .tc-filter-tab {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.85) 0%, rgba(243, 232, 237, 0.62) 100%);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: 1.5px solid rgba(255, 255, 255, 0.88);
        border-radius: 999px;
        padding: 0.48rem 1.05rem;
        font-size: 0.81rem;
        font-weight: 600;
        color: #4a5568;
        cursor: pointer;
        transition: all 0.24s var(--hig-spring);
        box-shadow:
            0 12px 22px -5px rgba(45, 55, 72, 0.14),
            inset 0 2px 3px rgba(255, 255, 255, 0.98),
            inset 0 -2px 4px rgba(102, 111, 136, 0.10);
    }

    .tc-filter-tab:hover {
        transform: translateY(-2px) scale(1.015);
        background: #ffffff;
        color: #2d3748;
        box-shadow:
            0 16px 28px -5px rgba(45, 55, 72, 0.18),
            inset 0 2px 3px rgba(255, 255, 255, 1);
    }

    .tc-filter-tab.active {
        background: linear-gradient(180deg, rgba(120, 129, 153, 0.92) 0%, rgba(62, 74, 96, 0.94) 52%, rgba(45, 55, 72, 0.98) 100%);
        border-color: rgba(255, 255, 255, 0.75);
        color: #ffffff;
        box-shadow:
            0 14px 26px -4px rgba(45, 55, 72, 0.34),
            inset 0 2.5px 4px rgba(255, 255, 255, 0.62),
            inset 0 -3px 6px rgba(243, 232, 237, 0.25);
    }

    .tc-tab-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 23px;
        height: 19px;
        padding: 0 6px;
        border-radius: 999px;
        font-size: 0.71rem;
        font-weight: 700;
        background: rgba(102, 111, 136, 0.15);
        color: #2d3748;
    }

    .tc-filter-tab.active .tc-tab-badge {
        background: rgba(255, 255, 255, 0.24);
        color: #ffffff;
    }

    .tc-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        display: inline-block;
    }
    .tc-dot-amber { background: #8990a2; }
    .tc-dot-green { background: #666F88; }
    .tc-dot-blue  { background: #2d3748; }
    .tc-filter-tab.active .tc-dot { background: #ffffff; }

    .tc-selection-bar {
        background: var(--glass-accent-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: 1.5px solid rgba(255, 255, 255, 0.85);
        border-radius: 22px;
        padding: 0.75rem 1.25rem;
        box-shadow: var(--glass-shadow);
    }

    .tc-table-card {
        background: var(--glass-white-bg);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: var(--glass-border);
        border-radius: 26px;
        box-shadow: var(--glass-shadow);
        overflow: hidden;
    }

    .tc-table {
        --bs-table-bg: transparent;
    }

    .tc-table thead th {
        font-size: 0.71rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #666F88;
        padding: 1rem 1rem;
        border-bottom: 1.5px solid rgba(255, 255, 255, 0.72);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.65) 0%, rgba(243, 232, 237, 0.38) 100%);
        white-space: nowrap;
    }

    .tc-op-row {
        cursor: pointer;
    }

    .tc-op-row.selected-row {
        background: rgba(255, 255, 255, 0.88) !important;
        border-color: rgba(45, 55, 72, 0.45) !important;
        box-shadow: 0 16px 36px rgba(45, 55, 72, 0.12) !important;
    }

    .tc-checkbox {
        width: 17px;
        height: 17px;
        border-radius: 5px;
        border: 1.5px solid #8990a2;
        accent-color: #2d3748;
        cursor: pointer;
    }

    .tc-op-code {
        font-family: -apple-system, BlinkMacSystemFont, 'SF Pro Display', 'Inter', sans-serif;
        font-weight: 700;
        font-size: 0.87rem;
        color: #2d3748;
        letter-spacing: -0.01em;
        white-space: nowrap;
        display: inline-block;
    }

    .tc-prod-name {
        font-weight: 600;
        font-size: 0.83rem;
        color: #2d3748;
        text-transform: uppercase;
        line-height: 1.25;
    }

    .tc-prod-code {
        font-size: 0.74rem;
        color: #788199;
        font-weight: 500;
        margin-top: 2px;
    }

    .tc-lote-code {
        font-size: 0.82rem;
        color: #4a5568;
        font-weight: 600;
        white-space: nowrap;
        display: inline-block;
    }

    .tc-planta-code {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.24rem 0.72rem;
        border-radius: 999px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.92) 0%, rgba(243, 232, 237, 0.65) 100%);
        border: 1px solid rgba(255, 255, 255, 0.85);
        box-shadow: 0 4px 10px rgba(45, 55, 72, 0.08), inset 0 1.5px 2px rgba(255, 255, 255, 1);
        font-size: 0.76rem;
        font-weight: 700;
        color: #2d3748;
    }

    /* Columna de AVANCE (7 pasos / 14 páginas) */
    .tc-avance-wrap {
        min-width: 230px;
        max-width: 310px;
    }

    .tc-step-segments {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 4px;
        margin-top: 5px;
    }

    .tc-step-seg {
        height: 6px;
        border-radius: 999px;
        background: rgba(102, 111, 136, 0.18);
        overflow: hidden;
        transition: background-color 0.3s ease;
    }

    .tc-step-seg.is-done {
        background: linear-gradient(90deg, #2d3748 0%, #666F88 100%);
    }

    .tc-step-seg.is-current {
        background: #8990a2;
    }

    .tc-approve-btn {
        background: linear-gradient(180deg, rgba(120, 129, 153, 0.92) 0%, rgba(62, 74, 96, 0.94) 50%, rgba(45, 55, 72, 0.98) 100%);
        color: #ffffff;
        border: 1.5px solid rgba(255, 255, 255, 0.68);
        border-radius: 999px;
        padding: 0.48rem 1.2rem;
        font-size: 0.8rem;
        font-weight: 600;
        box-shadow:
            0 12px 24px -4px rgba(45, 55, 72, 0.32),
            inset 0 2.5px 4px rgba(255, 255, 255, 0.6),
            inset 0 -2px 5px rgba(243, 232, 237, 0.25);
        transition: all 0.24s var(--hig-spring);
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
    }

    .tc-approve-btn:hover:not(:disabled) {
        transform: translateY(-2px) scale(1.015);
        color: #ffffff;
        box-shadow:
            0 16px 28px -4px rgba(45, 55, 72, 0.40),
            inset 0 3px 5px rgba(255, 255, 255, 0.72);
    }

    .tc-approve-btn:disabled {
        opacity: 0.45;
        cursor: not-allowed;
        box-shadow: none;
    }

    .tc-op-expand-fields {
        display: none;
        margin-top: 0.4rem;
        margin-left: 2.2rem;
        padding: 0.85rem 1.1rem;
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.88) 0%, rgba(243, 232, 237, 0.68) 100%);
        border: 1.5px solid rgba(255, 255, 255, 0.9);
        border-radius: 18px;
        box-shadow:
            0 12px 24px -5px rgba(45, 55, 72, 0.12),
            inset 0 2px 3px rgba(255, 255, 255, 0.98);
        animation: higFadeSlideIn 0.22s var(--hig-spring);
        cursor: default;
    }

    .tc-op-row.selected-row .tc-op-expand-fields {
        display: block;
    }

    @media (max-width: 576px) {
        .tc-op-expand-fields {
            margin-left: 0;
        }
    }

    .tc-inline-label {
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #4a5568;
        margin-bottom: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }

    .tc-inline-input {
        background: rgba(255, 255, 255, 0.96);
        border: 1.5px solid rgba(255, 255, 255, 0.95);
        border-radius: 999px;
        padding: 0.44rem 0.9rem;
        font-size: 0.84rem;
        font-weight: 600;
        color: #1e293b;
        width: 100%;
        box-shadow:
            0 6px 14px -3px rgba(45, 55, 72, 0.10),
            inset 0 1.5px 3px rgba(45, 55, 72, 0.06);
        transition: all 0.18s ease;
    }

    .tc-inline-input:focus {
        outline: none;
        background: #ffffff;
        border-color: #666F88;
        box-shadow: 0 0 0 3px rgba(102, 111, 136, 0.18);
    }

    /* =========================================================================
       TARJETAS "EN PROCESO" — DISEÑO VERTICAL (ESTILO TAXR + LIQUID GLASS)
       Conservando colores de la marca (#2d3748, #666F88, #788199, #F3E8ED, #cfe2f3)
       ========================================================================= */
    .ep-top-pill-nav {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.38rem 1rem;
        border-radius: 999px;
        font-size: 0.76rem;
        font-weight: 700;
        background: rgba(243, 232, 237, 0.78);
        border: 1.5px solid rgba(255, 255, 255, 0.85);
        color: #666F88;
        box-shadow:
            0 8px 18px -4px rgba(45, 55, 72, 0.10),
            inset 0 2px 2px rgba(255, 255, 255, 0.95);
    }

    .ep-top-pill-nav.active {
        background: linear-gradient(135deg, #666F88 0%, #2d3748 100%);
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.7);
        box-shadow:
            0 10px 22px -4px rgba(45, 55, 72, 0.28),
            inset 0 2px 3px rgba(255, 255, 255, 0.45);
    }

    /* Botón blanco flotante tipo "Add invoice" de la imagen de referencia */
    .ep-add-op-capsule {
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
        padding: 0.48rem 1.25rem 0.48rem 0.55rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: var(--glass-blur);
        -webkit-backdrop-filter: var(--glass-blur);
        border: 1.5px solid rgba(255, 255, 255, 0.98);
        color: #2d3748;
        font-size: 0.84rem;
        font-weight: 700;
        box-shadow:
            0 16px 32px -6px rgba(45, 55, 72, 0.16),
            inset 0 2px 3px rgba(255, 255, 255, 1);
        cursor: pointer;
        transition: all 0.26s var(--hig-spring);
    }
    .ep-add-op-capsule:hover {
        background: #ffffff;
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 20px 38px -6px rgba(45, 55, 72, 0.22);
    }
    .ep-add-op-icon {
        width: 34px;
        height: 34px;
        border-radius: 11px;
        background: linear-gradient(145deg, rgba(243, 232, 237, 0.95) 0%, rgba(181, 186, 201, 0.45) 100%);
        color: #2d3748;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
    }

    /* Tarjeta Completamente Transparente de Cristal 3D + Fondo con Color detrás de las Palabras */
    .ep-portrait-card {
        position: relative;
        border-radius: 28px;
        padding: 1.35rem 1.3rem 1.25rem;
        min-height: 292px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.01) 100%) !important;
        backdrop-filter: blur(2px);
        -webkit-backdrop-filter: blur(2px);
        border: 2px solid rgba(255, 255, 255, 0.88);
        box-shadow:
            14px 22px 34px -6px rgba(45, 55, 72, 0.22),
            6px 10px 18px -4px rgba(102, 111, 136, 0.16),
            inset 0 2px 4px rgba(255, 255, 255, 0.92),
            inset 0 -3px 8px rgba(255, 255, 255, 0.55),
            inset 2px 0 6px rgba(255, 255, 255, 0.55);
        cursor: pointer;
        overflow: hidden;
        transition:
            transform 0.34s var(--hig-spring),
            box-shadow 0.34s var(--hig-spring),
            border-color 0.24s ease;
    }

    /* Borde interno de grosor de cristal 3D completamente transparente */
    .ep-portrait-card::after {
        content: '';
        position: absolute;
        inset: 3px;
        border-radius: 23px;
        border: 1px solid rgba(255, 255, 255, 0.52);
        box-shadow:
            inset -4px -4px 12px rgba(255, 255, 255, 0.35),
            inset 3px 3px 8px rgba(255, 255, 255, 0.45);
        pointer-events: none;
        z-index: 0;
    }

    .ep-portrait-card > * {
        position: relative;
        z-index: 1;
    }

    .ep-portrait-card:hover {
        transform: translateY(-8px) scale(1.016);
        border-color: #ffffff;
        box-shadow:
            18px 28px 44px -6px rgba(45, 55, 72, 0.30),
            8px 14px 22px -4px rgba(102, 111, 136, 0.22),
            inset 0 3px 5px rgba(255, 255, 255, 1),
            inset 0 -4px 12px rgba(255, 255, 255, 0.72);
    }

    /* =========================================================================
       FONDO CON COLOR DETRÁS DE LAS PALABRAS (.ep-words-color-panel)
       Conservando los colores de la plataforma (#F3E8ED, #cfe2f3, #788199, #666F88, #2d3748)
       ========================================================================= */
    .ep-words-color-panel {
        border-radius: 20px;
        padding: 1rem 1.15rem;
        margin: 0.85rem 0;
        border: 1.5px solid rgba(255, 255, 255, 0.88);
        backdrop-filter: blur(16px) saturate(160%);
        -webkit-backdrop-filter: blur(16px) saturate(160%);
        transition: transform 0.28s var(--hig-spring), box-shadow 0.28s var(--hig-spring);
    }

    /* Variante 1 (Fondo de las palabras): Rosa Lavanda (#F3E8ED) -> Azul Hielo (#cfe2f3) -> Pizarra Suave */
    .ep-variant-1 .ep-words-color-panel {
        background: linear-gradient(140deg, rgba(243, 232, 237, 0.96) 0%, rgba(216, 224, 236, 0.94) 55%, rgba(176, 184, 201, 0.92) 100%);
        color: #2d3748;
        box-shadow:
            6px 12px 22px -4px rgba(45, 55, 72, 0.18),
            inset 0 2px 3px rgba(255, 255, 255, 0.98),
            inset 0 -2px 5px rgba(102, 111, 136, 0.14);
    }

    /* Variante 2 (Fondo de las palabras): Slate Profundo (#788199 -> #666F88 -> #2d3748) */
    .ep-variant-2 .ep-words-color-panel {
        background: linear-gradient(142deg, rgba(120, 129, 153, 0.96) 0%, rgba(76, 86, 108, 0.96) 50%, rgba(45, 55, 72, 0.98) 100%);
        color: #ffffff;
        box-shadow:
            6px 12px 24px -4px rgba(45, 55, 72, 0.28),
            inset 0 2px 3px rgba(255, 255, 255, 0.65),
            inset 0 -2px 5px rgba(15, 23, 42, 0.35);
    }

    /* Variante 3 (Fondo de las palabras): Azul Hielo (#cfe2f3) -> Slate Medio (#666F88) */
    .ep-variant-3 .ep-words-color-panel {
        background: linear-gradient(140deg, rgba(207, 226, 243, 0.96) 0%, rgba(163, 177, 198, 0.93) 52%, rgba(102, 111, 136, 0.95) 100%);
        color: #1e293b;
        box-shadow:
            6px 12px 22px -4px rgba(45, 55, 72, 0.20),
            inset 0 2px 3px rgba(255, 255, 255, 0.95),
            inset 0 -2px 5px rgba(45, 55, 72, 0.18);
    }

    /* Insignia Squircle Blanca 3D Superior Izquierda */
    .ep-medallion-circle {
        width: 48px;
        height: 48px;
        border-radius: 15px;
        background: linear-gradient(145deg, #ffffff 0%, #f5eff3 100%);
        border: 1.5px solid #ffffff;
        box-shadow:
            6px 10px 20px -3px rgba(45, 55, 72, 0.22),
            inset 0 2px 3px #ffffff,
            inset 0 -2px 4px rgba(102, 111, 136, 0.14);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #2d3748;
        flex-shrink: 0;
        transition: transform 0.28s var(--hig-spring);
    }
    .ep-portrait-card:hover .ep-medallion-circle {
        transform: scale(1.06) translateY(-1px);
    }

    .ep-medallion-inner-ring {
        width: 36px;
        height: 36px;
        border-radius: 11px;
        background: linear-gradient(145deg, rgba(243, 232, 237, 0.95) 0%, rgba(207, 226, 243, 0.85) 100%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.76rem;
        color: #2d3748;
        line-height: 1;
        box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.9);
    }
    .ep-variant-2 .ep-medallion-inner-ring {
        background: linear-gradient(145deg, #666F88 0%, #2d3748 100%);
        color: #ffffff;
    }

    /* Cápsula de Lote con Fondo de Color (para que el texto Lote tenga color detrás) */
    .ep-lote-pill {
        display: inline-flex;
        align-items: center;
        padding: 0.3rem 0.82rem;
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(243, 232, 237, 0.95) 0%, rgba(207, 226, 243, 0.92) 100%);
        border: 1.5px solid #ffffff;
        box-shadow:
            4px 8px 16px -3px rgba(45, 55, 72, 0.20),
            inset 0 1.5px 3px #ffffff;
        font-size: 0.73rem;
        font-weight: 800;
        color: #2d3748;
    }
    .ep-variant-2 .ep-lote-pill {
        background: linear-gradient(135deg, #666F88 0%, #2d3748 100%);
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.85);
    }

    /* Botón Circular 3D Superior Derecho con fondo de color */
    .ep-mini-print-btn {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.95) 0%, rgba(243, 232, 237, 0.90) 100%);
        border: 1.5px solid #ffffff;
        box-shadow:
            5px 8px 16px -3px rgba(45, 55, 72, 0.22),
            inset 0 2px 3px #ffffff;
        color: #2d3748;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.84rem;
        text-decoration: none;
        transition: all 0.22s var(--hig-spring);
    }
    .ep-mini-print-btn:hover {
        background: #2d3748;
        color: #ffffff;
        transform: scale(1.08);
    }

    /* Textos centrales dentro del panel de color */
    .ep-card-eyebrow {
        font-size: 0.71rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        opacity: 0.84;
        margin-bottom: 0.18rem;
    }

    .ep-card-big-title {
        font-size: 1.45rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        line-height: 1.12;
        margin-bottom: 0.22rem;
    }

    .ep-card-stage-sub {
        font-size: 0.78rem;
        font-weight: 600;
        opacity: 0.92;
    }

    /* Barra Píldora 3D Inferior con Fondo de Color detrás de las palabras */
    .ep-kit-bottom-pill {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.65rem;
        padding: 0.42rem 0.45rem 0.42rem 0.95rem;
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(243, 232, 237, 0.96) 0%, rgba(207, 226, 243, 0.92) 100%);
        border: 1.5px solid #ffffff;
        box-shadow:
            8px 14px 24px -4px rgba(45, 55, 72, 0.22),
            inset 0 2px 3px #ffffff,
            inset 0 -2px 4px rgba(102, 111, 136, 0.12);
        color: #2d3748;
    }

    /* Círculo de check/estado izquierdo dentro de la píldora inferior */
    .ep-kit-status-dot {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: linear-gradient(145deg, #788199 0%, #2d3748 100%);
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.72rem;
        flex-shrink: 0;
        box-shadow:
            2px 4px 8px rgba(45, 55, 72, 0.22),
            inset 0 1px 2px rgba(255, 255, 255, 0.65);
    }

    .ep-card-big-pct {
        font-size: 1.15rem;
        font-weight: 800;
        letter-spacing: -0.02em;
        line-height: 1;
        color: #2d3748;
    }
    .ep-card-big-pct span {
        font-weight: 600;
        font-size: 0.86rem;
        color: #666F88;
    }

    /* Botón Circular 3D acoplado a la derecha de la píldora (como el botón redondo morado/cristal en Liquid Glass Kit) */
    .ep-circle-go-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(145deg, #788199 0%, #4a5568 52%, #2d3748 100%);
        color: #ffffff;
        border: 1.5px solid rgba(255, 255, 255, 0.85);
        box-shadow:
            4px 8px 16px -2px rgba(45, 55, 72, 0.32),
            inset 0 2px 3px rgba(255, 255, 255, 0.65),
            inset 0 -2px 4px rgba(30, 41, 59, 0.4);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
        text-decoration: none;
        transition: all 0.24s var(--hig-spring);
        flex-shrink: 0;
    }
    .ep-circle-go-btn:hover {
        background: linear-gradient(145deg, #666F88 0%, #1e293b 100%);
        color: #ffffff;
        transform: scale(1.08);
        box-shadow:
            6px 10px 20px -2px rgba(45, 55, 72, 0.42),
            inset 0 2px 4px rgba(255, 255, 255, 0.85);
    }

    /* =========================================================================
       ADAPTACIÓN RESPONSIVA (MONITORES GRANDES, LAPTOPS CHICOS, TABLETS, MÓVIL)
       ========================================================================= */
    @media (min-width: 1600px) {
        .min-hero-banner {
            padding: 2.5rem 2.75rem;
        }
        .ep-bento-card {
            padding: 1.45rem 1.5rem;
        }
    }

    @media (max-width: 1399.98px) {
        .min-hero-banner {
            padding: 1.75rem 1.85rem;
        }
        .min-hero-greeting {
            font-size: clamp(1.55rem, 2.2vw, 2rem);
        }
        .tc-top-banner {
            padding: 0.9rem 1.25rem;
        }
    }

    @media (max-width: 991.98px) {
        .min-hero-banner {
            padding: 1.45rem 1.35rem;
            border-radius: 20px;
        }
        .tc-top-banner {
            padding: 0.85rem 1.1rem;
            border-radius: 18px;
        }
        .tc-top-title {
            font-size: 1.1rem;
        }
        .tc-selection-bar {
            padding: 0.75rem 1rem;
        }
    }

    @media (max-width: 575.98px) {
        .min-hero-banner {
            padding: 1.2rem 1rem;
        }
        .btn-wine-pill,
        .btn-outline-wine-pill {
            width: 100%;
            justify-content: center;
        }
        .tc-top-banner {
            flex-direction: column;
            align-items: stretch !important;
            text-align: center;
        }
        .tc-top-banner > div {
            justify-content: center;
        }
        .ep-footer {
            flex-direction: column;
            align-items: stretch;
        }
        .ep-continue-btn {
            width: 100%;
        }
    }

    /* =========================================================================
       PÁGINA DE INICIO — ESCENARIO 3D MINIMALISTA ("INNOVATE / TRANSFORM / THRIVE")
       Con el estilo cristal, colores (#2d3748, #666F88, #788199, #F3E8ED, #cfe2f3) y fondo de la plataforma
       ========================================================================= */
    .stage-hero-portal {
        position: relative;
        min-height: calc(100vh - 122px);
        border-radius: 30px;
        border: 2px solid rgba(255, 255, 255, 0.92);
        background:
            radial-gradient(circle at 78% 18%, rgba(255, 255, 255, 0.75) 0%, transparent 38%),
            radial-gradient(circle at 72% 72%, rgba(207, 226, 243, 0.68) 0%, transparent 48%),
            radial-gradient(circle at 18% 28%, rgba(243, 232, 237, 0.62) 0%, transparent 50%),
            linear-gradient(135deg, rgba(255, 255, 255, 0.24) 0%, rgba(243, 232, 237, 0.18) 48%, rgba(120, 129, 153, 0.22) 100%);
        backdrop-filter: blur(14px) saturate(175%);
        -webkit-backdrop-filter: blur(14px) saturate(175%);
        box-shadow:
            16px 24px 42px -10px rgba(45, 55, 72, 0.22),
            inset 0 2.5px 6px rgba(255, 255, 255, 0.96),
            inset 0 -3px 10px rgba(255, 255, 255, 0.55);
        padding: 2rem 2.8rem 1.25rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
    }
    .stage-hero-portal::after {
        content: '';
        position: absolute;
        inset: 4px;
        border-radius: 25px;
        border: 1px solid rgba(255, 255, 255, 0.58);
        box-shadow:
            inset -4px -4px 14px rgba(255, 255, 255, 0.38),
            inset 3px 3px 10px rgba(255, 255, 255, 0.48);
        pointer-events: none;
        z-index: 0;
    }
    .stage-hero-portal > * {
        position: relative;
        z-index: 1;
    }

    .stage-main-grid {
        display: grid;
        grid-template-columns: 1.05fr 1fr;
        align-items: center;
        gap: 1.5rem;
        flex: 1;
        padding: 0.5rem 0;
    }

    .stage-stacked-headline {
        font-size: clamp(2.5rem, 4.4vw, 4.1rem);
        font-weight: 800;
        line-height: 1.03;
        letter-spacing: -0.04em;
        margin: 0 0 1.15rem 0;
    }
    .stage-stacked-headline span {
        display: block;
        background: linear-gradient(135deg, #1e293b 0%, #2d3748 45%, #565f75 85%, #788199 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 4px 12px rgba(255, 255, 255, 0.65));
    }

    .stage-lead-copy {
        font-size: 0.88rem;
        line-height: 1.6;
        color: #4a5568;
        max-width: 455px;
        margin: 0 0 1.65rem 0;
        font-weight: 500;
    }

    /* Botón Píldora Blanco de Cristal (Idéntico a "Explore our services") */
    .stage-cta-pill {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.55rem;
        padding: 0.72rem 1.85rem;
        border-radius: 999px;
        background: linear-gradient(180deg, #ffffff 0%, #f5eff3 100%);
        border: 1.5px solid #ffffff;
        color: #1e293b;
        font-size: 0.84rem;
        font-weight: 700;
        letter-spacing: -0.01em;
        box-shadow:
            0 14px 28px -6px rgba(45, 55, 72, 0.22),
            0 4px 10px rgba(102, 111, 136, 0.12),
            inset 0 2px 4px #ffffff,
            inset 0 -2px 4px rgba(207, 226, 243, 0.45);
        cursor: pointer;
        text-decoration: none;
        transition: all 0.26s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .stage-cta-pill:hover {
        transform: translateY(-3px) scale(1.02);
        background: #ffffff;
        color: #0f172a;
        box-shadow:
            0 18px 34px -6px rgba(45, 55, 72, 0.28),
            inset 0 2px 4px #ffffff;
    }

    .stage-secondary-pill {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.45rem;
        padding: 0.68rem 1.35rem;
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.55) 0%, rgba(243, 232, 237, 0.38) 100%);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1.5px solid rgba(255, 255, 255, 0.92);
        color: #2d3748;
        font-size: 0.8rem;
        font-weight: 700;
        box-shadow:
            0 10px 20px -6px rgba(45, 55, 72, 0.14),
            inset 0 2px 3px rgba(255, 255, 255, 0.92);
        cursor: pointer;
        transition: all 0.24s ease;
    }
    .stage-secondary-pill:hover {
        background: rgba(255, 255, 255, 0.85);
        transform: translateY(-2px);
    }

    /* Escultura 3D Derecha: Podio Doble + Torres 3D + Nubes Flotantes */
    .stage-diorama-wrap {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 360px;
    }
    .stage-diorama-svg {
        width: 100%;
        max-width: 520px;
        height: auto;
        filter: drop-shadow(0 24px 36px rgba(45, 55, 72, 0.22));
        overflow: visible;
    }

    @keyframes stageCloudFloatSlow {
        0%, 100% { transform: translateY(0px) translateX(0px); }
        50% { transform: translateY(-7px) translateX(3px); }
    }
    @keyframes stageCloudFloatReverse {
        0%, 100% { transform: translateY(0px) translateX(0px); }
        50% { transform: translateY(6px) translateX(-4px); }
    }
    .stage-cloud-anim-1 {
        animation: stageCloudFloatSlow 5.5s ease-in-out infinite;
    }
    .stage-cloud-anim-2 {
        animation: stageCloudFloatReverse 6.4s ease-in-out infinite;
    }
    .stage-cloud-anim-3 {
        animation: stageCloudFloatSlow 4.8s ease-in-out infinite;
    }

    .stage-tower-interactive {
        cursor: pointer;
        transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1), filter 0.28s ease;
        transform-box: fill-box;
        transform-origin: bottom center;
    }
    .stage-tower-interactive:hover {
        transform: translateY(-4px) scaleY(1.015);
        filter: brightness(1.06);
    }

    @keyframes pharmaConveyorSlide {
        0% { transform: translateX(0px); }
        50% { transform: translateX(10px); }
        100% { transform: translateX(0px); }
    }
    @keyframes pharmaNozzlePulse {
        0%, 100% { opacity: 0.45; transform: scaleY(0.92); }
        50% { opacity: 0.95; transform: scaleY(1.08); }
    }
    .pharma-conveyor-items {
        animation: pharmaConveyorSlide 3.2s ease-in-out infinite;
    }
    .pharma-dosing-beam {
        animation: pharmaNozzlePulse 2s ease-in-out infinite;
        transform-box: fill-box;
        transform-origin: top center;
    }

    /* Barra Minimalista Inferior con Divisores Verticales (Idéntica a la referencia) */
    .stage-bottom-strip {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
        padding-top: 0.85rem;
        margin-top: 0.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.55);
        color: #4a5568;
        font-size: 0.74rem;
    }
    .stage-divider-tick {
        width: 1px;
        height: 18px;
        background: rgba(74, 85, 104, 0.32);
        display: inline-block;
    }
    .stage-bottom-item {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        color: #334155;
        font-weight: 600;
        cursor: pointer;
        padding: 0.2rem 0.55rem;
        border-radius: 999px;
        transition: all 0.2s ease;
        text-decoration: none;
    }
    .stage-bottom-item:hover {
        background: rgba(255, 255, 255, 0.65);
        color: #1e293b;
        transform: translateY(-1px);
    }
    .stage-center-brand-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.55rem;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #2d3748;
    }
    .stage-center-ring {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 1.5px solid #2d3748;
        background: rgba(255, 255, 255, 0.75);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.62rem;
        font-weight: 800;
        color: #2d3748;
        box-shadow: inset 0 1px 2px #ffffff;
    }

    @media (max-width: 991.98px) {
        .stage-hero-portal {
            padding: 1.35rem 1.2rem 1rem;
            min-height: auto;
            border-radius: 24px;
        }
        .stage-main-grid {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 1rem;
        }
        .stage-lead-copy {
            margin-left: auto;
            margin-right: auto;
        }
        .stage-diorama-wrap {
            min-height: 240px;
        }
        .stage-divider-tick {
            display: none;
        }
        .stage-bottom-strip {
            justify-content: center;
        }
    }

    @media (max-width: 575.98px) {
        .stage-hero-portal {
            padding: 1.1rem 0.9rem 0.85rem;
            border-radius: 20px;
        }
        .stage-stacked-headline {
            font-size: clamp(2.05rem, 9.5vw, 2.65rem);
            margin-bottom: 0.75rem;
        }
        .stage-lead-copy {
            font-size: 0.79rem;
            line-height: 1.48;
            margin-bottom: 1rem;
        }
        .stage-cta-pill,
        .stage-secondary-pill {
            padding: 0.56rem 1.15rem;
            font-size: 0.76rem;
        }
        .stage-diorama-wrap {
            min-height: 195px;
        }
        .stage-bottom-strip {
            gap: 0.35rem 0.5rem;
            padding-top: 0.65rem;
            font-size: 0.68rem;
        }
        .stage-bottom-item {
            padding: 0.15rem 0.4rem;
            font-size: 0.68rem;
        }
        .stage-center-brand-badge {
            width: 100%;
            justify-content: center;
            font-size: 0.66rem;
            margin: 0.15rem 0;
        }
        .dash-compact-card {
            padding: 0.75rem 0.8rem !important;
            border-radius: 18px;
        }
        .dash-kpi-card {
            padding: 0.65rem 0.7rem;
            border-radius: 16px;
        }
        .tc-search-box {
            min-width: 0 !important;
            width: 100% !important;
        }
        .dash-filter-capsule {
            flex: 1 1 auto;
            justify-content: space-between;
        }
    }

    /* =========================================================================
       ESTILOS DE CRISTAL 3D COMPACTOS E INTERACTIVOS PARA EL DASHBOARD (#sec_dashboard)
       Conservando los colores pastel con efecto Liquid Glass translúcido
       ========================================================================= */
    .dash-compact-card {
        position: relative;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.16) 0%, rgba(243, 232, 237, 0.10) 52%, rgba(207, 226, 243, 0.08) 100%) !important;
        backdrop-filter: blur(8px) saturate(160%);
        -webkit-backdrop-filter: blur(8px) saturate(160%);
        border-radius: 24px;
        border: 2px solid rgba(255, 255, 255, 0.90);
        box-shadow:
            12px 20px 32px -8px rgba(45, 55, 72, 0.20),
            5px 8px 16px -4px rgba(102, 111, 136, 0.14),
            inset 0 2.5px 5px rgba(255, 255, 255, 0.95),
            inset 0 -3px 8px rgba(255, 255, 255, 0.55),
            inset 2px 0 6px rgba(255, 255, 255, 0.55);
        padding: 0.95rem 1.1rem;
        overflow: hidden;
        transition: all 0.26s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .dash-compact-card::after {
        content: '';
        position: absolute;
        inset: 3px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.55);
        box-shadow:
            inset -4px -4px 12px rgba(255, 255, 255, 0.35),
            inset 3px 3px 8px rgba(255, 255, 255, 0.48);
        pointer-events: none;
        z-index: 0;
    }
    .dash-compact-card > * {
        position: relative;
        z-index: 1;
    }

    .dash-kpi-card {
        border-radius: 22px;
        padding: 0.82rem 0.98rem;
        border: 2px solid rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(14px) saturate(180%);
        -webkit-backdrop-filter: blur(14px) saturate(180%);
        cursor: pointer;
        transition: all 0.24s cubic-bezier(0.22, 1, 0.36, 1);
        position: relative;
        overflow: hidden;
    }
    .dash-kpi-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 48%;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.58) 0%, rgba(255, 255, 255, 0.04) 100%);
        border-radius: 20px 20px 60% 60% / 18px 18px 28% 28%;
        pointer-events: none;
        z-index: 0;
    }
    .dash-kpi-card::after {
        content: '';
        position: absolute;
        inset: 3px;
        border-radius: 18px;
        border: 1px solid rgba(255, 255, 255, 0.62);
        box-shadow:
            inset 0 2px 4px rgba(255, 255, 255, 0.90),
            inset -3px -3px 10px rgba(255, 255, 255, 0.42);
        pointer-events: none;
        z-index: 0;
    }
    .dash-kpi-card > * {
        position: relative;
        z-index: 1;
    }
    .dash-kpi-card:hover {
        transform: translateY(-4px) scale(1.012);
        border-color: #ffffff;
    }
    .dash-kpi-card.active-kpi {
        box-shadow:
            0 0 0 2px rgba(45, 55, 72, 0.72),
            12px 18px 28px -6px rgba(45, 55, 72, 0.22),
            inset 0 3px 6px rgba(255, 255, 255, 0.98) !important;
        transform: translateY(-2px);
    }

    .dash-status-bar-item {
        position: relative;
        padding: 0.46rem 0.78rem;
        border-radius: 15px;
        border: 1.5px solid rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(12px) saturate(170%);
        -webkit-backdrop-filter: blur(12px) saturate(170%);
        box-shadow:
            6px 10px 18px -4px rgba(45, 55, 72, 0.14),
            inset 0 2px 4px rgba(255, 255, 255, 0.92),
            inset 0 -2px 5px rgba(255, 255, 255, 0.48);
        cursor: pointer;
        transition: all 0.22s ease;
    }
    .dash-status-bar-item:hover {
        transform: translateX(4px) scale(1.01);
        border-color: #ffffff;
    }
    .dash-status-bar-item.active-bar {
        box-shadow:
            0 0 0 2px rgba(45, 55, 72, 0.72),
            8px 12px 20px -4px rgba(45, 55, 72, 0.20),
            inset 0 2px 4px #ffffff !important;
    }

    .dash-donut-seg {
        cursor: pointer;
        transition: stroke-dasharray 0.45s ease, stroke-dashoffset 0.45s ease, stroke-width 0.2s ease, opacity 0.2s ease;
    }
    .dash-donut-seg:hover {
        stroke-width: 18px;
    }

    .dash-step-item {
        padding: 0.36rem 0.72rem;
        border-radius: 14px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.62) 0%, rgba(243, 232, 237, 0.44) 100%);
        backdrop-filter: blur(12px) saturate(160%);
        -webkit-backdrop-filter: blur(12px) saturate(160%);
        border: 1.5px solid rgba(255, 255, 255, 0.92);
        box-shadow:
            5px 8px 16px -4px rgba(45, 55, 72, 0.12),
            inset 0 2px 3px rgba(255, 255, 255, 0.95),
            inset 0 -2px 4px rgba(255, 255, 255, 0.45);
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .dash-step-item:hover {
        transform: translateX(3px);
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.84) 0%, rgba(243, 232, 237, 0.65) 100%);
        border-color: #ffffff;
        box-shadow:
            7px 12px 20px -4px rgba(45, 55, 72, 0.16),
            inset 0 2px 4px #ffffff;
    }
    .dash-step-item.active-step {
        background: linear-gradient(135deg, rgba(224, 242, 254, 0.78) 0%, rgba(255, 255, 255, 0.88) 100%);
        box-shadow: 0 0 0 2px #38bdf8, 0 8px 18px rgba(2, 132, 199, 0.18), inset 0 2px 4px #ffffff;
    }

    .dash-plant-pill {
        border: 1.5px solid rgba(255, 255, 255, 0.92);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.68) 0%, rgba(243, 232, 237, 0.46) 100%);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        color: #4a5568;
        border-radius: 999px;
        padding: 0.24rem 0.72rem;
        font-size: 0.72rem;
        font-weight: 700;
        box-shadow: inset 0 1.5px 2px rgba(255, 255, 255, 0.95);
        cursor: pointer;
        transition: all 0.18s ease;
    }
    .dash-plant-pill:hover {
        background: rgba(255, 255, 255, 0.90);
        color: #1e293b;
    }
    .dash-plant-pill.active {
        background: linear-gradient(135deg, rgba(120, 129, 153, 0.94) 0%, rgba(45, 55, 72, 0.96) 100%);
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.82);
        box-shadow:
            0 6px 14px rgba(45, 55, 72, 0.24),
            inset 0 2px 3px rgba(255, 255, 255, 0.55);
    }

    .dash-filter-capsule {
        display: inline-flex;
        align-items: center;
        gap: 0.48rem;
        padding: 0.26rem 0.78rem 0.26rem 0.34rem;
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.82) 0%, rgba(243, 232, 237, 0.56) 100%);
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        border: 1.5px solid rgba(255, 255, 255, 0.96);
        box-shadow:
            0 8px 18px -4px rgba(45, 55, 72, 0.13),
            inset 0 2px 4px rgba(255, 255, 255, 0.98),
            inset 0 -2px 4px rgba(255, 255, 255, 0.55);
        transition: all 0.22s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .dash-filter-capsule:hover,
    .dash-filter-capsule:focus-within {
        transform: translateY(-1px);
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(224, 242, 254, 0.72) 100%);
        border-color: #ffffff;
        box-shadow:
            0 12px 24px -5px rgba(2, 132, 199, 0.18),
            0 4px 10px rgba(45, 55, 72, 0.08),
            inset 0 2px 4px #ffffff;
    }
    .dash-filter-capsule-icon {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.76rem;
        flex-shrink: 0;
        background: linear-gradient(145deg, #e0f2fe 0%, #bae6fd 100%);
        border: 1.2px solid rgba(255, 255, 255, 0.96);
        box-shadow:
            0 3px 8px rgba(2, 132, 199, 0.16),
            inset 0 1.5px 2px rgba(255, 255, 255, 0.98);
    }
    .dash-filter-select,
    .dash-filter-capsule-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        border: none !important;
        background-color: transparent !important;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 16 16' fill='none'%3E%3Cpath d='M4 6L8 10L12 6' stroke='%23475569' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.15rem center;
        background-size: 12px 12px;
        color: #1e293b;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: -0.01em;
        outline: none !important;
        box-shadow: none !important;
        cursor: pointer;
        padding: 0.12rem 1.25rem 0.12rem 0.1rem;
        line-height: 1.3;
    }
    .dash-filter-select option,
    .dash-filter-capsule-select option {
        background: #ffffff;
        color: #1e293b;
        font-weight: 600;
        padding: 0.35rem 0.6rem;
    }
</style>
@endpush

@section('content')
@php
    $userName = Auth::user()->name ?? 'Brenda Campos Valadez';
    $activeSection = request('section', (request()->has('q') || request()->has('status')) ? 'bd' : 'inicio');
    $activeOpTab = request('op_tab', 'todas');
    $stepNames = [
        1 => 'Paso 1: Portada y Presentación (Pág. 1)',
        2 => 'Paso 2: Parte I · Despeje y Equipos (Pág. 2)',
        3 => 'Paso 3: Parte I · Monitoreo y MP (Págs. 3-4)',
        4 => 'Paso 4: Parte II · Preparación Fase I (Págs. 5-7)',
        5 => 'Paso 5: Parte III · Preparación Fase II (Pág. 8)',
        6 => 'Paso 6: Parte IV · Mezcla Final y pH (Págs. 9-11)',
        7 => 'Paso 7: Parte V · Descargo, Rendimiento y Anexos (Págs. 12-14)',
    ];
@endphp

<div class="container-fluid px-xl-2">

    {{-- ===================================================================== --}}
    {{-- SECCIÓN 1: INICIO (HERO CARD DE CRISTAL — PORTAL EBR)                 --}}
    {{-- ===================================================================== --}}
    <div id="sec_inicio" class="app-section-pane hig-spring-pane {{ $activeSection === 'inicio' ? '' : 'd-none' }}">
        @php
            $homeTotalOps = $batches->count();
            $homePendingOps = $batches->where('status', 'Pendiente')->count();
            $homeFinishedOps = $batches->filter(fn($item) => $item->status === 'Finalizado' || ($item->status !== 'Pendiente' && $item->progressPercentage() >= 100))->count();
            $homeActiveOps = $batches->filter(fn($item) => $item->status !== 'Pendiente' && $item->status !== 'Finalizado' && $item->progressPercentage() < 100)->count();
            $featuredBatch = $batches->where('status', '!=', 'Pendiente')->first() ?? $batches->first();
        @endphp

        {{-- ESCENARIO PRINCIPAL DE CRISTAL 3D INSPIRADO EN LA IMAGEN DE REFERENCIA --}}
        <div class="stage-hero-portal">

            {{-- CUERPO CENTRAL EN 2 COLUMNAS: TIPOGRAFÍA APILADA A LA IZQUIERDA + ESCULTURA 3D EN PODIO CIRCULAR A LA DERECHA --}}
            <div class="stage-main-grid">

                {{-- Columna Izquierda: 3 Palabras Apiladas + Párrafo de 3 Líneas + Botón Píldora Blanco --}}
                <div class="ps-xl-3">
                    <h1 class="stage-stacked-headline">
                        <span>Batch</span>
                        <span>Record.</span>
                    </h1>

                    <p class="stage-lead-copy">
                        Bienvenido(a), <strong>{{ $userName }}</strong>. Gestiona cada Orden de Producción desde la Etapa 0, controla en tiempo real los 7 pasos de fabricación y libera las 14 páginas oficiales con trazabilidad BPF / GMP.
                    </p>

                    <div class="d-flex flex-wrap align-items-center gap-2 justify-content-center justify-content-lg-start">
                        <button type="button" class="stage-cta-pill" onclick="switchSection('ordenes')">
                            <span>Explorar órdenes</span>
                        </button>

                        <button type="button" class="stage-secondary-pill" onclick="switchSection('dashboard')">
                            <i class="bi bi-pie-chart-fill" style="color: #666F88;"></i>
                            <span>Dashboard</span>
                        </button>
                    </div>
                </div>

                {{-- Columna Derecha: Planta Farmacéutica 3D con su Línea de Producción y letrero "BATCH RECORD" sobre el Podio Circular --}}
                @php
                    $authEmailKey = strtolower(trim((string) (Auth::user()->email ?? Auth::user()->name ?? 'guest')));
                    $matchedRoleIdx = null;
                    $currentRoleLabel = 'Especialista BPF';
                    if (isset($roleUsers)) {
                        foreach ($roleUsers->values() as $rIdx => $rUser) {
                            if (strtolower(trim((string) $rUser->email)) === $authEmailKey || strtolower(trim((string) $rUser->name)) === $authEmailKey) {
                                $matchedRoleIdx = $rIdx;
                                $currentRoleLabel = $rUser->role ?: 'Administrador';
                                break;
                            }
                        }
                    }
                    $userSceneVariant = $matchedRoleIdx !== null
                        ? ($matchedRoleIdx % 4)
                        : (abs(crc32($authEmailKey . '_' . (Auth::id() ?? 0))) % 4);

                    // Nombre corto en mayúsculas para la placa frontal 3D y el letrero personalizado
                    $shortUserName = mb_strtoupper(trim((string) $userName));
                    if (mb_strlen($shortUserName) > 22) {
                        $nameParts = preg_split('/\s+/', $shortUserName);
                        $shortUserName = implode(' ', array_slice($nameParts, 0, 2));
                    }

                    // Paletas 3D completamente distintivas por usuario
                    $sceneThemes = [
                        0 => [
                            'cloud'        => '#bae6fd',
                            'glow'         => '#0284c7',
                            'podiumTint'   => '#e0f2fe',
                            'tank1Top'     => '#bae6fd',
                            'tank1Mid'     => '#38bdf8',
                            'tank1Bot'     => '#0369a1',
                            'tank2Top'     => '#ddd6fe',
                            'tank2Mid'     => '#a78bfa',
                            'tank2Bot'     => '#5b21b6',
                            'signBg1'      => '#0f172a',
                            'signBg2'      => '#1e3a8a',
                            'signBorder'   => '#38bdf8',
                            'signSubText'  => '#7dd3fc',
                            'facadeMid'    => '#dbeafe',
                            'facadeBot'    => '#3b82f6',
                            'sideTop'      => '#2563eb',
                            'sideBot'      => '#1e3a8a',
                            'badgeColor'   => '#0284c7',
                            'dotColor'     => '#38bdf8',
                            'stationTitle' => 'AUTOMATIZACIÓN IA',
                            'unitLabel'    => 'UNIDAD CENTRAL • AUTOMATIZACIÓN',
                        ],
                        1 => [
                            'cloud'        => '#fbcfe8',
                            'glow'         => '#db2777',
                            'podiumTint'   => '#fce7f3',
                            'tank1Top'     => '#fbcfe8',
                            'tank1Mid'     => '#f472b6',
                            'tank1Bot'     => '#be185d',
                            'tank2Top'     => '#a7f3d0',
                            'tank2Mid'     => '#34d399',
                            'tank2Bot'     => '#047857',
                            'signBg1'      => '#4a044e',
                            'signBg2'      => '#831843',
                            'signBorder'   => '#f472b6',
                            'signSubText'  => '#fbcfe8',
                            'facadeMid'    => '#fce7f3',
                            'facadeBot'    => '#9d174d',
                            'sideTop'      => '#be185d',
                            'sideBot'      => '#500724',
                            'badgeColor'   => '#be185d',
                            'dotColor'     => '#ec4899',
                            'stationTitle' => 'LIBERACIÓN EJECUTIVA',
                            'unitLabel'    => 'DIRECCIÓN CALIDAD • GEL Y DERMO',
                        ],
                        2 => [
                            'cloud'        => '#fde68a',
                            'glow'         => '#d97706',
                            'podiumTint'   => '#fef3c7',
                            'tank1Top'     => '#fef08a',
                            'tank1Mid'     => '#fbbf24',
                            'tank1Bot'     => '#b45309',
                            'tank2Top'     => '#99f6e4',
                            'tank2Mid'     => '#2dd4bf',
                            'tank2Bot'     => '#0f766e',
                            'signBg1'      => '#451a03',
                            'signBg2'      => '#78350f',
                            'signBorder'   => '#fbbf24',
                            'signSubText'  => '#fde68a',
                            'facadeMid'    => '#fef3c7',
                            'facadeBot'    => '#b45309',
                            'sideTop'      => '#d97706',
                            'sideBot'      => '#451a03',
                            'badgeColor'   => '#b45309',
                            'dotColor'     => '#f59e0b',
                            'stationTitle' => 'SÓLIDOS Y TABLETAS',
                            'unitLabel'    => 'PLANTA SÓLIDOS • CONTROL BPF',
                        ],
                        3 => [
                            'cloud'        => '#ddd6fe',
                            'glow'         => '#7c3aed',
                            'podiumTint'   => '#ede9fe',
                            'tank1Top'     => '#e9d5ff',
                            'tank1Mid'     => '#c084fc',
                            'tank1Bot'     => '#6b21a8',
                            'tank2Top'     => '#fecdd3',
                            'tank2Mid'     => '#fb7185',
                            'tank2Bot'     => '#be123c',
                            'signBg1'      => '#2e1065',
                            'signBg2'      => '#4c1d95',
                            'signBorder'   => '#c084fc',
                            'signSubText'  => '#e9d5ff',
                            'facadeMid'    => '#ede9fe',
                            'facadeBot'    => '#6d28d9',
                            'sideTop'      => '#7c3aed',
                            'sideBot'      => '#2e1065',
                            'badgeColor'   => '#6d28d9',
                            'dotColor'     => '#a855f7',
                            'stationTitle' => 'BIOTECNOLOGÍA GMP',
                            'unitLabel'    => 'LABORATORIO BIO • MICROBIOLOGÍA',
                        ],
                    ];
                    $uTheme = $sceneThemes[$userSceneVariant] ?? $sceneThemes[1];
                    $cloudMidTone = $uTheme['cloud'];
                @endphp
                <div class="stage-diorama-wrap">
                    <svg class="stage-diorama-svg" viewBox="0 0 560 420" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            {{-- Resplandor de piso debajo del podio personalizado por usuario --}}
                            <radialGradient id="floorGlow" cx="50%" cy="50%" r="50%">
                                <stop offset="0%" stop-color="{{ $uTheme['glow'] }}" stop-opacity="0.34"/>
                                <stop offset="55%" stop-color="#666F88" stop-opacity="0.16"/>
                                <stop offset="100%" stop-color="{{ $uTheme['podiumTint'] }}" stop-opacity="0"/>
                            </radialGradient>

                            {{-- Gradientes Metálicos / Cristal del Podio Circular Doble --}}
                            <linearGradient id="podiumOuterSide" x1="55" y1="335" x2="505" y2="335" gradientUnits="userSpaceOnUse">
                                <stop offset="0%" stop-color="{{ $uTheme['signBg1'] }}"/>
                                <stop offset="22%" stop-color="#788199"/>
                                <stop offset="48%" stop-color="#f8fafc"/>
                                <stop offset="74%" stop-color="{{ $uTheme['sideTop'] }}"/>
                                <stop offset="100%" stop-color="{{ $uTheme['signBg1'] }}"/>
                            </linearGradient>

                            <linearGradient id="podiumOuterTop" x1="75" y1="285" x2="485" y2="370" gradientUnits="userSpaceOnUse">
                                <stop offset="0%" stop-color="#ffffff"/>
                                <stop offset="38%" stop-color="{{ $uTheme['podiumTint'] }}"/>
                                <stop offset="72%" stop-color="#94a3b8"/>
                                <stop offset="100%" stop-color="#475569"/>
                            </linearGradient>

                            <linearGradient id="podiumInnerSide" x1="90" y1="308" x2="470" y2="308" gradientUnits="userSpaceOnUse">
                                <stop offset="0%" stop-color="{{ $uTheme['signBg1'] }}"/>
                                <stop offset="25%" stop-color="#666F88"/>
                                <stop offset="52%" stop-color="#f1f5f9"/>
                                <stop offset="78%" stop-color="{{ $uTheme['sideTop'] }}"/>
                                <stop offset="100%" stop-color="{{ $uTheme['signBg1'] }}"/>
                            </linearGradient>

                            <linearGradient id="podiumInnerTop" x1="105" y1="260" x2="455" y2="340" gradientUnits="userSpaceOnUse">
                                <stop offset="0%" stop-color="#ffffff"/>
                                <stop offset="45%" stop-color="{{ $uTheme['podiumTint'] }}"/>
                                <stop offset="80%" stop-color="#cfe2f3"/>
                                <stop offset="100%" stop-color="#788199"/>
                            </linearGradient>

                            {{-- Gradientes 3D Acero Inoxidable / Cristal para Tanques Farmacéuticos (Biorreactores) --}}
                            <linearGradient id="tankSteelCyl" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#2d3748"/>
                                <stop offset="24%" stop-color="#788199"/>
                                <stop offset="50%" stop-color="#ffffff"/>
                                <stop offset="76%" stop-color="#666F88"/>
                                <stop offset="100%" stop-color="#1e293b"/>
                            </linearGradient>

                            <linearGradient id="tankBlueGel" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="{{ $uTheme['tank1Top'] }}"/>
                                <stop offset="50%" stop-color="{{ $uTheme['tank1Mid'] }}"/>
                                <stop offset="100%" stop-color="{{ $uTheme['tank1Bot'] }}"/>
                            </linearGradient>

                            <linearGradient id="tankMintGel" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="{{ $uTheme['tank2Top'] }}"/>
                                <stop offset="50%" stop-color="{{ $uTheme['tank2Mid'] }}"/>
                                <stop offset="100%" stop-color="{{ $uTheme['tank2Bot'] }}"/>
                            </linearGradient>

                            {{-- Gradientes para la Nave / Planta Farmacéutica Central --}}
                            <linearGradient id="plantFacadeGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#ffffff"/>
                                <stop offset="50%" stop-color="{{ $uTheme['facadeMid'] }}"/>
                                <stop offset="100%" stop-color="{{ $uTheme['facadeBot'] }}"/>
                            </linearGradient>

                            <linearGradient id="plantSideGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="{{ $uTheme['sideTop'] }}"/>
                                <stop offset="55%" stop-color="{{ $uTheme['signBg2'] }}"/>
                                <stop offset="100%" stop-color="{{ $uTheme['sideBot'] }}"/>
                            </linearGradient>

                            <linearGradient id="batchSignGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="{{ $uTheme['signBg1'] }}"/>
                                <stop offset="55%" stop-color="{{ $uTheme['signBg2'] }}"/>
                                <stop offset="100%" stop-color="{{ $uTheme['sideTop'] }}"/>
                            </linearGradient>

                            <linearGradient id="conveyorBeltGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="{{ $uTheme['signBg1'] }}"/>
                                <stop offset="50%" stop-color="{{ $uTheme['signBg2'] }}"/>
                                <stop offset="100%" stop-color="{{ $uTheme['signBg1'] }}"/>
                            </linearGradient>

                            {{-- Gradiente 3D Perla/Metálico para las Nubes Flotantes --}}
                            <radialGradient id="cloudOrbLight" cx="35%" cy="28%" r="68%">
                                <stop offset="0%" stop-color="#ffffff"/>
                                <stop offset="42%" stop-color="{{ $cloudMidTone }}"/>
                                <stop offset="76%" stop-color="#94a3b8"/>
                                <stop offset="100%" stop-color="#334155"/>
                            </radialGradient>
                        </defs>

                        {{-- 1. Sombra y reflejo en la base --}}
                        <ellipse cx="280" cy="356" rx="228" ry="46" fill="url(#floorGlow)"/>

                        {{-- 2. PODIO CIRCULAR 3D NIVEL INFERIOR (ANILLO EXTERIOR) --}}
                        <path d="M62 326 C62 362, 498 362, 498 326 L498 342 C498 378, 62 378, 62 342 Z" fill="url(#podiumOuterSide)"/>
                        <ellipse cx="280" cy="326" rx="218" ry="42" fill="url(#podiumOuterTop)" stroke="#ffffff" stroke-width="1.5"/>
                        <ellipse cx="280" cy="324" rx="204" ry="36" fill="none" stroke="rgba(45,55,72,0.35)" stroke-width="1.2"/>

                        {{-- 3. PODIO CIRCULAR 3D NIVEL SUPERIOR (PLATAFORMA DE PLANTA FARMACÉUTICA) --}}
                        <path d="M92 300 C92 332, 468 332, 468 300 L468 318 C468 350, 92 350, 92 318 Z" fill="url(#podiumInnerSide)"/>
                        <ellipse cx="280" cy="300" rx="188" ry="35" fill="url(#podiumInnerTop)" stroke="#ffffff" stroke-width="1.8"/>
                        <ellipse cx="280" cy="299" rx="166" ry="28" fill="rgba(255,255,255,0.48)" stroke="#ffffff" stroke-width="1"/>

                        {{-- ===================================================================== --}}
                        {{-- 4. PLANTA FARMACÉUTICA 3D + BIORREACTORES + LÍNEA DE PRODUCCIÓN       --}}
                        {{-- ===================================================================== --}}

                        {{-- Tuberías Sanitarias Superiores (Acero Inoxidable conectando Tanques con la Planta) --}}
                        <g stroke="#ffffff" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M155 152 L155 128 L235 128 L235 155" stroke="url(#podiumOuterTop)"/>
                            <path d="M214 162 L214 140 L265 140" stroke="url(#podiumOuterTop)"/>
                        </g>
                        <circle cx="155" cy="128" r="4.5" fill="#7dd3fc" stroke="#ffffff" stroke-width="1.2"/>
                        <circle cx="214" cy="140" r="4.5" fill="#86efac" stroke="#ffffff" stroke-width="1.2"/>

                        {{-- TANQUE BIORREACTOR 1 (Izquierda: Preparación Fase I · Gel Farmacéutico) --}}
                        <g class="stage-tower-interactive" onclick="switchSection('historial')">
                            <title>Tanque Reactor Fase I • Control de Proceso</title>
                            {{-- Patas de soporte del tanque --}}
                            <rect x="132" y="264" width="6" height="26" rx="2" fill="#334155"/>
                            <rect x="172" y="264" width="6" height="26" rx="2" fill="#334155"/>
                            {{-- Cuerpo Cilíndrico 3D de Acero/Cristal --}}
                            <rect x="124" y="154" width="62" height="116" rx="14" fill="url(#tankSteelCyl)" stroke="#ffffff" stroke-width="1.4"/>
                            {{-- Domo Superior y Motor Agitador --}}
                            <ellipse cx="155" cy="156" rx="31" ry="10" fill="#ffffff"/>
                            <rect x="146" y="138" width="18" height="16" rx="4" fill="#2d3748" stroke="#ffffff" stroke-width="1"/>
                            {{-- Visor de Nivel de Líquido / Gel Pastel Azul Cielo --}}
                            <rect x="145" y="172" width="20" height="82" rx="10" fill="rgba(255,255,255,0.85)" stroke="#ffffff" stroke-width="1.2"/>
                            <rect x="147" y="196" width="16" height="56" rx="8" fill="url(#tankBlueGel)"/>
                            {{-- Líneas de graduación del reactor --}}
                            <line x1="149" y1="184" x2="161" y2="184" stroke="#64748b" stroke-width="1.2"/>
                            <line x1="149" y1="200" x2="161" y2="200" stroke="#ffffff" stroke-width="1.2"/>
                            <line x1="149" y1="216" x2="161" y2="216" stroke="#ffffff" stroke-width="1.2"/>
                            <line x1="149" y1="232" x2="161" y2="232" stroke="#ffffff" stroke-width="1.2"/>
                            {{-- Etiqueta FASE I --}}
                            <rect x="135" y="156" width="40" height="12" rx="6" fill="#2d3748"/>
                            <text x="155" y="164.5" text-anchor="middle" fill="#ffffff" font-size="6.5" font-weight="800" font-family="Inter, sans-serif">FASE I</text>
                        </g>

                        {{-- TANQUE BIORREACTOR 2 (Centro-Izquierda: Mezcla Final y pH · Fase II) --}}
                        <g class="stage-tower-interactive" onclick="switchSection('historial')">
                            <title>Tanque Mezclador Fase II • Homogeneización y pH</title>
                            <rect x="196" y="262" width="5" height="24" rx="2" fill="#334155"/>
                            <rect x="227" y="262" width="5" height="24" rx="2" fill="#334155"/>
                            <rect x="190" y="166" width="48" height="102" rx="12" fill="url(#tankSteelCyl)" stroke="#ffffff" stroke-width="1.3"/>
                            <ellipse cx="214" cy="168" rx="24" ry="8" fill="#ffffff"/>
                            {{-- Visor de Nivel Verde Menta Pastel --}}
                            <rect x="206" y="182" width="16" height="72" rx="8" fill="rgba(255,255,255,0.85)" stroke="#ffffff" stroke-width="1.1"/>
                            <rect x="208" y="202" width="12" height="50" rx="6" fill="url(#tankMintGel)"/>
                            {{-- Manómetro circular --}}
                            <circle cx="214" cy="156" r="7" fill="#ffffff" stroke="#2d3748" stroke-width="1.5"/>
                            <line x1="214" y1="156" x2="218" y2="152" stroke="#0284c7" stroke-width="1.4"/>
                            <rect x="196" y="168" width="36" height="11" rx="5.5" fill="#2d3748"/>
                            <text x="214" y="176" text-anchor="middle" fill="#ffffff" font-size="6" font-weight="800" font-family="Inter, sans-serif">FASE II</text>
                        </g>

                        {{-- EDIFICIO PRINCIPAL DE LA PLANTA FARMACÉUTICA (NAVE GMP CON LETRERO "BATCH RECORD") --}}
                        <g class="stage-tower-interactive" onclick="switchSection('dashboard')">
                            <title>Planta Farmacéutica Grimann • Batch Record Electrónico</title>

                            {{-- Cuerpo 3D de la Nave Limpia (Frente y Lateral) --}}
                            <polygon points="246,118 392,104 392,284 246,284" fill="url(#plantFacadeGrad)" stroke="#ffffff" stroke-width="1.5"/>
                            <polygon points="392,104 434,124 434,284 392,284" fill="url(#plantSideGrad)" stroke="#ffffff" stroke-width="1"/>
                            {{-- Techo Industrial con Unidades HVAC de Cuarto Limpio --}}
                            <polygon points="246,118 392,104 434,124 288,136" fill="#ffffff" stroke="#cbd5e1" stroke-width="1"/>

                            {{-- LETRERO LUMINOSO 3D SUPERIOR PERSONALIZADO POR USUARIO --}}
                            <rect x="252" y="64" width="168" height="38" rx="12" fill="url(#batchSignGrad)" stroke="#ffffff" stroke-width="2"/>
                            <rect x="256" y="68" width="160" height="30" rx="9" fill="none" stroke="{{ $uTheme['signBorder'] }}" stroke-opacity="0.75" stroke-width="1.2"/>
                            {{-- Soportes del letrero al techo de la planta --}}
                            <rect x="284" y="102" width="6" height="14" fill="#475569"/>
                            <rect x="378" y="96" width="6" height="14" fill="#475569"/>
                            {{-- Texto principal: BATCH RECORD + Unidad Distintiva del Usuario --}}
                            <text x="336" y="83" text-anchor="middle" fill="#ffffff" font-size="14" font-weight="900" letter-spacing="1.4" font-family="Inter, system-ui, sans-serif">BATCH RECORD</text>
                            <text x="336" y="93.5" text-anchor="middle" fill="{{ $uTheme['signSubText'] }}" font-size="5.8" font-weight="800" letter-spacing="1.0" font-family="Inter, system-ui, sans-serif">{{ $uTheme['unitLabel'] }}</text>

                            {{-- ESCULTURA / EMBLEMA 3D EXCLUSIVO POR USUARIO SOBRE LA NAVE Y EL PODIO --}}
                            @if($userSceneVariant === 0)
                                {{-- Distintivo Usuario 0 (chatboteams): Orbe Holográfico IA + Antena Satelital en Techo --}}
                                <g class="stage-cloud-anim-1">
                                    <circle cx="336" cy="40" r="15" fill="rgba(56,189,248,0.18)" stroke="#38bdf8" stroke-width="1.4" stroke-dasharray="3 2"/>
                                    <circle cx="336" cy="40" r="9" fill="#0284c7" stroke="#ffffff" stroke-width="1.5"/>
                                    <text x="336" y="43" text-anchor="middle" fill="#ffffff" font-size="6.5" font-weight="900" font-family="Inter, sans-serif">AI</text>
                                </g>
                            @elseif($userSceneVariant === 1)
                                {{-- Distintivo Usuario 1 (Brenda Campos): Insignia Estrella/Corona Ejecutiva 3D + Microscopio GMP --}}
                                <g class="stage-cloud-anim-1">
                                    <circle cx="336" cy="39" r="16" fill="rgba(244,114,182,0.22)" stroke="#f472b6" stroke-width="1.5"/>
                                    <polygon points="336,25 339.5,34 349,34 341.5,39.5 344.5,48.5 336,43 327.5,48.5 330.5,39.5 323,34 332.5,34" fill="#fbbf24" stroke="#ffffff" stroke-width="1.2"/>
                                </g>
                                {{-- Microscopio / Torre Analítica de Liberación a la derecha de la nave --}}
                                <g transform="translate(438, 224)">
                                    <rect x="0" y="42" width="28" height="8" rx="4" fill="#831843" stroke="#ffffff" stroke-width="1.2"/>
                                    <path d="M18 42 C24 30, 24 16, 14 10" stroke="#ffffff" stroke-width="3.5" fill="none" stroke-linecap="round"/>
                                    <rect x="6" y="6" width="8" height="18" rx="3" transform="rotate(-20 10 15)" fill="#f472b6" stroke="#ffffff" stroke-width="1.2"/>
                                    <rect x="4" y="28" width="14" height="3.5" rx="1.5" fill="#38bdf8"/>
                                    <circle cx="18" cy="24" r="4" fill="#fbbf24" stroke="#ffffff" stroke-width="1"/>
                                </g>
                            @elseif($userSceneVariant === 2)
                                {{-- Distintivo Usuario 2: Engranaje Dorado 3D + Serpentín de Destilación --}}
                                <g class="stage-cloud-anim-1">
                                    <circle cx="336" cy="39" r="15" fill="rgba(251,191,36,0.22)" stroke="#fbbf24" stroke-width="1.5"/>
                                    <circle cx="336" cy="39" r="9" fill="#d97706" stroke="#ffffff" stroke-width="1.5"/>
                                    <circle cx="336" cy="39" r="3.5" fill="#fef3c7"/>
                                </g>
                            @else
                                {{-- Distintivo Usuario 3: Molécula / Hélice Biotecnológica 3D Flotante --}}
                                <g class="stage-cloud-anim-1">
                                    <line x1="324" y1="34" x2="348" y2="44" stroke="#c084fc" stroke-width="2.2"/>
                                    <line x1="324" y1="44" x2="348" y2="34" stroke="#fb7185" stroke-width="2.2"/>
                                    <circle cx="324" cy="34" r="5" fill="#a855f7" stroke="#ffffff" stroke-width="1.2"/>
                                    <circle cx="348" cy="44" r="5" fill="#a855f7" stroke="#ffffff" stroke-width="1.2"/>
                                    <circle cx="336" cy="39" r="6" fill="#f43f5e" stroke="#ffffff" stroke-width="1.4"/>
                                    <circle cx="324" cy="44" r="4.5" fill="#fb7185" stroke="#ffffff" stroke-width="1.2"/>
                                    <circle cx="348" cy="34" r="4.5" fill="#fb7185" stroke="#ffffff" stroke-width="1.2"/>
                                </g>
                            @endif

                            {{-- Ventanales de Cristal de Laboratorio / Cuarto Limpio (2 Niveles) --}}
                            <rect x="260" y="132" width="118" height="34" rx="6" fill="rgba(255,255,255,0.82)" stroke="#ffffff" stroke-width="1.2"/>
                            <line x1="298" y1="132" x2="298" y2="166" stroke="#cbd5e1" stroke-width="1.2"/>
                            <line x1="338" y1="132" x2="338" y2="166" stroke="#cbd5e1" stroke-width="1.2"/>

                            {{-- Panel de Monitoreo en la Fachada personalizado por usuario --}}
                            <rect x="260" y="174" width="118" height="28" rx="6" fill="{{ $uTheme['signBg1'] }}" stroke="#ffffff" stroke-width="1.2"/>
                            <circle cx="271" cy="188" r="3.8" fill="{{ $uTheme['dotColor'] }}"/>
                            <circle cx="282" cy="188" r="3.8" fill="#fbbf24"/>
                            <circle cx="293" cy="188" r="3.8" fill="#4ade80"/>
                            <text x="338" y="190.5" text-anchor="middle" fill="#ffffff" font-size="6.2" font-weight="800" font-family="Inter, sans-serif">{{ $uTheme['stationTitle'] }}</text>

                            {{-- Líneas luminosas en el lateral derecho del edificio --}}
                            @for($s = 0; $s < 6; $s++)
                                <line x1="398" y1="{{ 136 + ($s * 18) }}" x2="428" y2="{{ 148 + ($s * 18) }}" stroke="#ffffff" stroke-opacity="0.55" stroke-width="1.5"/>
                            @endfor
                        </g>

                        {{-- ===================================================================== --}}
                        {{-- 5. LÍNEA DE PRODUCCIÓN FARMACÉUTICA 3D (BANDA TRANSPORTADORA EN VIVO) --}}
                        {{-- ===================================================================== --}}
                        <g onclick="switchSection('ordenes')" style="cursor: pointer;">
                            <title>Línea de Producción y Envasado • Clic para ver Órdenes</title>

                            {{-- Estación / Arco de Dosificación e Inspección de Calidad sobre la Banda --}}
                            <path d="M276 286 L276 218 C276 210, 356 210, 356 218 L356 286" stroke="#ffffff" stroke-width="5" fill="none"/>
                            <path d="M276 286 L276 218 C276 210, 356 210, 356 218 L356 286" stroke="#2d3748" stroke-width="2.5" fill="none"/>
                            <rect x="288" y="208" width="56" height="16" rx="8" fill="#2d3748" stroke="#ffffff" stroke-width="1.2"/>
                            <text x="316" y="218.5" text-anchor="middle" fill="#86efac" font-size="6.2" font-weight="800" font-family="Inter, sans-serif">LLENADO GMP</text>

                            {{-- Boquillas dosificadoras + Haz de llenado animado --}}
                            <rect x="302" y="224" width="6" height="10" rx="2" fill="#64748b"/>
                            <rect x="324" y="224" width="6" height="10" rx="2" fill="#64748b"/>
                            <rect class="pharma-dosing-beam" x="303.5" y="234" width="3" height="18" rx="1.5" fill="#38bdf8"/>
                            <rect class="pharma-dosing-beam" x="325.5" y="234" width="3" height="18" rx="1.5" fill="#34d399"/>

                            {{-- Productos Farmacéuticos personalizados según el usuario activo sobre la Banda Transportadora --}}
                            <g class="pharma-conveyor-items">
                                @if($userSceneVariant === 0)
                                    {{-- Variante 0: Ampolletas Inyectables VONTROL + Viales SPECTRILA + Cajas G1/DF --}}
                                    <g transform="translate(148, 242)">
                                        <path d="M5 10 L7 2 L11 2 L13 10 Z" fill="#bae6fd" stroke="#0284c7" stroke-width="1"/>
                                        <rect x="2" y="10" width="14" height="22" rx="4" fill="#ffffff" stroke="#0284c7" stroke-width="1.2"/>
                                        <rect x="4" y="16" width="10" height="14" rx="2" fill="#38bdf8"/>
                                    </g>
                                    <g transform="translate(178, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#94a3b8" stroke-width="1.2"/>
                                        <rect x="2" y="15" width="14" height="17" rx="3" fill="#a78bfa"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#4c1d95"/>
                                    </g>
                                    <g transform="translate(210, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#94a3b8" stroke-width="1.2"/>
                                        <rect x="2" y="15" width="14" height="17" rx="3" fill="#6ee7b7"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#065f46"/>
                                    </g>
                                    <g transform="translate(296, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#38bdf8" stroke-width="1.4"/>
                                        <rect x="2" y="14" width="14" height="18" rx="3" fill="#38bdf8"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#0284c7"/>
                                    </g>
                                    <g transform="translate(318, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#34d399" stroke-width="1.4"/>
                                        <rect x="2" y="14" width="14" height="18" rx="3" fill="#86efac"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#15803d"/>
                                    </g>
                                    <g transform="translate(364, 242)">
                                        <rect x="0" y="6" width="34" height="28" rx="4" fill="#ffffff" stroke="#0284c7" stroke-width="1.4"/>
                                        <rect x="3" y="11" width="28" height="8" rx="2" fill="#e0f2fe"/>
                                        <text x="17" y="16.8" text-anchor="middle" fill="#0369a1" font-size="5" font-weight="800" font-family="Inter, sans-serif">VONTROL</text>
                                        <line x1="5" y1="25" x2="29" y2="25" stroke="#94a3b8" stroke-width="1.5"/>
                                    </g>
                                    <g transform="translate(404, 245)">
                                        <rect x="0" y="5" width="32" height="25" rx="4" fill="#f5f3ff" stroke="#6d28d9" stroke-width="1.3"/>
                                        <rect x="3" y="10" width="26" height="7" rx="2" fill="#ede9fe"/>
                                        <text x="16" y="15.2" text-anchor="middle" fill="#5b21b6" font-size="4.6" font-weight="800" font-family="Inter, sans-serif">SPECTRILA</text>
                                    </g>
                                @elseif($userSceneVariant === 1)
                                    {{-- Variante 1: Tubos Depresibles ANDANTOL GEL + Tarros + Cajas Lote Liberado --}}
                                    <g transform="translate(148, 242)">
                                        <polygon points="3,8 17,8 15,32 5,32" fill="#ffffff" stroke="#0284c7" stroke-width="1.2"/>
                                        <rect x="5" y="14" width="10" height="12" rx="2" fill="#7dd3fc"/>
                                        <rect x="7" y="3" width="6" height="5" rx="1.5" fill="#1e293b"/>
                                    </g>
                                    <g transform="translate(178, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#94a3b8" stroke-width="1.2"/>
                                        <rect x="2" y="15" width="14" height="17" rx="3" fill="#f9a8d4"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#831843"/>
                                    </g>
                                    <g transform="translate(208, 248)">
                                        <rect x="0" y="6" width="22" height="20" rx="5" fill="#ffffff" stroke="#64748b" stroke-width="1.2"/>
                                        <rect x="2" y="2" width="18" height="5" rx="2.5" fill="#2d3748"/>
                                        <rect x="3" y="11" width="16" height="11" rx="2" fill="#c4b5fd"/>
                                    </g>
                                    <g transform="translate(296, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#38bdf8" stroke-width="1.4"/>
                                        <rect x="2" y="14" width="14" height="18" rx="3" fill="#38bdf8"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#0284c7"/>
                                    </g>
                                    <g transform="translate(318, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#34d399" stroke-width="1.4"/>
                                        <rect x="2" y="14" width="14" height="18" rx="3" fill="#86efac"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#15803d"/>
                                    </g>
                                    <g transform="translate(364, 242)">
                                        <rect x="0" y="6" width="35" height="28" rx="4" fill="#ffffff" stroke="#15803d" stroke-width="1.4"/>
                                        <rect x="3" y="11" width="29" height="8" rx="2" fill="#dcfce7"/>
                                        <text x="17.5" y="16.8" text-anchor="middle" fill="#166534" font-size="4.8" font-weight="800" font-family="Inter, sans-serif">ANDANTOL</text>
                                        <line x1="5" y1="25" x2="30" y2="25" stroke="#86efac" stroke-width="1.5"/>
                                    </g>
                                    <g transform="translate(405, 246)">
                                        <rect x="0" y="6" width="30" height="24" rx="4" fill="#F3E8ED" stroke="#666F88" stroke-width="1.3"/>
                                        <rect x="3" y="11" width="24" height="7" rx="2" fill="#e0f2fe"/>
                                        <text x="15" y="16.2" text-anchor="middle" fill="#0369a1" font-size="4.8" font-weight="800" font-family="Inter, sans-serif">GEL 100G</text>
                                    </g>
                                @elseif($userSceneVariant === 2)
                                    {{-- Variante 2: Frascos Tabletas PIRIMIR + Blísters POSIPEN + Cajas Sólidos Orales --}}
                                    <g transform="translate(146, 243)">
                                        <rect x="0" y="8" width="20" height="25" rx="4" fill="#ffffff" stroke="#64748b" stroke-width="1.2"/>
                                        <rect x="2" y="14" width="16" height="14" rx="2" fill="#fde68a"/>
                                        <rect x="3" y="2" width="14" height="6" rx="2" fill="#b45309"/>
                                    </g>
                                    <g transform="translate(176, 246)">
                                        <rect x="0" y="4" width="22" height="26" rx="3" fill="#e2e8f0" stroke="#64748b" stroke-width="1.2"/>
                                        <circle cx="6.5" cy="11" r="3" fill="#38bdf8"/>
                                        <circle cx="15.5" cy="11" r="3" fill="#38bdf8"/>
                                        <circle cx="6.5" cy="21" r="3" fill="#34d399"/>
                                        <circle cx="15.5" cy="21" r="3" fill="#34d399"/>
                                    </g>
                                    <g transform="translate(208, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#94a3b8" stroke-width="1.2"/>
                                        <rect x="2" y="15" width="14" height="17" rx="3" fill="#93c5fd"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#1e3a8a"/>
                                    </g>
                                    <g transform="translate(296, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#38bdf8" stroke-width="1.4"/>
                                        <rect x="2" y="14" width="14" height="18" rx="3" fill="#38bdf8"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#0284c7"/>
                                    </g>
                                    <g transform="translate(318, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#34d399" stroke-width="1.4"/>
                                        <rect x="2" y="14" width="14" height="18" rx="3" fill="#86efac"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#15803d"/>
                                    </g>
                                    <g transform="translate(364, 242)">
                                        <rect x="0" y="6" width="34" height="28" rx="4" fill="#ffffff" stroke="#b45309" stroke-width="1.4"/>
                                        <rect x="3" y="11" width="28" height="8" rx="2" fill="#fef3c7"/>
                                        <text x="17" y="16.8" text-anchor="middle" fill="#92400e" font-size="5" font-weight="800" font-family="Inter, sans-serif">POSIPEN</text>
                                        <line x1="5" y1="25" x2="29" y2="25" stroke="#f59e0b" stroke-width="1.5"/>
                                    </g>
                                    <g transform="translate(404, 246)">
                                        <rect x="0" y="6" width="30" height="24" rx="4" fill="#eff6ff" stroke="#1d4ed8" stroke-width="1.3"/>
                                        <rect x="3" y="11" width="24" height="7" rx="2" fill="#dbeafe"/>
                                        <text x="15" y="16.2" text-anchor="middle" fill="#1e40af" font-size="5" font-weight="800" font-family="Inter, sans-serif">PIRIMIR</text>
                                    </g>
                                @else
                                    {{-- Variante 3: Botellas Graduadas EMULMAX + Goteros LEVOFLOX + Cajas SA/G1 --}}
                                    <g transform="translate(146, 240)">
                                        <rect x="0" y="8" width="20" height="28" rx="5" fill="#ffffff" stroke="#0d9488" stroke-width="1.2"/>
                                        <rect x="2" y="15" width="16" height="18" rx="3" fill="#5eead4"/>
                                        <rect x="5" y="2" width="10" height="6" rx="2" fill="#115e59"/>
                                    </g>
                                    <g transform="translate(178, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#94a3b8" stroke-width="1.2"/>
                                        <rect x="2" y="15" width="14" height="17" rx="3" fill="#fda4af"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#9f1239"/>
                                    </g>
                                    <g transform="translate(208, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#94a3b8" stroke-width="1.2"/>
                                        <rect x="2" y="15" width="14" height="17" rx="3" fill="#7dd3fc"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#2d3748"/>
                                    </g>
                                    <g transform="translate(296, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#38bdf8" stroke-width="1.4"/>
                                        <rect x="2" y="14" width="14" height="18" rx="3" fill="#38bdf8"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#0284c7"/>
                                    </g>
                                    <g transform="translate(318, 244)">
                                        <rect x="0" y="8" width="18" height="26" rx="5" fill="#ffffff" stroke="#34d399" stroke-width="1.4"/>
                                        <rect x="2" y="14" width="14" height="18" rx="3" fill="#86efac"/>
                                        <rect x="4" y="2" width="10" height="6" rx="2" fill="#15803d"/>
                                    </g>
                                    <g transform="translate(364, 242)">
                                        <rect x="0" y="6" width="34" height="28" rx="4" fill="#ffffff" stroke="#0f766e" stroke-width="1.4"/>
                                        <rect x="3" y="11" width="28" height="8" rx="2" fill="#ccfbf1"/>
                                        <text x="17" y="16.8" text-anchor="middle" fill="#115e59" font-size="4.8" font-weight="800" font-family="Inter, sans-serif">EMULMAX</text>
                                        <line x1="5" y1="25" x2="29" y2="25" stroke="#5eead4" stroke-width="1.5"/>
                                    </g>
                                    <g transform="translate(404, 246)">
                                        <rect x="0" y="6" width="31" height="24" rx="4" fill="#fff1f2" stroke="#be123c" stroke-width="1.3"/>
                                        <rect x="3" y="11" width="25" height="7" rx="2" fill="#ffe4e6"/>
                                        <text x="15.5" y="16.2" text-anchor="middle" fill="#9f1239" font-size="4.6" font-weight="800" font-family="Inter, sans-serif">LEVOFLOX</text>
                                    </g>
                                @endif
                            </g>

                            {{-- Estructura Cápsula de la Banda Transportadora (Conveyor Belt) --}}
                            <rect x="128" y="274" width="318" height="24" rx="12" fill="url(#conveyorBeltGrad)" stroke="#ffffff" stroke-width="1.8"/>
                            <rect x="134" y="278" width="306" height="16" rx="8" fill="rgba(255,255,255,0.12)"/>

                            {{-- Rodillos Metálicos de la Línea de Producción --}}
                            @for($rol = 0; $rol < 9; $rol++)
                                <circle cx="{{ 150 + ($rol * 34) }}" cy="286" r="5.5" fill="#e2e8f0" stroke="#475569" stroke-width="1.4"/>
                                <circle cx="{{ 150 + ($rol * 34) }}" cy="286" r="2" fill="#2d3748"/>
                            @endfor

                            {{-- Placa Frontal de Cristal sobre el Podio con el Nombre y Rol del Usuario --}}
                            <rect x="172" y="301" width="216" height="22" rx="11" fill="#ffffff" stroke="{{ $uTheme['signBorder'] }}" stroke-width="1.5"/>
                            <circle cx="186" cy="312" r="4.5" fill="{{ $uTheme['dotColor'] }}"/>
                            <text x="285" y="314.8" text-anchor="middle" fill="{{ $uTheme['signBg1'] }}" font-size="6.8" font-weight="900" letter-spacing="0.6" font-family="Inter, sans-serif">{{ $shortUserName }} • {{ mb_strtoupper($currentRoleLabel) }}</text>
                        </g>

                        {{-- 6. NUBES 3D METÁLICO-PERLA FLOTANTES (DIFERENTES POR USUARIO) --}}
                        @if($userSceneVariant === 0)
                            {{-- Constelación de Nubes Usuario 0 (4 Nubes: Derecha Alta, Centro-Izq, Media Izq y Derecha Baja) --}}
                            <g class="stage-cloud-anim-1">
                                <ellipse cx="468" cy="72" rx="20" ry="13" fill="url(#cloudOrbLight)"/>
                                <circle cx="450" cy="68" r="14" fill="url(#cloudOrbLight)"/>
                                <circle cx="485" cy="69" r="13" fill="url(#cloudOrbLight)"/>
                                <circle cx="467" cy="58" r="16" fill="url(#cloudOrbLight)"/>
                                <circle cx="436" cy="72" r="8.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="497" cy="73" r="8" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-2">
                                <ellipse cx="176" cy="70" rx="14" ry="9" fill="url(#cloudOrbLight)"/>
                                <circle cx="164" cy="68" r="9.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="188" cy="69" r="9" fill="url(#cloudOrbLight)"/>
                                <circle cx="176" cy="60" r="11.5" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-3">
                                <ellipse cx="88" cy="182" rx="16" ry="10.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="74" cy="179" r="11" fill="url(#cloudOrbLight)"/>
                                <circle cx="102" cy="180" r="10.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="88" cy="170" r="13" fill="url(#cloudOrbLight)"/>
                                <circle cx="64" cy="182" r="7" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-2">
                                <ellipse cx="484" cy="172" rx="12" ry="8" fill="url(#cloudOrbLight)"/>
                                <circle cx="474" cy="170" r="8.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="494" cy="171" r="8" fill="url(#cloudOrbLight)"/>
                                <circle cx="484" cy="164" r="10" fill="url(#cloudOrbLight)"/>
                            </g>
                        @elseif($userSceneVariant === 1)
                            {{-- Constelación de Nubes Usuario 1 (4 Nubes: Derecha Media, Izquierda Alta Doble, Baja Izq y Cúmulo Superior) --}}
                            <g class="stage-cloud-anim-1">
                                <ellipse cx="458" cy="84" rx="18" ry="12" fill="url(#cloudOrbLight)"/>
                                <circle cx="442" cy="80" r="13" fill="url(#cloudOrbLight)"/>
                                <circle cx="474" cy="81" r="12" fill="url(#cloudOrbLight)"/>
                                <circle cx="457" cy="71" r="15" fill="url(#cloudOrbLight)"/>
                                <circle cx="430" cy="84" r="8" fill="url(#cloudOrbLight)"/>
                                <circle cx="485" cy="85" r="7.5" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-2">
                                <ellipse cx="198" cy="68" rx="15" ry="9.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="185" cy="65" r="10" fill="url(#cloudOrbLight)"/>
                                <circle cx="210" cy="66" r="9.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="198" cy="58" r="12" fill="url(#cloudOrbLight)"/>
                                <circle cx="175" cy="68" r="6.5" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-3">
                                <ellipse cx="94" cy="198" rx="15" ry="10" fill="url(#cloudOrbLight)"/>
                                <circle cx="81" cy="195" r="10.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="107" cy="196" r="10" fill="url(#cloudOrbLight)"/>
                                <circle cx="94" cy="187" r="12.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="71" cy="198" r="6.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="116" cy="199" r="6" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-1">
                                <ellipse cx="114" cy="108" rx="11" ry="7.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="105" cy="106" r="7.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="123" cy="107" r="7" fill="url(#cloudOrbLight)"/>
                                <circle cx="114" cy="100" r="9" fill="url(#cloudOrbLight)"/>
                            </g>
                        @elseif($userSceneVariant === 2)
                            {{-- Constelación de Nubes Usuario 2 (4 Nubes: Cúmulo Alto Izq, Derecha Panorámica, Media Der y Baja Izq) --}}
                            <g class="stage-cloud-anim-2">
                                <ellipse cx="152" cy="78" rx="17" ry="11" fill="url(#cloudOrbLight)"/>
                                <circle cx="138" cy="74" r="12" fill="url(#cloudOrbLight)"/>
                                <circle cx="166" cy="75" r="11.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="152" cy="66" r="14" fill="url(#cloudOrbLight)"/>
                                <circle cx="127" cy="78" r="7.5" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-1">
                                <ellipse cx="472" cy="66" rx="16" ry="10.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="458" cy="63" r="11.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="486" cy="64" r="11" fill="url(#cloudOrbLight)"/>
                                <circle cx="472" cy="55" r="13.5" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-3">
                                <ellipse cx="478" cy="154" rx="14" ry="9" fill="url(#cloudOrbLight)"/>
                                <circle cx="466" cy="151" r="9.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="490" cy="152" r="9" fill="url(#cloudOrbLight)"/>
                                <circle cx="478" cy="144" r="11.5" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-1">
                                <ellipse cx="86" cy="212" rx="13" ry="8.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="75" cy="209" r="9" fill="url(#cloudOrbLight)"/>
                                <circle cx="97" cy="210" r="8.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="86" cy="202" r="11" fill="url(#cloudOrbLight)"/>
                            </g>
                        @else
                            {{-- Constelación de Nubes Usuario 3 (5 Nubes Esponjosas en Arco) --}}
                            <g class="stage-cloud-anim-1">
                                <ellipse cx="464" cy="92" rx="19" ry="12.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="447" cy="88" r="13.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="481" cy="89" r="12.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="463" cy="79" r="15.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="434" cy="92" r="8" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-2">
                                <ellipse cx="212" cy="64" rx="13" ry="8.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="201" cy="62" r="9" fill="url(#cloudOrbLight)"/>
                                <circle cx="223" cy="63" r="8.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="212" cy="56" r="10.5" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-3">
                                <ellipse cx="104" cy="168" rx="16" ry="10.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="90" cy="165" r="11" fill="url(#cloudOrbLight)"/>
                                <circle cx="118" cy="166" r="10.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="104" cy="156" r="13" fill="url(#cloudOrbLight)"/>
                                <circle cx="79" cy="168" r="7" fill="url(#cloudOrbLight)"/>
                            </g>
                            <g class="stage-cloud-anim-2">
                                <ellipse cx="476" cy="188" rx="12" ry="8" fill="url(#cloudOrbLight)"/>
                                <circle cx="466" cy="186" r="8.5" fill="url(#cloudOrbLight)"/>
                                <circle cx="486" cy="187" r="8" fill="url(#cloudOrbLight)"/>
                                <circle cx="476" cy="180" r="10" fill="url(#cloudOrbLight)"/>
                            </g>
                        @endif
                    </svg>
                </div>

            </div>

            {{-- BARRA INFERIOR MINIMALISTA CON DIVISORES VERTICALES (IDÉNTICA A LA REFERENCIA) --}}
            <div class="stage-bottom-strip">
                <span class="stage-divider-tick"></span>

                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="stage-bottom-item border-0 bg-transparent" onclick="switchSection('ordenes')" title="Seleccionar Planta">
                        <i class="bi bi-compass" style="color: #666F88;"></i>
                        <span>Planta G1 · SA · DF</span>
                    </button>
                    <button type="button" class="stage-bottom-item border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#newBatchModal" title="Crear Nueva Orden de Producción">
                        <i class="bi bi-plus-circle" style="color: #666F88;"></i>
                        <span>Nueva OP</span>
                    </button>
                </div>

                <span class="stage-divider-tick"></span>

                <div class="stage-center-brand-badge" onclick="switchSection('dashboard')" style="cursor: pointer;">
                    <span>GRIMANN</span>
                    <span class="stage-center-ring">14</span>
                    <span style="font-weight: 600; color: #4a5568;">BATCH RECORD</span>
                </div>

                <span class="stage-divider-tick"></span>

                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="stage-bottom-item border-0 bg-transparent" onclick="switchSection('historial')" title="Ver Tarjetas En Proceso">
                        <span class="rounded-circle d-inline-block" style="width: 8px; height: 8px; background: #38bdf8; box-shadow: 0 0 6px #38bdf8;"></span>
                        <span>{{ $homeActiveOps }} En Proceso</span>
                    </button>
                    <button type="button" class="stage-bottom-item border-0 bg-transparent" onclick="switchSection('ordenes')" title="Ver Órdenes Pendientes">
                        <span class="rounded-circle d-inline-block" style="width: 8px; height: 8px; background: #fbbf24;"></span>
                        <span>{{ $homePendingOps }} Pendientes</span>
                    </button>
                    <button type="button" class="stage-bottom-item border-0 bg-transparent" onclick="openSearchExistingBatch()" title="Buscar Lote u OP">
                        <i class="bi bi-search" style="color: #666F88;"></i>
                        <span>{{ $homeTotalOps }} OPs</span>
                    </button>
                </div>

                <span class="stage-divider-tick"></span>
            </div>

        </div>
    </div>

    {{-- ===================================================================== --}}
    {{-- SECCIÓN 2A: ÓRDENES DE PRODUCCIÓN (SELECCIÓN Y APROBACIÓN DE OPs)     --}}
    {{-- ===================================================================== --}}
    <div id="sec_ordenes" class="app-section-pane hig-spring-pane {{ $activeSection === 'ordenes' ? '' : 'd-none' }}">

        {{-- 1. Encabezado Glassmorphic Institucional: ÓRDENES DE PRODUCCIÓN --}}
        <div class="tc-top-banner d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-layers-half fs-5" style="color: #b5bac9;"></i>
                <span class="small fw-semibold d-none d-md-inline" style="color: #e2e8f0;">Selección y Aprobación de OPs</span>
            </div>

            <h2 class="tc-top-title text-center">ÓRDENES DE PRODUCCIÓN</h2>

            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn btn-sm text-white rounded-pill px-3 py-1"
                        style="background: rgba(255,255,255,0.22); border: 1px solid rgba(255,255,255,0.4);"
                        onclick="switchSection('historial')"
                        title="Ver capturas En Proceso">
                    <i class="bi bi-grid-fill me-1"></i><span class="small fw-semibold">En Proceso ({{ $stats['en_proceso'] ?? 0 }})</span>
                </button>
                <button type="button" class="btn btn-sm text-white rounded-pill px-3 py-1"
                        style="background: rgba(255,255,255,0.14); border: 1px solid rgba(255,255,255,0.32);"
                        data-bs-toggle="modal" data-bs-target="#newBatchModal"
                        title="Registrar Nueva OP">
                    <i class="bi bi-plus-lg me-1"></i><span class="small fw-semibold">Nueva OP</span>
                </button>
            </div>
        </div>

        {{-- 2. Barra de Búsqueda y Selector de Planta --}}
        <div class="row g-2 align-items-center mb-3">
            <div class="col-md-9 col-lg-9">
                <div class="tc-search-box">
                    <i class="bi bi-search" style="color: #666F88;"></i>
                    <input type="text" id="tcSearchInput" placeholder="Buscar por OP, lote, producto o código en tabla FSO..." autocomplete="off">
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <select id="tcPlantSelect" class="tc-select-control w-100">
                    <option value="">Todas las plantas</option>
                    <option value="G1">Planta G1</option>
                    <option value="SA">Planta SA</option>
                    <option value="DF">Planta DF</option>
                    <option value="GF">Planta GF</option>
                    <option value="LS">Planta LS</option>
                    <option value="G2">Planta G2</option>
                    <option value="G3">Planta G3</option>
                    <option value="MPC">Planta MPC</option>
                </select>
            </div>
        </div>

        @php
            $fsoItems = $fsoPageData['items'] ?? [];
            $fsoTotal = $fsoPageData['total'] ?? count($fsoItems);
            $fsoPage = $fsoPageData['page'] ?? 1;
            $fsoLastPage = $fsoPageData['last_page'] ?? 1;
        @endphp

        {{-- 3. Formulario de Selección y Aprobación hacia la Etapa de Captura --}}
        <form id="tcApproveForm" method="POST" action="{{ route('batches.approve') }}">
            @csrf

            {{-- Barra de Selección y Botones de Aprobación hacia Captura --}}
            <div class="tc-selection-bar d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
                <div class="d-flex align-items-center gap-2">
                    <input type="checkbox" id="tcSelectAll" class="tc-checkbox" title="Seleccionar todas las OPs visibles">
                    <label for="tcSelectAll" class="mb-0 small" style="cursor: pointer;">
                        <strong id="tcSelectedNum" style="color: #2d3748;">0</strong>
                        <strong style="color: #2d3748;">seleccionadas</strong>
                        <span class="text-muted">· <span id="tcVisibleNum">{{ count($fsoItems) }}</span> OPs en esta vista (<span id="tcTotalFsoNum">{{ number_format($fsoTotal) }}</span> en FSO)</span>
                    </label>
                </div>

                <input type="hidden" name="action_mode" value="approve_and_fill">

                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button type="button"
                            id="tcPrevPageBtn"
                            class="btn btn-sm rounded-pill px-2.5 py-0.5"
                            style="background: rgba(255,255,255,0.75); border: 1px solid rgba(102,111,136,0.25); color: #2d3748; font-size: 0.75rem; font-weight: 600;"
                            onclick="changeTcPage(-1)"
                            {{ $fsoPage <= 1 ? 'disabled' : '' }}>
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <span class="text-muted small" id="tcPageIndicator">Página {{ $fsoPage }} de {{ $fsoLastPage }}</span>
                    <button type="button"
                            id="tcNextPageBtn"
                            class="btn btn-sm rounded-pill px-2.5 py-0.5"
                            style="background: rgba(255,255,255,0.75); border: 1px solid rgba(102,111,136,0.25); color: #2d3748; font-size: 0.75rem; font-weight: 600;"
                            onclick="changeTcPage(1)"
                            {{ $fsoPage >= $fsoLastPage ? 'disabled' : '' }}>
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

            {{-- 5. Lista de Órdenes de Producción en Tarjetas Horizontales (Cargadas desde tabla FSO) --}}
            <div class="section-card p-3 p-md-4">
                <div class="d-flex flex-column gap-2" id="tcTableBody">
                    @forelse($fsoItems as $opItem)
                        @php
                            $opKey = $opItem['key'];
                            $opStatus = $opItem['status'] ?? 'Pendiente';
                            $isPending = ($opStatus === 'Pendiente');
                            $isFinished = ($opStatus === 'Finalizado');
                            $planta = $opItem['planta'] ?? 'G1';
                            $opDisplay = $opItem['op_display'];
                            $opLote = $opItem['lote'] ?? 'S/L';
                            $opProducto = $opItem['producto'] ?? '';
                            $opCodigo = $opItem['codigo'] ?? 'S/C';
                            $tabCategory = match($opStatus) {
                                'Pendiente'  => 'pendientes',
                                'Finalizado' => 'terminadas',
                                default      => 'aprobadas',
                            };
                            $searchString = strtolower($opDisplay . ' ' . $opProducto . ' ' . $opCodigo . ' ' . $opLote . ' ' . $planta);
                        @endphp
                        <div class="recent-row-item tc-op-row d-flex flex-column gap-2"
                             data-op-id="{{ $opKey }}"
                             data-op-tab="{{ $tabCategory }}"
                             data-op-planta="{{ $planta }}"
                             data-op-search="{{ $searchString }}"
                             onclick="toggleOpRowSelection(this, event)">

                            <div class="d-flex align-items-center gap-3 w-100" style="min-width: 0;">
                                {{-- Casilla de Selección para Aprobar OP --}}
                                <input type="checkbox"
                                       name="op_ids[]"
                                       value="{{ $opKey }}"
                                       class="tc-checkbox tc-row-check flex-shrink-0"
                                       onclick="event.stopPropagation(); onOpCheckboxChange(this);">

                                {{-- Información limpia de la OP: Primero la OP, Lote, Producto y Planta (sin pasos) --}}
                                <div class="flex-grow-1" style="min-width: 0;">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <span class="fw-bold" style="font-size: 1rem; color: #2d3748; letter-spacing: -0.01em;">{{ $opDisplay }}</span>
                                            <span class="badge text-dark" id="op_lote_badge_{{ $opKey }}" style="background: rgba(255,255,255,0.78); border: 1px solid rgba(255,255,255,0.55); font-size: 0.74rem;">Lote: {{ $opLote }}</span>
                                            <span class="badge text-truncate" style="max-width: 480px; background: rgba(255,255,255,0.55); border: 1px solid rgba(255,255,255,0.45); color: #666F88; font-size: 0.72rem; font-weight: 600;">
                                                {{ $opProducto }} ({{ $opCodigo }}) · Planta {{ $planta }}
                                            </span>
                                        </div>
                                        <span class="badge rounded-pill" style="background: {{ $isPending ? 'rgba(245, 158, 11, 0.14)' : ($isFinished ? 'rgba(59, 130, 246, 0.14)' : 'rgba(16, 185, 129, 0.14)') }}; color: {{ $isPending ? '#b45309' : ($isFinished ? '#1d4ed8' : '#065f46') }}; border: 1px solid {{ $isPending ? 'rgba(245, 158, 11, 0.28)' : ($isFinished ? 'rgba(59, 130, 246, 0.28)' : 'rgba(16, 185, 129, 0.28)') }}; font-size: 0.7rem; font-weight: 600;">
                                            {{ $isPending ? 'Pendiente' : ($isFinished ? 'Terminada' : 'En Proceso') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {{-- Campos desplegables al seleccionar la OP: Lote, Tamaño de Lote y Botón Iniciar Fabricación a la derecha --}}
                            <div class="tc-op-expand-fields" onclick="event.stopPropagation();">
                                <div class="row g-3 align-items-end">
                                    <div class="col-sm-6 col-md-4 col-lg-5">
                                        <label class="tc-inline-label" for="op_lote_input_{{ $opKey }}">
                                            <i class="bi bi-upc-scan" style="color: #666F88;"></i>
                                            <span>Lote</span>
                                        </label>
                                        <input type="text"
                                               id="op_lote_input_{{ $opKey }}"
                                               name="op_lote[{{ $opKey }}]"
                                               value=""
                                               class="tc-inline-input"
                                               placeholder="Escribe el número de lote..."
                                               oninput="onOpInlineFieldsInput('{{ $opKey }}', '{{ addslashes($opLote) }}')">
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <label class="tc-inline-label" for="op_tamano_input_{{ $opKey }}">
                                            <i class="bi bi-box-seam" style="color: #666F88;"></i>
                                            <span>Tamaño de Lote</span>
                                        </label>
                                        <input type="text"
                                               id="op_tamano_input_{{ $opKey }}"
                                               name="op_tamano_lote[{{ $opKey }}]"
                                               value=""
                                               class="tc-inline-input"
                                               placeholder="Escribe el tamaño de lote..."
                                               oninput="onOpInlineFieldsInput('{{ $opKey }}', '{{ addslashes($opLote) }}')">
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 d-flex align-items-center justify-content-end">
                                        <span id="op_pending_hint_{{ $opKey }}"
                                              class="badge rounded-pill px-2.5 py-1.5"
                                              style="background: rgba(148, 163, 184, 0.14); color: #64748b; border: 1px solid rgba(148, 163, 184, 0.28); font-size: 0.7rem;">
                                            <i class="bi bi-pencil-square me-1"></i>Completa Lote y Tamaño
                                        </span>
                                        <button type="button"
                                                id="op_inline_start_btn_{{ $opKey }}"
                                                class="tc-approve-btn d-none w-100 justify-content-center"
                                                style="padding: 0.52rem 1rem; font-size: 0.79rem; white-space: nowrap;"
                                                onclick="startSingleOpFabrication('{{ $opKey }}')">
                                            <i class="bi bi-play-circle-fill"></i>
                                            <span>Iniciar Fabricación</span>
                                            <i class="bi bi-arrow-right-short fs-6"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5 text-muted">
                            No hay Órdenes de Producción registradas.
                        </div>
                    @endforelse
                </div>
            </div>
        </form>
    </div>

    {{-- ===================================================================== --}}
    {{-- SECCIÓN 2B: CAPTURA (LLENADO PASO A PASO DE LAS OPs APROBADAS)        --}}
    {{-- ===================================================================== --}}
    <div id="sec_captura" class="app-section-pane hig-spring-pane {{ $activeSection === 'captura' ? '' : 'd-none' }}">
        @php
            $approvedForCapture = $batches->whereIn('status', ['En Proceso', 'Aprobada', 'En Verificación', 'Con Desviación', 'Finalizado']);
            if ($approvedForCapture->isEmpty()) {
                $approvedForCapture = $batches;
            }
        @endphp

        <div class="tc-top-banner d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn btn-sm text-white rounded-pill px-3 py-1"
                        style="background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.38);"
                        onclick="switchSection('ordenes')">
                    <i class="bi bi-arrow-left me-1"></i><span class="small fw-semibold">Órdenes de Producción</span>
                </button>
            </div>

            <h2 class="tc-top-title text-center">CAPTURA DE BATCH RECORD (14 PÁGINAS)</h2>

            <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-pill px-3 py-1.5" style="background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.35); color: #fff; font-weight: 600;">
                    {{ $approvedForCapture->count() }} OPs en Captura
                </span>
            </div>
        </div>

        <div class="section-card p-3 p-md-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                <div>
                    <h6 class="fw-bold mb-0" style="font-size: 0.98rem; color: #2d3748;">Órdenes de Producción Aprobadas para Captura</h6>
                    <small class="text-muted" style="font-size: 0.78rem;">Selecciona el lote aprobado para llenar las 14 páginas del formato oficial FGEN.018-1 V00 paso a paso</small>
                </div>
                <button type="button" class="btn btn-sm btn-outline-wine-pill py-1 px-3" onclick="switchSection('ordenes')">
                    <i class="bi bi-check2-square me-1"></i>Seleccionar más OPs
                </button>
            </div>

            <div class="d-flex flex-column gap-2">
                @forelse($approvedForCapture as $b)
                    @php
                        $isPending = ($b->status === 'Pendiente');
                        $isFinished = ($b->status === 'Finalizado');
                        $pct = $isPending ? 0 : $b->progressPercentage();
                        $completedSteps = $isPending ? 0 : ($isFinished ? 7 : max(1, (int) $b->current_step));
                        $planta = $b->val('planta', 'G1');
                        $opDisplay = str_starts_with(strtoupper(trim($b->orden_produccion)), 'OP')
                            ? trim($b->orden_produccion)
                            : 'OP-' . trim($b->orden_produccion);
                    @endphp
                    <div class="recent-row-item d-flex flex-wrap flex-lg-nowrap align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3 flex-grow-1" style="min-width: 0;">
                            <div class="rounded-3 d-flex align-items-center justify-content-center fw-bold text-white flex-shrink-0"
                                 style="width: 44px; height: 44px; background: rgba(45, 55, 72, 0.85); border: 1px solid rgba(255,255,255,0.35); font-size: 0.8rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);">
                                {{ $completedSteps }}/7
                            </div>
                            <div class="flex-grow-1" style="min-width: 0; max-width: 680px;">
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-1">
                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                        <span class="fw-bold" style="font-size: 0.98rem; color: #2d3748; letter-spacing: -0.01em;">{{ $opDisplay }}</span>
                                        <span class="badge text-dark" style="background: rgba(255,255,255,0.78); border: 1px solid rgba(255,255,255,0.55); font-size: 0.73rem;">Lote: {{ $b->lote }}</span>
                                        <span class="badge text-truncate" style="max-width: 360px; background: rgba(255,255,255,0.55); border: 1px solid rgba(255,255,255,0.45); color: #666F88; font-size: 0.7rem; font-weight: 600;">
                                            {{ $b->producto }} · Planta {{ $planta }}
                                        </span>
                                    </div>
                                    <span class="small fw-bold" style="color: #666F88; font-size: 0.76rem;">{{ $pct }}%</span>
                                </div>
                                <div class="text-muted mb-1" style="font-size: 0.77rem;">
                                    {{ $stepNames[$b->current_step] ?? 'Paso ' . $b->current_step }}
                                </div>
                                <div class="tc-step-segments">
                                    @for($s = 1; $s <= 7; $s++)
                                        <span class="tc-step-seg {{ $s < $completedSteps || $isFinished ? 'is-done' : ($s === $completedSteps && !$isPending ? 'is-current' : '') }}"></span>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2 ms-auto flex-shrink-0">
                            <a href="{{ route('batches.edit', ['batch' => $b->id, 'step' => $b->current_step]) }}"
                               class="btn btn-sm btn-wine-pill py-1.5 px-3">
                                <i class="bi bi-play-fill"></i>
                                <span>Continuar Captura (14 Págs.)</span>
                            </a>
                            @if($isFinished)
                                <a href="{{ route('batches.print', $b->id) }}"
                                   target="_blank"
                                   class="hig-icon-btn"
                                   title="Imprimir 14 Hojas">
                                    <i class="bi bi-printer"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 text-muted">
                        No hay Órdenes de Producción aprobadas en captura.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- ===================================================================== --}}
    {{-- SECCIÓN 3: DASHBOARD DE ESTATUS DE ÓRDENES DE PRODUCCIÓN              --}}
    {{-- ===================================================================== --}}
    <div id="sec_dashboard" class="app-section-pane hig-spring-pane {{ $activeSection === 'dashboard' ? '' : 'd-none' }}">
        @php
            $totalOpsCount = $batches->count();
            $pendingOpsCount = $batches->where('status', 'Pendiente')->count();
            $finishedOpsCount = $batches->filter(fn($item) => $item->status === 'Finalizado' || ($item->status !== 'Pendiente' && $item->progressPercentage() >= 100))->count();
            $inProcessOpsCount = $batches->filter(fn($item) => $item->status !== 'Pendiente' && $item->status !== 'Finalizado' && $item->progressPercentage() < 100)->count();
            $deviationOpsCount = $batches->where('status', 'Con Desviación')->count();

            $avgProgressPct = $totalOpsCount > 0
                ? round($batches->avg(fn($item) => $item->status === 'Pendiente' ? 0 : $item->progressPercentage()))
                : 0;

            $pctPending = $totalOpsCount > 0 ? round(($pendingOpsCount / $totalOpsCount) * 100) : 0;
            $pctInProcess = $totalOpsCount > 0 ? round(($inProcessOpsCount / $totalOpsCount) * 100) : 0;
            $pctFinished = $totalOpsCount > 0 ? round(($finishedOpsCount / $totalOpsCount) * 100) : 0;
            $pctDeviation = $totalOpsCount > 0 ? max(0, 100 - $pctPending - $pctInProcess - $pctFinished) : 0;

            // Circunferencia para r=66 => 2 * pi * 66 = 414.69
            $circ = 414.69;
            $lenInProcess = ($pctInProcess / 100) * $circ;
            $lenPending = ($pctPending / 100) * $circ;
            $lenFinished = ($pctFinished / 100) * $circ;
            $lenDeviation = ($pctDeviation / 100) * $circ;

            $stepShortLabels = [
                1 => ['title' => 'Paso 1 · Portada y Presentación', 'icon' => 'bi-person-vcard', 'bg' => '#e0f2fe', 'bar' => '#7dd3fc', 'text' => '#075985'],
                2 => ['title' => 'Paso 2 · Despeje y Equipos', 'icon' => 'bi-clipboard2-check', 'bg' => '#dbeafe', 'bar' => '#93c5fd', 'text' => '#1e40af'],
                3 => ['title' => 'Paso 3 · Monitoreo y Materias Primas', 'icon' => 'bi-box-seam', 'bg' => '#ede9fe', 'bar' => '#c4b5fd', 'text' => '#5b21b6'],
                4 => ['title' => 'Paso 4 · Preparación Fase I', 'icon' => 'bi-droplet-half', 'bg' => '#fae8ff', 'bar' => '#e9d5ff', 'text' => '#6b21a8'],
                5 => ['title' => 'Paso 5 · Preparación Fase II', 'icon' => 'bi-moisture', 'bg' => '#ccfbf1', 'bar' => '#99f6e4', 'text' => '#115e59'],
                6 => ['title' => 'Paso 6 · Mezcla Final y pH', 'icon' => 'bi-sliders2', 'bg' => '#fef3c7', 'bar' => '#fde68a', 'text' => '#92400e'],
                7 => ['title' => 'Paso 7 · Descargo y Rendimiento', 'icon' => 'bi-bar-chart-line', 'bg' => '#dcfce7', 'bar' => '#86efac', 'text' => '#166534'],
            ];

            $availableDashYears = $batches->toBase()->map(function($item) {
                $dt = $item->updated_at ?? $item->created_at;
                return $dt ? $dt->format('Y') : date('Y');
            })->merge(['2026', '2025', '2024'])->unique()->sortDesc()->values();

            $dashMonthsList = [
                '01' => 'Enero',
                '02' => 'Febrero',
                '03' => 'Marzo',
                '04' => 'Abril',
                '05' => 'Mayo',
                '06' => 'Junio',
                '07' => 'Julio',
                '08' => 'Agosto',
                '09' => 'Septiembre',
                '10' => 'Octubre',
                '11' => 'Noviembre',
                '12' => 'Diciembre',
            ];
        @endphp

        {{-- Encabezado Compacto e Interactivo del Dashboard con Filtros por Paso, Mes y Año --}}
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
            <div class="d-flex flex-wrap align-items-center gap-2">
                <h3 class="fw-bold mb-0 me-2" style="color: #2d3748; font-size: 1.32rem; letter-spacing: -0.03em;">
                    Dashboard · Estatus de Órdenes
                </h3>

                {{-- Selector Interactivo de Planta en Vivo --}}
                <div class="d-inline-flex align-items-center gap-1 p-1 rounded-pill"
                     style="background: rgba(255,255,255,0.68); border: 1px solid rgba(255,255,255,0.92);">
                    <button type="button" class="dash-plant-pill active" data-dash-plant-btn="" onclick="selectDashPlant('')">
                        Todas las Plantas
                    </button>
                    <button type="button" class="dash-plant-pill" data-dash-plant-btn="G1" onclick="selectDashPlant('G1')">
                        Planta G1
                    </button>
                    <button type="button" class="dash-plant-pill" data-dash-plant-btn="SA" onclick="selectDashPlant('SA')">
                        Planta SA
                    </button>
                    <button type="button" class="dash-plant-pill" data-dash-plant-btn="DF" onclick="selectDashPlant('DF')">
                        Planta DF
                    </button>
                </div>
            </div>

            {{-- Filtros Interactivos por Mes y Año --}}
            <div class="d-flex flex-wrap align-items-center gap-2">
                {{-- 1. Filtro por Mes --}}
                <div class="dash-filter-capsule" title="Filtrar por Mes">
                    <span class="dash-filter-capsule-icon" style="background: linear-gradient(145deg, #f3e8ff 0%, #e9d5ff 100%); color: #6d28d9;">
                        <i class="bi bi-calendar3"></i>
                    </span>
                    <select id="dashTopMonthFilter" class="dash-filter-select" onchange="applyDashboardFilters()">
                        <option value="">Todos los meses</option>
                        @foreach($dashMonthsList as $mCode => $mName)
                            <option value="{{ $mCode }}">{{ $mName }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- 3. Filtro por Año --}}
                <div class="dash-filter-capsule" title="Filtrar por Año">
                    <span class="dash-filter-capsule-icon" style="background: linear-gradient(145deg, #dcfce7 0%, #bbf7d0 100%); color: #15803d;">
                        <i class="bi bi-calendar-check"></i>
                    </span>
                    <select id="dashTopYearFilter" class="dash-filter-select" onchange="applyDashboardFilters()">
                        <option value="">Todos los años</option>
                        @foreach($availableDashYears as $yr)
                            <option value="{{ $yr }}">{{ $yr }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="button" id="btnResetDashFilters" class="btn btn-sm rounded-pill fw-bold d-none"
                        style="background: #f3e8ff; color: #6d28d9; border: 1.5px solid #ffffff; font-size: 0.72rem; padding: 0.28rem 0.8rem;"
                        onclick="resetAllDashboardFilters()">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Limpiar
                </button>
            </div>
        </div>

        {{-- FILA 1: 4 TARJETAS KPI COMPACTAS E INTERACTIVAS EN CRISTAL TONOS PASTEL --}}
        <div class="row g-2 mb-3">
            {{-- KPI 1: Total de Órdenes (Cristal Lavanda Pastel) --}}
            <div class="col-6 col-xl-3">
                <div class="dash-kpi-card active-kpi" data-dash-kpi="todas"
                     style="background: linear-gradient(135deg, rgba(243, 232, 255, 0.58) 0%, rgba(233, 213, 255, 0.46) 55%, rgba(243, 232, 237, 0.52) 100%); box-shadow: 10px 16px 26px -6px rgba(139, 92, 246, 0.18), inset 0 2.5px 4px rgba(255, 255, 255, 0.95), inset 0 -2px 6px rgba(255, 255, 255, 0.55);"
                     onclick="filterDashboardOps('todas')">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="fw-bold text-uppercase" style="font-size: 0.65rem; color: #6d28d9; letter-spacing: 0.04em;">
                            Total de Órdenes
                        </span>
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 28px; height: 28px; background: rgba(255,255,255,0.78); border: 1px solid #fff; box-shadow: inset 0 1.5px 2px #fff; color: #6d28d9; font-size: 0.8rem;">
                            <i class="bi bi-layers-fill"></i>
                        </span>
                    </div>
                    <div class="d-flex align-items-baseline justify-content-between">
                        <div class="fw-bold" id="kpiTotalCount" style="font-size: 1.55rem; line-height: 1.05; color: #3b0764;">{{ $totalOpsCount }}</div>
                        <span class="badge rounded-pill fw-bold" id="kpiAvgBadge"
                              style="background: rgba(255,255,255,0.76); border: 1px solid #fff; color: #5b21b6; font-size: 0.66rem;">
                            Avance {{ $avgProgressPct }}%
                        </span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-1 pt-1" style="border-top: 1px solid rgba(255,255,255,0.65); font-size: 0.68rem; color: #4c1d95;">
                        <span>Ver todas las OPs</span>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </div>
            </div>

            {{-- KPI 2: En Proceso (Cristal Azul Cielo Pastel) --}}
            <div class="col-6 col-xl-3">
                <div class="dash-kpi-card" data-dash-kpi="en_proceso"
                     style="background: linear-gradient(135deg, rgba(224, 242, 254, 0.58) 0%, rgba(207, 226, 243, 0.48) 55%, rgba(186, 230, 253, 0.52) 100%); box-shadow: 10px 16px 26px -6px rgba(56, 189, 248, 0.18), inset 0 2.5px 4px rgba(255, 255, 255, 0.95), inset 0 -2px 6px rgba(255, 255, 255, 0.55);"
                     onclick="filterDashboardOps('en_proceso')">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="fw-bold text-uppercase" style="font-size: 0.65rem; color: #0369a1; letter-spacing: 0.04em;">
                            En Proceso
                        </span>
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 28px; height: 28px; background: rgba(255,255,255,0.78); border: 1px solid #fff; box-shadow: inset 0 1.5px 2px #fff; color: #0369a1; font-size: 0.8rem;">
                            <i class="bi bi-sliders2"></i>
                        </span>
                    </div>
                    <div class="d-flex align-items-baseline justify-content-between">
                        <div class="fw-bold" id="kpiInProcessCount" style="font-size: 1.55rem; line-height: 1.05; color: #0c4a6e;">{{ $inProcessOpsCount }}</div>
                        <span class="badge rounded-pill fw-bold" id="kpiInProcessPct"
                              style="background: rgba(255,255,255,0.76); border: 1px solid #fff; color: #075985; font-size: 0.66rem;">
                            {{ $pctInProcess }}% del total
                        </span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-1 pt-1" style="border-top: 1px solid rgba(255,255,255,0.65); font-size: 0.68rem; color: #075985;">
                        <span>Filtrar En Proceso</span>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </div>
            </div>

            {{-- KPI 3: Pendientes (Cristal Durazno / Ámbar Pastel) --}}
            <div class="col-6 col-xl-3">
                <div class="dash-kpi-card" data-dash-kpi="pendientes"
                     style="background: linear-gradient(135deg, rgba(254, 243, 199, 0.58) 0%, rgba(253, 230, 138, 0.46) 55%, rgba(255, 237, 213, 0.52) 100%); box-shadow: 10px 16px 26px -6px rgba(251, 191, 36, 0.18), inset 0 2.5px 4px rgba(255, 255, 255, 0.95), inset 0 -2px 6px rgba(255, 255, 255, 0.55);"
                     onclick="filterDashboardOps('pendientes')">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="fw-bold text-uppercase" style="font-size: 0.65rem; color: #b45309; letter-spacing: 0.04em;">
                            Pendientes
                        </span>
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 28px; height: 28px; background: rgba(255,255,255,0.78); border: 1px solid #fff; box-shadow: inset 0 1.5px 2px #fff; color: #b45309; font-size: 0.8rem;">
                            <i class="bi bi-hourglass-split"></i>
                        </span>
                    </div>
                    <div class="d-flex align-items-baseline justify-content-between">
                        <div class="fw-bold" id="kpiPendingCount" style="font-size: 1.55rem; line-height: 1.05; color: #78350f;">{{ $pendingOpsCount }}</div>
                        <span class="badge rounded-pill fw-bold" id="kpiPendingPct"
                              style="background: rgba(255,255,255,0.76); border: 1px solid #fff; color: #92400e; font-size: 0.66rem;">
                            {{ $pctPending }}% del total
                        </span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-1 pt-1" style="border-top: 1px solid rgba(255,255,255,0.65); font-size: 0.68rem; color: #92400e;">
                        <span>Filtrar Pendientes</span>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </div>
            </div>

            {{-- KPI 4: Finalizadas (Cristal Verde Menta Pastel) --}}
            <div class="col-6 col-xl-3">
                <div class="dash-kpi-card" data-dash-kpi="finalizadas"
                     style="background: linear-gradient(135deg, rgba(220, 252, 231, 0.58) 0%, rgba(187, 247, 208, 0.46) 55%, rgba(209, 250, 229, 0.52) 100%); box-shadow: 10px 16px 26px -6px rgba(74, 222, 128, 0.18), inset 0 2.5px 4px rgba(255, 255, 255, 0.95), inset 0 -2px 6px rgba(255, 255, 255, 0.55);"
                     onclick="filterDashboardOps('finalizadas')">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="fw-bold text-uppercase" style="font-size: 0.65rem; color: #15803d; letter-spacing: 0.04em;">
                            Finalizadas
                        </span>
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 28px; height: 28px; background: rgba(255,255,255,0.78); border: 1px solid #fff; box-shadow: inset 0 1.5px 2px #fff; color: #15803d; font-size: 0.8rem;">
                            <i class="bi bi-patch-check-fill"></i>
                        </span>
                    </div>
                    <div class="d-flex align-items-baseline justify-content-between">
                        <div class="fw-bold" id="kpiFinishedCount" style="font-size: 1.55rem; line-height: 1.05; color: #14532d;">{{ $finishedOpsCount }}</div>
                        <span class="badge rounded-pill fw-bold" id="kpiFinishedPct"
                              style="background: rgba(255,255,255,0.76); border: 1px solid #fff; color: #166534; font-size: 0.66rem;">
                            {{ $pctFinished }}% completado
                        </span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-1 pt-1" style="border-top: 1px solid rgba(255,255,255,0.65); font-size: 0.68rem; color: #166534;">
                        <span>Filtrar Finalizadas</span>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- FILA 2: DISTRIBUCIÓN DE ESTATUS COMPACTA E INTERACTIVA + FLUJO POR ETAPA (7 PASOS) --}}
        <div class="row g-3 mb-3 align-items-stretch">
            {{-- Panel Izquierdo: Distribución por Estatus (Anillo Interactivo + 3 Barras Pastel) --}}
            <div class="col-12 col-xl-5">
                <div class="dash-compact-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="ep-lote-pill py-1 px-2.5" style="font-size: 0.72rem;">
                                <i class="bi bi-pie-chart-fill me-1" style="color: #8b5cf6;"></i>Distribución de Estatus
                            </span>
                            <button type="button" class="ep-lote-pill border-0 py-1 px-2.5"
                                    style="color: #0369a1; font-size: 0.7rem; cursor: pointer;"
                                    onclick="filterDashboardOps('todas')"
                                    title="Mostrar todas las órdenes">
                                <i class="bi bi-arrow-repeat me-1"></i>Ver Todas
                            </button>
                        </div>

                        {{-- Contenedor Horizontal/Responsivo: Anillo Donut Interactivo a la izquierda + 3 Barras Pastel a la derecha --}}
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3 my-2">
                            {{-- Gráfico Donut SVG Interactivo --}}
                            <div class="text-center flex-shrink-0">
                                <div class="position-relative d-inline-flex align-items-center justify-content-center"
                                     style="background: radial-gradient(circle, rgba(255,255,255,0.65) 0%, rgba(243,232,237,0.42) 100%); backdrop-filter: blur(12px); border-radius: 50%; padding: 6px; border: 2px solid rgba(255,255,255,0.94); box-shadow: 0 12px 24px rgba(45,55,72,0.16), inset 0 2px 5px #ffffff; cursor: pointer;"
                                     onclick="filterDashboardOps('todas')"
                                     title="Clic en el centro para ver todas, o en un segmento para filtrar">
                                    <svg width="132" height="132" viewBox="0 0 160 160" style="transform: rotate(-90deg);">
                                        <circle cx="80" cy="80" r="66" fill="none" stroke="rgba(255, 255, 255, 0.55)" stroke-width="15"></circle>
                                        {{-- Segmento En Proceso (Azul Cielo Pastel #7dd3fc) --}}
                                        <circle id="donutSegInProcess" class="dash-donut-seg"
                                                cx="80" cy="80" r="66" fill="none" stroke="#7dd3fc" stroke-width="15"
                                                stroke-dasharray="{{ $lenInProcess }} {{ $circ }}"
                                                stroke-dashoffset="0" stroke-linecap="round"
                                                onmouseenter="previewDonutStatus('en_proceso')"
                                                onmouseleave="resetDonutPreview()"
                                                onclick="event.stopPropagation(); filterDashboardOps('en_proceso')"></circle>
                                        {{-- Segmento Pendientes (Durazno / Ámbar Pastel #fcd34d) --}}
                                        <circle id="donutSegPending" class="dash-donut-seg"
                                                cx="80" cy="80" r="66" fill="none" stroke="#fcd34d" stroke-width="15"
                                                stroke-dasharray="{{ $lenPending }} {{ $circ }}"
                                                stroke-dashoffset="-{{ $lenInProcess }}" stroke-linecap="round"
                                                onmouseenter="previewDonutStatus('pendientes')"
                                                onmouseleave="resetDonutPreview()"
                                                onclick="event.stopPropagation(); filterDashboardOps('pendientes')"></circle>
                                        {{-- Segmento Finalizadas (Verde Menta Pastel #86efac) --}}
                                        <circle id="donutSegFinished" class="dash-donut-seg"
                                                cx="80" cy="80" r="66" fill="none" stroke="#86efac" stroke-width="15"
                                                stroke-dasharray="{{ $lenFinished }} {{ $circ }}"
                                                stroke-dashoffset="-{{ $lenInProcess + $lenPending }}" stroke-linecap="round"
                                                onmouseenter="previewDonutStatus('finalizadas')"
                                                onmouseleave="resetDonutPreview()"
                                                onclick="event.stopPropagation(); filterDashboardOps('finalizadas')"></circle>
                                    </svg>
                                    <div class="position-absolute text-center" style="color: #2d3748; pointer-events: none;">
                                        <div class="fw-bold" id="donutCenterCount" style="font-size: 1.38rem; line-height: 1; color: #3b0764;">{{ $totalOpsCount }}</div>
                                        <div id="donutCenterLabel" style="font-size: 0.6rem; font-weight: 800; color: #6d28d9; letter-spacing: 0.02em;">OPs TOTALES</div>
                                        <div class="badge rounded-pill mt-1" id="donutCenterSub"
                                             style="background: linear-gradient(135deg, rgba(243,232,255,0.78) 0%, rgba(233,213,255,0.68) 100%); color: #4c1d95; border: 1px solid #fff; font-size: 0.6rem;">
                                            {{ $avgProgressPct }}% Avance
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- 3 Barras de Cristal Pastel Interactivas al lado del Donut --}}
                            <div class="d-flex flex-column gap-2 w-100" style="min-width: 0;">
                                {{-- Barra 1: En Proceso (Cristal Azul Cielo Pastel) --}}
                                <div class="dash-status-bar-item d-flex align-items-center justify-content-between"
                                     data-dash-bar="en_proceso"
                                     style="background: linear-gradient(135deg, rgba(224, 242, 254, 0.64) 0%, rgba(186, 230, 253, 0.52) 100%); color: #075985;"
                                     onmouseenter="previewDonutStatus('en_proceso')"
                                     onmouseleave="resetDonutPreview()"
                                     onclick="filterDashboardOps('en_proceso')">
                                    <div class="d-flex align-items-center gap-2">
                                        <span style="width:10px;height:10px;border-radius:50%;background:#38bdf8;border:1.5px solid #fff;display:inline-block;flex-shrink:0;"></span>
                                        <span class="fw-bold" style="font-size: 0.74rem;">En Proceso</span>
                                    </div>
                                    <div class="hig-progress-track mx-2 d-none d-sm-block" style="flex: 1; max-width: 75px; height: 5px; background: rgba(255,255,255,0.68);">
                                        <div class="hig-progress-fill" id="barFillInProcess" data-target-width="{{ $pctInProcess }}%" style="background: #38bdf8; width: {{ $pctInProcess }}%;"></div>
                                    </div>
                                    <span class="badge rounded-pill fw-bold" id="barBadgeInProcess" style="background: rgba(255,255,255,0.78); border: 1px solid #fff; color: #075985; font-size: 0.7rem;">
                                        {{ $inProcessOpsCount }} ({{ $pctInProcess }}%)
                                    </span>
                                </div>

                                {{-- Barra 2: Pendientes (Cristal Durazno / Ámbar Pastel) --}}
                                <div class="dash-status-bar-item d-flex align-items-center justify-content-between"
                                     data-dash-bar="pendientes"
                                     style="background: linear-gradient(135deg, rgba(254, 243, 199, 0.64) 0%, rgba(253, 230, 138, 0.52) 100%); color: #92400e;"
                                     onmouseenter="previewDonutStatus('pendientes')"
                                     onmouseleave="resetDonutPreview()"
                                     onclick="filterDashboardOps('pendientes')">
                                    <div class="d-flex align-items-center gap-2">
                                        <span style="width:10px;height:10px;border-radius:50%;background:#fbbf24;border:1.5px solid #fff;display:inline-block;flex-shrink:0;"></span>
                                        <span class="fw-bold" style="font-size: 0.74rem;">Pendientes</span>
                                    </div>
                                    <div class="hig-progress-track mx-2 d-none d-sm-block" style="flex: 1; max-width: 75px; height: 5px; background: rgba(255,255,255,0.68);">
                                        <div class="hig-progress-fill" id="barFillPending" data-target-width="{{ $pctPending }}%" style="background: #fbbf24; width: {{ $pctPending }}%;"></div>
                                    </div>
                                    <span class="badge rounded-pill fw-bold" id="barBadgePending" style="background: rgba(255,255,255,0.78); border: 1px solid #fff; color: #92400e; font-size: 0.7rem;">
                                        {{ $pendingOpsCount }} ({{ $pctPending }}%)
                                    </span>
                                </div>

                                {{-- Barra 3: Finalizadas (Cristal Verde Menta Pastel) --}}
                                <div class="dash-status-bar-item d-flex align-items-center justify-content-between"
                                     data-dash-bar="finalizadas"
                                     style="background: linear-gradient(135deg, rgba(220, 252, 231, 0.64) 0%, rgba(187, 247, 208, 0.52) 100%); color: #166534;"
                                     onmouseenter="previewDonutStatus('finalizadas')"
                                     onmouseleave="resetDonutPreview()"
                                     onclick="filterDashboardOps('finalizadas')">
                                    <div class="d-flex align-items-center gap-2">
                                        <span style="width:10px;height:10px;border-radius:50%;background:#4ade80;border:1.5px solid #fff;display:inline-block;flex-shrink:0;"></span>
                                        <span class="fw-bold" style="font-size: 0.74rem;">Finalizadas</span>
                                    </div>
                                    <div class="hig-progress-track mx-2 d-none d-sm-block" style="flex: 1; max-width: 75px; height: 5px; background: rgba(255,255,255,0.68);">
                                        <div class="hig-progress-fill" id="barFillFinished" data-target-width="{{ $pctFinished }}%" style="background: #4ade80; width: {{ $pctFinished }}%;"></div>
                                    </div>
                                    <span class="badge rounded-pill fw-bold" id="barBadgeFinished" style="background: rgba(255,255,255,0.78); border: 1px solid #fff; color: #166534; font-size: 0.7rem;">
                                        {{ $finishedOpsCount }} ({{ $pctFinished }}%)
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ep-kit-bottom-pill mt-2 py-1.5 px-3" style="font-size: 0.72rem; background: linear-gradient(135deg, rgba(255,255,255,0.62) 0%, rgba(243,232,237,0.48) 100%); backdrop-filter: blur(10px);">
                        <span class="fw-bold"><i class="bi bi-shield-check me-1" style="color: #15803d;"></i>Especificación Rendimiento: 90.00% – 101.00%</span>
                        <span class="badge rounded-pill" style="background: linear-gradient(135deg, rgba(220,252,231,0.82) 0%, rgba(187,247,208,0.72) 100%); color: #166534; border: 1px solid #fff; font-size: 0.65rem;">BPF / GMP</span>
                    </div>
                </div>
            </div>

            {{-- Panel Derecho: Flujo Interactivo por Etapa (Pasos 1 al 7 Compactos y Clicables) --}}
            <div class="col-12 col-xl-7">
                <div class="dash-compact-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="ep-lote-pill py-1 px-2.5" style="font-size: 0.72rem;">
                                <i class="bi bi-diagram-3-fill me-1" style="color: #0369a1;"></i>Flujo por Etapa (Clic en un paso para filtrar)
                            </span>
                            <div class="d-flex align-items-center gap-1">
                                <span id="activeStepFilterBadge" class="badge rounded-pill d-none"
                                      style="background: #e0f2fe; color: #0369a1; border: 1px solid #7dd3fc; font-size: 0.68rem; cursor: pointer;"
                                      onclick="filterDashboardByStep(0)">
                                    Paso activo <i class="bi bi-x-lg ms-1"></i>
                                </span>
                                <span class="ep-lote-pill py-1 px-2.5" style="font-size: 0.7rem;">14 Páginas</span>
                            </div>
                        </div>

                        <div class="d-flex flex-column" style="gap: 0.34rem;">
                            @foreach($stepShortLabels as $stepNum => $meta)
                                @php
                                    $opsInStep = $batches->filter(function($item) use ($stepNum) {
                                        if ($item->status === 'Pendiente') return false;
                                        if ($item->status === 'Finalizado' || $item->progressPercentage() >= 100) return $stepNum === 7;
                                        return ((int) $item->current_step) === $stepNum;
                                    });
                                    $stepCount = $opsInStep->count();
                                    $stepBarWidth = $totalOpsCount > 0 ? max($stepCount > 0 ? 18 : 4, round(($stepCount / $totalOpsCount) * 100)) : 4;
                                    $stepBg = $meta['bg'] ?? '#e0f2fe';
                                    $stepBar = $meta['bar'] ?? '#7dd3fc';
                                    $stepText = $meta['text'] ?? '#075985';
                                @endphp
                                <div class="dash-step-item d-flex flex-wrap align-items-center justify-content-between gap-2"
                                     data-dash-step-row="{{ $stepNum }}"
                                     onclick="filterDashboardByStep({{ $stepNum }})"
                                     title="Clic para filtrar las órdenes en {{ $meta['title'] }}">
                                    <div class="d-flex align-items-center gap-2" style="min-width: 210px;">
                                        <span class="d-inline-flex align-items-center justify-content-center rounded-3 fw-bold"
                                              style="width: 26px; height: 26px; background: {{ $stepBg }}; color: {{ $stepText }}; border: 1.5px solid #ffffff; font-size: 0.74rem; box-shadow: 0 2px 6px rgba(45,55,72,0.08);">
                                            <i class="bi {{ $meta['icon'] }}"></i>
                                        </span>
                                        <div>
                                            <div class="fw-bold" style="font-size: 0.73rem; color: #1e293b; line-height: 1.15;">{{ $meta['title'] }}</div>
                                            <div class="hig-progress-track mt-1" style="width: 120px; height: 4px; background: rgba(148,163,184,0.18);">
                                                <div class="hig-progress-fill dash-step-bar-fill" data-step-num="{{ $stepNum }}" data-target-width="{{ $stepBarWidth }}%" style="background: {{ $stepBar }}; width: {{ $stepBarWidth }}%;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap align-items-center gap-1 ms-auto">
                                        @forelse($opsInStep as $opItem)
                                            @php
                                                $opChipCode = str_starts_with(strtoupper(trim($opItem->orden_produccion)), 'OP')
                                                    ? trim($opItem->orden_produccion)
                                                    : 'OP-' . trim($opItem->orden_produccion);
                                                $isOpDone = ($opItem->status === 'Finalizado' || $opItem->progressPercentage() >= 100);
                                                $chipBg = $isOpDone
                                                    ? 'linear-gradient(135deg, rgba(220, 252, 231, 0.82) 0%, rgba(187, 247, 208, 0.72) 100%)'
                                                    : 'linear-gradient(135deg, rgba(224, 242, 254, 0.82) 0%, rgba(186, 230, 253, 0.72) 100%)';
                                                $chipColor = $isOpDone ? '#166534' : '#075985';
                                                $opItemPlant = strtoupper($opItem->val('planta', 'G1'));
                                                $opItemDate = $opItem->updated_at ?? $opItem->created_at;
                                                $opItemMonth = $opItemDate ? $opItemDate->format('m') : '';
                                                $opItemYear = $opItemDate ? $opItemDate->format('Y') : '';
                                            @endphp
                                            <a href="{{ route('batches.edit', ['batch' => $opItem->id, 'step' => $opItem->current_step]) }}"
                                               class="badge rounded-pill text-decoration-none px-2 py-1 fw-bold dash-step-op-chip"
                                               data-chip-plant="{{ $opItemPlant }}"
                                               data-chip-month="{{ $opItemMonth }}"
                                               data-chip-year="{{ $opItemYear }}"
                                               onclick="event.stopPropagation();"
                                               style="background: {{ $chipBg }}; color: {{ $chipColor }}; font-size: 0.67rem; border: 1px solid #fff; box-shadow: 0 2px 6px rgba(45,55,72,0.08), inset 0 1px 2px #fff;"
                                               title="Abrir {{ $opChipCode }} · Lote {{ $opItem->lote }} (Planta {{ $opItemPlant }})">
                                                {{ $opChipCode }} <span style="opacity:0.85;">({{ $opItem->lote }})</span>
                                            </a>
                                        @empty
                                            <span class="small text-muted dash-step-empty-label" style="font-size: 0.68rem;">0 OPs en este paso</span>
                                        @endforelse
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FILA 3: TABLERO DETALLADO DE ESTATUS DE ÓRDENES DE PRODUCCIÓN CON FILTROS PASTEL --}}
        <div class="dash-compact-card" id="dashTableCardContainer">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                <div class="d-flex align-items-center gap-2">
                    <h5 class="fw-bold mb-0" style="font-size: 0.98rem; color: #1e293b;">
                        <i class="bi bi-activity me-1" style="color: #7c3aed;"></i>Tablero de Estatus de Órdenes de Producción
                    </h5>
                    <span class="badge rounded-pill" id="dashVisibleCounterBadge"
                          style="background: rgba(243, 232, 255, 0.78); color: #5b21b6; border: 1px solid #ffffff; font-size: 0.68rem;">
                        Mostrando {{ $totalOpsCount }} de {{ $totalOpsCount }} OPs
                    </span>
                </div>

                {{-- Botones de Filtro Rápido por Estatus con Punto Pastel --}}
                <div class="d-flex flex-wrap align-items-center gap-1">
                    <button type="button" class="tc-filter-tab active py-1 px-2.5" style="font-size: 0.74rem;" data-dash-filter="todas" onclick="filterDashboardOps('todas')">
                        <span class="tc-dot" style="background: #c4b5fd; box-shadow: 0 0 6px #c4b5fd;"></span>
                        <span>Todas</span>
                        <span class="tc-tab-badge" id="tabBadgeTodas">{{ $totalOpsCount }}</span>
                    </button>
                    <button type="button" class="tc-filter-tab py-1 px-2.5" style="font-size: 0.74rem;" data-dash-filter="en_proceso" onclick="filterDashboardOps('en_proceso')">
                        <span class="tc-dot" style="background: #7dd3fc; box-shadow: 0 0 6px #7dd3fc;"></span>
                        <span>En Proceso</span>
                        <span class="tc-tab-badge" id="tabBadgeInProcess">{{ $inProcessOpsCount }}</span>
                    </button>
                    <button type="button" class="tc-filter-tab py-1 px-2.5" style="font-size: 0.74rem;" data-dash-filter="pendientes" onclick="filterDashboardOps('pendientes')">
                        <span class="tc-dot" style="background: #fcd34d; box-shadow: 0 0 6px #fcd34d;"></span>
                        <span>Pendientes</span>
                        <span class="tc-tab-badge" id="tabBadgePending">{{ $pendingOpsCount }}</span>
                    </button>
                    <button type="button" class="tc-filter-tab py-1 px-2.5" style="font-size: 0.74rem;" data-dash-filter="finalizadas" onclick="filterDashboardOps('finalizadas')">
                        <span class="tc-dot" style="background: #86efac; box-shadow: 0 0 6px #86efac;"></span>
                        <span>Finalizadas</span>
                        <span class="tc-tab-badge" id="tabBadgeFinished">{{ $finishedOpsCount }}</span>
                    </button>
                </div>
            </div>

            {{-- Buscador instantáneo en el Dashboard --}}
            <div class="row g-2 align-items-center mb-2">
                <div class="col-md-8">
                    <div class="tc-search-box py-1.5 px-3">
                        <i class="bi bi-search" style="color: #666F88;"></i>
                        <input type="text" id="dashStatusSearchInput" placeholder="Filtrar estatus por OP, lote, producto o planta..." autocomplete="off" oninput="applyDashboardFilters()">
                    </div>
                </div>
                <div class="col-md-4">
                    <select id="dashPlantFilter" class="tc-select-control w-100 py-1.5" onchange="selectDashPlant(this.value)">
                        <option value="">Todas las plantas (G1, SA, DF)</option>
                        <option value="G1">Planta G1</option>
                        <option value="SA">Planta SA</option>
                        <option value="DF">Planta DF</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive rounded-4 p-2" style="background: rgba(255, 255, 255, 0.56); backdrop-filter: blur(12px); border: 1.5px solid rgba(255, 255, 255, 0.92); box-shadow: 0 10px 22px rgba(45,55,72,0.12), inset 0 2px 4px rgba(255,255,255,0.92);">
                <table class="table table-sm align-middle mb-0" style="--bs-table-bg: transparent;">
                    <thead>
                        <tr style="border-bottom: 1.5px solid rgba(102,111,136,0.2);">
                            <th class="small fw-bold text-uppercase py-2" style="color: #4a5568; font-size: 0.72rem;">Orden (OP) / Lote</th>
                            <th class="small fw-bold text-uppercase py-2" style="color: #4a5568; font-size: 0.72rem;">Producto / Planta</th>
                            <th class="small fw-bold text-uppercase py-2" style="color: #4a5568; font-size: 0.72rem;">Estatus de la OP</th>
                            <th class="small fw-bold text-uppercase py-2" style="color: #4a5568; min-width: 210px; font-size: 0.72rem;">Etapa y Avance (7 Pasos)</th>
                            <th class="small fw-bold text-uppercase py-2" style="color: #4a5568; font-size: 0.72rem;">Rendimiento</th>
                            <th class="small fw-bold text-uppercase py-2" style="color: #4a5568; font-size: 0.72rem;">Actualizado</th>
                            <th class="small fw-bold text-uppercase text-end py-2" style="color: #4a5568; font-size: 0.72rem;">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="dashStatusTableBody">
                        @forelse($batches as $b)
                            @php
                                $isPending = ($b->status === 'Pendiente');
                                $pct = $isPending ? 0 : $b->progressPercentage();
                                $isFinished = (!$isPending && ($b->status === 'Finalizado' || $pct >= 100));
                                $isDeviation = ($b->status === 'Con Desviación');
                                $completedSteps = $isPending ? 0 : ($isFinished ? 7 : max(1, (int) $b->current_step));
                                $planta = $b->val('planta', 'G1');
                                $opDisplay = str_starts_with(strtoupper(trim($b->orden_produccion)), 'OP')
                                    ? trim($b->orden_produccion)
                                    : 'OP-' . trim($b->orden_produccion);
                                $dashGroup = $isPending ? 'pendientes' : ($isFinished ? 'finalizadas' : 'en_proceso');
                                $rowDate = $b->updated_at ?? $b->created_at;
                                $rowMonth = $rowDate ? $rowDate->format('m') : '';
                                $rowYear = $rowDate ? $rowDate->format('Y') : '';

                                // Colores pastel distintivos por estatus para cada fila
                                if ($isPending) {
                                    $opBadgeGradient = 'linear-gradient(135deg, #fef3c7 0%, #fde68a 100%)';
                                    $opBadgeText = '#78350f';
                                    $loteBadgeBg = '#fffbeb';
                                    $loteBadgeColor = '#92400e';
                                    $loteBadgeBorder = '#fde68a';
                                    $barAccentColor = '#fbbf24';
                                    $pctTextColor = '#b45309';
                                } elseif ($isFinished) {
                                    $opBadgeGradient = 'linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%)';
                                    $opBadgeText = '#14532d';
                                    $loteBadgeBg = '#f0fdf4';
                                    $loteBadgeColor = '#166534';
                                    $loteBadgeBorder = '#bbf7d0';
                                    $barAccentColor = '#4ade80';
                                    $pctTextColor = '#15803d';
                                } elseif ($isDeviation) {
                                    $opBadgeGradient = 'linear-gradient(135deg, #ffe4e6 0%, #fecdd3 100%)';
                                    $opBadgeText = '#881337';
                                    $loteBadgeBg = '#fff1f2';
                                    $loteBadgeColor = '#9f1239';
                                    $loteBadgeBorder = '#fecdd3';
                                    $barAccentColor = '#fda4af';
                                    $pctTextColor = '#be123c';
                                } else {
                                    $opBadgeGradient = 'linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%)';
                                    $opBadgeText = '#0c4a6e';
                                    $loteBadgeBg = '#f0f9ff';
                                    $loteBadgeColor = '#075985';
                                    $loteBadgeBorder = '#bae6fd';
                                    $barAccentColor = '#7dd3fc';
                                    $pctTextColor = '#0369a1';
                                }
                            @endphp
                            <tr class="dash-status-row"
                                data-dash-group="{{ $dashGroup }}"
                                data-dash-plant="{{ strtoupper($planta) }}"
                                data-dash-step="{{ $completedSteps }}"
                                data-dash-month="{{ $rowMonth }}"
                                data-dash-year="{{ $rowYear }}"
                                data-dash-pct="{{ $pct }}"
                                data-dash-search="{{ strtolower($opDisplay . ' ' . $b->lote . ' ' . $b->producto . ' ' . $b->status . ' ' . $planta) }}"
                                style="border-bottom: 1px solid rgba(102,111,136,0.14);">
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge rounded-pill px-2 py-1 fw-bold"
                                              style="background: {{ $opBadgeGradient }}; color: {{ $opBadgeText }}; border: 1.5px solid #ffffff; font-size: 0.74rem; box-shadow: 0 2px 6px rgba(45,55,72,0.08);">
                                            {{ $opDisplay }}
                                        </span>
                                        <span class="badge rounded-pill px-2 py-1 fw-bold"
                                              style="background: {{ $loteBadgeBg }}; color: {{ $loteBadgeColor }}; border: 1px solid {{ $loteBadgeBorder }}; font-size: 0.7rem;">
                                            Lote {{ $b->lote }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold" style="color: #1e293b; font-size: 0.78rem;">{{ $b->producto ?: 'ANDANTOL GEL 0.75g / 100g' }}</div>
                                    <small class="text-muted" style="font-size: 0.7rem;">Planta {{ $planta }} · {{ $b->tamano_lote ?: '500.000 kg' }}</small>
                                </td>
                                <td>
                                    @if($isPending)
                                        <span class="badge rounded-pill px-2.5 py-1 fw-bold"
                                              style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); color: #92400e; border: 1.5px solid #ffffff; font-size: 0.71rem;">
                                            <i class="bi bi-hourglass-split me-1"></i>Pendiente
                                        </span>
                                    @elseif($isFinished)
                                        <span class="badge rounded-pill px-2.5 py-1 fw-bold"
                                              style="background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%); color: #166534; border: 1.5px solid #ffffff; font-size: 0.71rem;">
                                            <i class="bi bi-check-circle-fill me-1"></i>Finalizada
                                        </span>
                                    @elseif($isDeviation)
                                        <span class="badge rounded-pill px-2.5 py-1 fw-bold"
                                              style="background: linear-gradient(135deg, #ffe4e6 0%, #fecdd3 100%); color: #9f1239; border: 1.5px solid #ffffff; font-size: 0.71rem;">
                                            <i class="bi bi-exclamation-triangle-fill me-1"></i>Con Desviación
                                        </span>
                                    @else
                                        <span class="badge rounded-pill px-2.5 py-1 fw-bold"
                                              style="background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%); color: #075985; border: 1.5px solid #ffffff; font-size: 0.71rem;">
                                            <i class="bi bi-play-circle-fill me-1"></i>En Proceso
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <span class="small fw-bold" style="color: #1e293b; font-size: 0.72rem;">
                                            {{ $isPending ? 'Etapa 0 · Sin iniciar' : ($isFinished ? '7 de 7 Pasos · Completada' : ($stepNames[$b->current_step] ?? 'Paso ' . $b->current_step)) }}
                                        </span>
                                        <span class="small fw-bold" style="color: {{ $pctTextColor }}; font-size: 0.74rem;">{{ $pct }}%</span>
                                    </div>
                                    <div class="tc-step-segments">
                                        @for($s = 1; $s <= 7; $s++)
                                            @php
                                                $segActive = ($s < $completedSteps || $isFinished);
                                                $segCurrent = ($s === $completedSteps && !$isPending && !$isFinished);
                                                $segStyle = $segActive
                                                    ? "background: {$barAccentColor};"
                                                    : ($segCurrent ? "background: {$barAccentColor}; opacity: 0.65;" : "background: rgba(148, 163, 184, 0.22);");
                                            @endphp
                                            <span class="tc-step-seg" style="{{ $segStyle }}"></span>
                                        @endfor
                                    </div>
                                </td>
                                <td>
                                    @if($b->rendimiento_porcentaje !== null)
                                        @php
                                            $inSpecYield = ($b->rendimiento_porcentaje >= 90 && $b->rendimiento_porcentaje <= 101);
                                        @endphp
                                        <span class="badge rounded-pill px-2 py-1 fw-bold"
                                              style="background: {{ $inSpecYield ? '#dcfce7' : '#ffe4e6' }}; color: {{ $inSpecYield ? '#166534' : '#9f1239' }}; border: 1px solid {{ $inSpecYield ? '#bbf7d0' : '#fecdd3' }}; font-size: 0.7rem;">
                                            {{ number_format($b->rendimiento_porcentaje, 2) }}%
                                        </span>
                                    @elseif($isPending)
                                        <span class="badge rounded-pill px-2 py-1" style="background: #fef3c7; color: #92400e; border: 1px solid #fde68a; font-size: 0.7rem;">
                                            Por iniciar
                                        </span>
                                    @else
                                        <span class="badge rounded-pill px-2 py-1" style="background: #e0f2fe; color: #075985; border: 1px solid #bae6fd; font-size: 0.7rem;">
                                            En captura
                                        </span>
                                    @endif
                                </td>
                                <td class="small fw-semibold" style="color: #4a5568; font-size: 0.73rem;">
                                    {{ $b->updated_at?->format('d/m/Y H:i') }}
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <a href="{{ route('batches.edit', ['batch' => $b->id, 'step' => $b->current_step]) }}"
                                           class="btn btn-sm rounded-pill fw-bold py-1 px-2.5"
                                           style="background: {{ $opBadgeGradient }}; color: {{ $opBadgeText }}; border: 1.5px solid #ffffff; box-shadow: 0 3px 8px rgba(45,55,72,0.10); font-size: 0.72rem;">
                                            <i class="bi {{ $isPending ? 'bi-play-fill' : ($isFinished ? 'bi-eye-fill' : 'bi-arrow-right-circle') }}"></i>
                                            <span>{{ $isPending ? 'Iniciar' : ($isFinished ? 'Ver 14 Págs.' : 'Continuar') }}</span>
                                        </a>
                                        @if($isFinished)
                                            <a href="{{ route('batches.print', $b->id) }}"
                                               target="_blank"
                                               class="ep-mini-print-btn"
                                               style="width: 28px; height: 28px;"
                                               title="Imprimir 14 Páginas">
                                                <i class="bi bi-printer"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Sin órdenes de producción registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ===================================================================== --}}
    {{-- SECCIÓN 4: BASE DE DATOS (REPOSITORIO MAESTRO SQL SERVER EN CRISTAL 3D) --}}
    {{-- ===================================================================== --}}
    <div id="sec_bd" class="app-section-pane hig-spring-pane {{ $activeSection === 'bd' ? '' : 'd-none' }}">
        @php
            $bdTotalCount = $batches->count();
            $bdPendingCount = $batches->where('status', 'Pendiente')->count();
            $bdFinishedCount = $batches->filter(fn($item) => $item->status === 'Finalizado' || ($item->status !== 'Pendiente' && $item->progressPercentage() >= 100))->count();
            $bdInProcessCount = $batches->filter(fn($item) => $item->status !== 'Pendiente' && $item->status !== 'Finalizado' && $item->progressPercentage() < 100)->count();
            $bdStepNames = [
                1 => 'Paso 1 · Equipos y Surtido',
                2 => 'Paso 2 · Pesaje e Insumos',
                3 => 'Paso 3 · Fabricación',
                4 => 'Paso 4 · Controles IPC',
                5 => 'Paso 5 · Acondicionamiento',
                6 => 'Paso 6 · Conciliación',
                7 => 'Paso 7 · Liberación Final',
            ];
        @endphp

        {{-- Encabezado Superior 3D Liquid Glass + Estado SQL Server + Botones de Acción --}}
        <div class="dash-compact-card mb-3" style="padding: 1rem 1.3rem;">
            <div class="d-flex flex-column flex-xl-row align-items-xl-center justify-content-between gap-3">
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-4 flex-shrink-0"
                         style="width: 46px; height: 46px; background: linear-gradient(135deg, rgba(255,255,255,0.92) 0%, rgba(207,226,243,0.75) 100%); border: 1.5px solid #ffffff; box-shadow: 0 8px 18px -4px rgba(45,55,72,0.16), inset 0 2px 3px #ffffff; color: #2d3748; font-size: 1.2rem;">
                        <i class="bi bi-database-fill-check" style="color: #6366f1;"></i>
                    </div>
                    <div>
                        <div class="d-flex flex-wrap align-items-center gap-2 mb-0.5">
                            <h3 class="fw-bold mb-0" style="color: #1e293b; font-size: 1.32rem; letter-spacing: -0.025em;">
                                Base de Datos de Batch Records
                            </h3>
                            <span class="d-inline-flex align-items-center gap-1.5 px-2.5 py-0.5 rounded-pill fw-bold"
                                  style="font-size: 0.68rem; background: linear-gradient(135deg, rgba(220,252,231,0.78) 0%, rgba(187,247,208,0.62) 100%); color: #166534; border: 1.5px solid #ffffff; box-shadow: inset 0 1px 2px #fff;">
                                <span style="width: 7px; height: 7px; border-radius: 50%; background: #10b981; box-shadow: 0 0 6px #10b981;"></span>
                                <span>SQL SERVER ACTIVO</span>
                            </span>
                        </div>
                        <p class="mb-0" style="color: #64748b; font-size: 0.78rem; font-weight: 500;">
                            Repositorio maestro de lotes y órdenes de producción · Formato FGEN.018-1 V00 (14 Páginas)
                        </p>
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button type="button"
                            class="ep-lote-pill border-0 py-2 px-3 d-inline-flex align-items-center gap-1.5"
                            style="font-size: 0.78rem; color: #2d3748; cursor: pointer;"
                            onclick="exportBdTableToCsv()"
                            title="Exportar registros visibles a CSV / Excel">
                        <i class="bi bi-file-earmark-spreadsheet-fill" style="color: #16a34a;"></i>
                        <span>Exportar CSV</span>
                    </button>

                    <button type="button"
                            class="btn d-inline-flex align-items-center justify-content-center gap-2 text-white fw-bold"
                            style="border-radius: 999px; font-size: 0.8rem; padding: 0.52rem 1.15rem; background: linear-gradient(145deg, #666F88 0%, #2d3748 100%); border: 1.5px solid rgba(255, 255, 255, 0.9); box-shadow: 0 10px 20px -6px rgba(45, 55, 72, 0.32), inset 0 1.5px 2px rgba(255, 255, 255, 0.65);"
                            data-bs-toggle="modal"
                            data-bs-target="#newBatchModal">
                        <i class="bi bi-plus-circle-fill"></i>
                        <span>Nuevo Lote</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- 4 Tarjetas Resumen Interactivas en Cristal Pastel 3D (Clic para filtrar la BD al instante) --}}
        <div class="row g-2.5 mb-3">
            <div class="col-6 col-xl-3">
                <div class="dash-kpi-card active-kpi" data-bd-kpi="todas"
                     style="background: linear-gradient(135deg, rgba(243, 232, 237, 0.56) 0%, rgba(233, 213, 255, 0.44) 55%, rgba(255, 255, 255, 0.54) 100%);"
                     onclick="setBdStatusFilter('todas')">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="fw-bold text-uppercase" style="font-size: 0.64rem; color: #6b21a8; letter-spacing: 0.04em;">Total en SQL Server</span>
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 26px; height: 26px; background: rgba(255,255,255,0.8); border: 1px solid #fff; color: #7e22ce; font-size: 0.76rem;">
                            <i class="bi bi-hdd-stack-fill"></i>
                        </span>
                    </div>
                    <div class="d-flex align-items-baseline justify-content-between">
                        <div class="fw-bold" id="bdKpiTotal" style="font-size: 1.45rem; color: #3b0764;">{{ $bdTotalCount }}</div>
                        <span class="badge rounded-pill fw-bold" style="background: rgba(255,255,255,0.78); border: 1px solid #fff; color: #6b21a8; font-size: 0.64rem;">100% registros</span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-xl-3">
                <div class="dash-kpi-card" data-bd-kpi="en_proceso"
                     style="background: linear-gradient(135deg, rgba(224, 242, 254, 0.58) 0%, rgba(186, 230, 253, 0.48) 100%);"
                     onclick="setBdStatusFilter('en_proceso')">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="fw-bold text-uppercase" style="font-size: 0.64rem; color: #0369a1; letter-spacing: 0.04em;">En Fabricación</span>
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 26px; height: 26px; background: rgba(255,255,255,0.8); border: 1px solid #fff; color: #0369a1; font-size: 0.76rem;">
                            <i class="bi bi-gear-wide-connected"></i>
                        </span>
                    </div>
                    <div class="d-flex align-items-baseline justify-content-between">
                        <div class="fw-bold" id="bdKpiInProcess" style="font-size: 1.45rem; color: #0c4a6e;">{{ $bdInProcessCount }}</div>
                        <span class="badge rounded-pill fw-bold" style="background: rgba(255,255,255,0.78); border: 1px solid #fff; color: #075985; font-size: 0.64rem;">Pasos 1 a 7</span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-xl-3">
                <div class="dash-kpi-card" data-bd-kpi="pendientes"
                     style="background: linear-gradient(135deg, rgba(254, 243, 199, 0.58) 0%, rgba(253, 230, 138, 0.48) 100%);"
                     onclick="setBdStatusFilter('pendientes')">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="fw-bold text-uppercase" style="font-size: 0.64rem; color: #b45309; letter-spacing: 0.04em;">Etapa 0 · Pendientes</span>
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 26px; height: 26px; background: rgba(255,255,255,0.8); border: 1px solid #fff; color: #b45309; font-size: 0.76rem;">
                            <i class="bi bi-hourglass-split"></i>
                        </span>
                    </div>
                    <div class="d-flex align-items-baseline justify-content-between">
                        <div class="fw-bold" id="bdKpiPending" style="font-size: 1.45rem; color: #78350f;">{{ $bdPendingCount }}</div>
                        <span class="badge rounded-pill fw-bold" style="background: rgba(255,255,255,0.78); border: 1px solid #fff; color: #92400e; font-size: 0.64rem;">Por aprobar</span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-xl-3">
                <div class="dash-kpi-card" data-bd-kpi="finalizadas"
                     style="background: linear-gradient(135deg, rgba(220, 252, 231, 0.58) 0%, rgba(187, 247, 208, 0.48) 100%);"
                     onclick="setBdStatusFilter('finalizadas')">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="fw-bold text-uppercase" style="font-size: 0.64rem; color: #15803d; letter-spacing: 0.04em;">Liberadas · 14 Págs.</span>
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 26px; height: 26px; background: rgba(255,255,255,0.8); border: 1px solid #fff; color: #15803d; font-size: 0.76rem;">
                            <i class="bi bi-patch-check-fill"></i>
                        </span>
                    </div>
                    <div class="d-flex align-items-baseline justify-content-between">
                        <div class="fw-bold" id="bdKpiFinished" style="font-size: 1.45rem; color: #14532d;">{{ $bdFinishedCount }}</div>
                        <span class="badge rounded-pill fw-bold" style="background: rgba(255,255,255,0.78); border: 1px solid #fff; color: #166534; font-size: 0.64rem;">Completadas</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contenedor Principal de Cristal Esmerilado 3D con Filtros en Vivo y Tabla --}}
        <div class="dash-compact-card">
            {{-- Barra de Herramientas y Filtros Instantáneos --}}
            <div class="d-flex flex-column flex-xl-row align-items-stretch align-items-xl-center justify-content-between gap-2.5 mb-3">
                <div class="d-flex flex-wrap align-items-center gap-1.5">
                    <button type="button" class="tc-filter-tab active py-1 px-2.5" style="font-size: 0.74rem;" data-bd-tab="todas" onclick="setBdStatusFilter('todas')">
                        <i class="bi bi-collection"></i>
                        <span>Todos</span>
                        <span class="tc-tab-badge">{{ $bdTotalCount }}</span>
                    </button>
                    <button type="button" class="tc-filter-tab py-1 px-2.5" style="font-size: 0.74rem;" data-bd-tab="en_proceso" onclick="setBdStatusFilter('en_proceso')">
                        <span class="tc-dot" style="background: #38bdf8;"></span>
                        <span>En Proceso</span>
                        <span class="tc-tab-badge">{{ $bdInProcessCount }}</span>
                    </button>
                    <button type="button" class="tc-filter-tab py-1 px-2.5" style="font-size: 0.74rem;" data-bd-tab="pendientes" onclick="setBdStatusFilter('pendientes')">
                        <span class="tc-dot" style="background: #f59e0b;"></span>
                        <span>Pendientes</span>
                        <span class="tc-tab-badge">{{ $bdPendingCount }}</span>
                    </button>
                    <button type="button" class="tc-filter-tab py-1 px-2.5" style="font-size: 0.74rem;" data-bd-tab="finalizadas" onclick="setBdStatusFilter('finalizadas')">
                        <span class="tc-dot" style="background: #22c55e;"></span>
                        <span>Finalizados</span>
                        <span class="tc-tab-badge">{{ $bdFinishedCount }}</span>
                    </button>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span class="ep-lote-pill py-1 px-2.5" id="bdVisibleCounterBadge" style="font-size: 0.71rem; color: #475569;">
                        Mostrando {{ $bdTotalCount }} de {{ $bdTotalCount }} registros
                    </span>

                    {{-- Filtro por Planta --}}
                    <div class="dash-filter-capsule" style="background: linear-gradient(135deg, rgba(224,242,254,0.72) 0%, rgba(255,255,255,0.88) 100%);">
                        <span class="dash-filter-capsule-icon" style="background: linear-gradient(145deg, #e0f2fe 0%, #bae6fd 100%); color: #0284c7;">
                            <i class="bi bi-building"></i>
                        </span>
                        <select id="bdPlantFilter" class="dash-filter-capsule-select" onchange="filterBdTable()">
                            <option value="">Planta: Todas</option>
                            <option value="G1">Planta G1</option>
                            <option value="SA">Planta SA</option>
                            <option value="DF">Planta DF</option>
                            <option value="GF">Planta GF</option>
                            <option value="LS">Planta LS</option>
                            <option value="G2">Planta G2</option>
                            <option value="G3">Planta G3</option>
                            <option value="MPC">Planta MPC</option>
                        </select>
                    </div>

                    {{-- Buscador en Vivo --}}
                    <div class="tc-search-box py-1 px-2.5" style="min-width: 235px; background: rgba(255,255,255,0.88); border: 1.5px solid #ffffff;">
                        <i class="bi bi-search" style="color: #666F88; font-size: 0.78rem;"></i>
                        <input type="text"
                               id="searchBatchInput"
                               value="{{ request('q') }}"
                               placeholder="Buscar Lote, OP, Producto o Código..."
                               style="font-size: 0.76rem;"
                               autocomplete="off"
                               oninput="filterBdTable()">
                    </div>

                    <button type="button" id="btnResetBdFilters" class="ep-lote-pill border-0 py-1 px-2.5 d-none"
                            style="font-size: 0.71rem; color: #be123c; cursor: pointer;"
                            onclick="resetBdFilters()">
                        <i class="bi bi-x-circle me-1"></i>Limpiar
                    </button>
                </div>
            </div>

            {{-- Tabla de Registros SQL Server en Cristal 3D --}}
            <div class="table-responsive rounded-4 overflow-hidden"
                 style="background: rgba(255, 255, 255, 0.76); backdrop-filter: blur(18px); border: 1.5px solid rgba(255, 255, 255, 0.94); box-shadow: 0 12px 28px -6px rgba(45, 55, 72, 0.14), inset 0 2px 4px #ffffff;">
                <table class="table table-hover align-middle mb-0" id="bdMasterTable" style="--bs-table-bg: transparent; font-size: 0.8rem;">
                    <thead>
                        <tr style="background: linear-gradient(90deg, rgba(243, 232, 237, 0.72) 0%, rgba(207, 226, 243, 0.65) 100%); border-bottom: 1.5px solid rgba(102, 111, 136, 0.16);">
                            <th class="py-2.5 px-3 text-uppercase fw-bold" style="font-size: 0.67rem; letter-spacing: 0.05em; color: #475569;">Lote</th>
                            <th class="py-2.5 px-3 text-uppercase fw-bold" style="font-size: 0.67rem; letter-spacing: 0.05em; color: #475569;">Orden (OP) / Planta</th>
                            <th class="py-2.5 px-3 text-uppercase fw-bold" style="font-size: 0.67rem; letter-spacing: 0.05em; color: #475569;">Producto / Código / Tamaño</th>
                            <th class="py-2.5 px-3 text-uppercase fw-bold" style="font-size: 0.67rem; letter-spacing: 0.05em; color: #475569;">Estatus</th>
                            <th class="py-2.5 px-3 text-uppercase fw-bold" style="min-width: 215px; font-size: 0.67rem; letter-spacing: 0.05em; color: #475569;">Avance (7 Pasos · 14 Págs.)</th>
                            <th class="py-2.5 px-3 text-uppercase fw-bold" style="font-size: 0.67rem; letter-spacing: 0.05em; color: #475569;">Rendimiento</th>
                            <th class="py-2.5 px-3 text-uppercase fw-bold" style="font-size: 0.67rem; letter-spacing: 0.05em; color: #475569;">Actualizado</th>
                            <th class="py-2.5 px-3 text-end text-uppercase fw-bold" style="font-size: 0.67rem; letter-spacing: 0.05em; color: #475569;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($batches as $b)
                            @php
                                $isPending = ($b->status === 'Pendiente');
                                $pct = $isPending ? 0 : $b->progressPercentage();
                                $isFinished = ($b->status === 'Finalizado' || (!$isPending && $pct >= 100));
                                $completedSteps = $isPending ? 0 : ($isFinished ? 7 : max(1, (int) $b->current_step));
                                $planta = strtoupper(trim($b->val('planta', 'G1')));
                                $bdGroup = $isPending ? 'pendientes' : ($isFinished ? 'finalizadas' : 'en_proceso');
                                $opFormatted = str_starts_with(strtoupper(trim($b->orden_produccion)), 'OP')
                                    ? trim($b->orden_produccion)
                                    : 'OP-' . trim($b->orden_produccion);
                                $barColor = $isPending ? '#f59e0b' : ($isFinished ? '#22c55e' : '#0ea5e9');
                                $stepLabel = $isPending
                                    ? 'Etapa 0 · Por aprobar'
                                    : ($isFinished ? '7 de 7 Pasos · Liberado' : ($bdStepNames[$completedSteps] ?? 'Paso ' . $completedSteps . ' de 7'));
                                $searchString = strtolower($b->lote . ' ' . $opFormatted . ' ' . $b->producto . ' ' . $b->codigo . ' ' . $planta . ' ' . $b->status);
                            @endphp
                            <tr class="bd-record-row"
                                data-bd-group="{{ $bdGroup }}"
                                data-bd-plant="{{ $planta }}"
                                data-bd-search="{{ $searchString }}"
                                data-csv-lote="{{ $b->lote }}"
                                data-csv-op="{{ $opFormatted }}"
                                data-csv-planta="{{ $planta }}"
                                data-csv-producto="{{ $b->producto ?: ($b->presentacion ?: 'ANDANTOL GEL 100 G') }}"
                                data-csv-codigo="{{ $b->codigo ?: '332FB487' }}"
                                data-csv-status="{{ $isPending ? 'Pendiente' : ($isFinished ? 'Finalizado' : 'En Proceso') }}"
                                data-csv-avance="{{ $pct }}%"
                                data-csv-fecha="{{ $b->updated_at?->format('d/m/Y H:i') }}"
                                style="border-bottom: 1px solid rgba(102, 111, 136, 0.12);">
                                <td class="px-3 py-2.5" style="white-space: nowrap;">
                                    <span class="ep-lote-pill py-1 px-2.5 fw-bold" style="font-size: 0.74rem; color: #1e293b;">
                                        <i class="bi bi-upc-scan me-1" style="color: #6366f1;"></i>{{ $b->lote }}
                                    </span>
                                </td>
                                <td class="px-3 py-2.5" style="white-space: nowrap;">
                                    <div class="d-inline-flex align-items-center gap-1.5">
                                        <span class="badge rounded-pill px-2.5 py-1 fw-bold"
                                              style="background: rgba(255,255,255,0.88); color: #1e293b; border: 1.5px solid #ffffff; box-shadow: 0 3px 8px rgba(45,55,72,0.08); font-size: 0.73rem;">
                                            {{ $opFormatted }}
                                        </span>
                                        <span class="badge rounded-pill px-2 py-0.5 fw-bold"
                                              style="background: linear-gradient(135deg, #f3e8ff 0%, #e0e7ff 100%); color: #4338ca; border: 1px solid #ffffff; font-size: 0.66rem;">
                                            {{ $planta }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-3 py-2.5">
                                    <div class="fw-bold text-truncate" style="max-width: 250px; color: #1e293b; font-size: 0.77rem;">
                                        {{ $b->producto ?: ($b->presentacion ?: 'ANDANTOL GEL 100 G') }}
                                    </div>
                                    <div style="font-size: 0.69rem; color: #64748b;">
                                        Código: <strong>{{ $b->codigo ?: '332FB487' }}</strong> · {{ $b->tamano_lote ?: '500.000 kg' }}
                                    </div>
                                </td>
                                <td class="px-3 py-2.5" style="white-space: nowrap;">
                                    @if($isPending)
                                        <span class="badge rounded-pill px-2.5 py-1 fw-bold"
                                              style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); color: #92400e; border: 1.5px solid #ffffff; font-size: 0.7rem;">
                                            <i class="bi bi-hourglass-split me-1"></i>Pendiente
                                        </span>
                                    @elseif($isFinished)
                                        <span class="badge rounded-pill px-2.5 py-1 fw-bold"
                                              style="background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%); color: #166534; border: 1.5px solid #ffffff; font-size: 0.7rem;">
                                            <i class="bi bi-check-circle-fill me-1"></i>Finalizado
                                        </span>
                                    @else
                                        <span class="badge rounded-pill px-2.5 py-1 fw-bold"
                                              style="background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%); color: #075985; border: 1.5px solid #ffffff; font-size: 0.7rem;">
                                            <i class="bi bi-play-circle-fill me-1"></i>En Proceso
                                        </span>
                                    @endif
                                </td>
                                <td class="px-3 py-2.5">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <span class="fw-bold" style="color: #1e293b; font-size: 0.71rem;">{{ $stepLabel }}</span>
                                        <span class="fw-bold" style="color: {{ $barColor }}; font-size: 0.72rem;">{{ $pct }}%</span>
                                    </div>
                                    <div class="tc-step-segments">
                                        @for($s = 1; $s <= 7; $s++)
                                            @php
                                                $segActive = ($s < $completedSteps || $isFinished);
                                                $segCurrent = ($s === $completedSteps && !$isPending && !$isFinished);
                                                $segStyle = $segActive
                                                    ? "background: {$barColor};"
                                                    : ($segCurrent ? "background: {$barColor}; opacity: 0.62;" : "background: rgba(148, 163, 184, 0.24);");
                                            @endphp
                                            <span class="tc-step-seg" style="{{ $segStyle }}"></span>
                                        @endfor
                                    </div>
                                </td>
                                <td class="px-3 py-2.5" style="white-space: nowrap;">
                                    @if($b->rendimiento_porcentaje !== null)
                                        @php
                                            $inSpec = ($b->rendimiento_porcentaje >= 90 && $b->rendimiento_porcentaje <= 101);
                                        @endphp
                                        <span class="badge rounded-pill px-2.5 py-1 fw-bold"
                                              style="background: {{ $inSpec ? '#dcfce7' : '#ffe4e6' }}; color: {{ $inSpec ? '#166534' : '#9f1239' }}; border: 1px solid {{ $inSpec ? '#bbf7d0' : '#fecdd3' }}; font-size: 0.7rem;">
                                            {{ number_format($b->rendimiento_porcentaje, 2) }}%
                                        </span>
                                    @elseif($isPending)
                                        <span class="badge rounded-pill px-2 py-1" style="background: #fef3c7; color: #92400e; border: 1px solid #fde68a; font-size: 0.68rem;">
                                            Por iniciar
                                        </span>
                                    @else
                                        <span class="badge rounded-pill px-2 py-1" style="background: #e0f2fe; color: #075985; border: 1px solid #bae6fd; font-size: 0.68rem;">
                                            En captura
                                        </span>
                                    @endif
                                </td>
                                <td class="px-3 py-2.5 fw-semibold" style="color: #475569; font-size: 0.72rem; white-space: nowrap;">
                                    {{ $b->updated_at?->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-3 py-2.5 text-end" style="white-space: nowrap;">
                                    <div class="d-inline-flex align-items-center gap-1.5">
                                        <a href="{{ route('batches.edit', ['batch' => $b->id, 'step' => $b->current_step]) }}"
                                           class="btn btn-sm rounded-pill fw-bold py-1 px-2.5"
                                           style="background: linear-gradient(135deg, rgba(255,255,255,0.92) 0%, rgba(207,226,243,0.75) 100%); color: #1e293b; border: 1.5px solid #ffffff; box-shadow: 0 4px 10px rgba(45,55,72,0.10); font-size: 0.72rem;">
                                            <i class="bi {{ $isPending ? 'bi-play-fill' : ($isFinished ? 'bi-eye-fill' : 'bi-arrow-right-circle') }} me-1" style="color: #0284c7;"></i>
                                            <span>{{ $isPending ? 'Iniciar' : ($isFinished ? 'Ver 14 Págs.' : 'Continuar') }}</span>
                                        </a>
                                        @if($isFinished)
                                            <a href="{{ route('batches.print', $b->id) }}"
                                               target="_blank"
                                               class="ep-mini-print-btn"
                                               style="width: 30px; height: 30px;"
                                               title="Imprimir Formato Oficial de 14 Páginas">
                                                <i class="bi bi-printer"></i>
                                            </a>
                                        @endif
                                        <form method="POST" action="{{ route('batches.destroy', $b->id) }}" class="d-inline" onsubmit="return confirm('¿Eliminar el lote {{ $b->lote }} de SQL Server?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="ep-mini-print-btn border-0"
                                                    style="width: 30px; height: 30px; color: #e11d48;"
                                                    title="Eliminar registro de SQL Server">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    No hay lotes registrados. Haz clic en <strong>Nuevo Lote</strong> para comenzar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ===================================================================== --}}
    {{-- SECCIÓN 5: EN PROCESO (CAPTURAS EN FABRICACIÓN EN CUADROS / TARJETAS) --}}
    {{-- ===================================================================== --}}
    <div id="sec_historial" class="app-section-pane hig-spring-pane {{ in_array($activeSection, ['historial', 'en_proceso']) ? '' : 'd-none' }}">
        @php
            // Solo incluir las Órdenes de Producción que ya se mandaron a fabricación desde "Órdenes de Producción"
            $sentToFabricationBatches = $batches->where('status', '!=', 'Pendiente')->values();
            $epAllCount = $sentToFabricationBatches->count();
            $epInProcessCount = $sentToFabricationBatches->filter(fn($item) => $item->status !== 'Finalizado' && $item->progressPercentage() < 100)->count();
            $epFinishedCount = $sentToFabricationBatches->filter(fn($item) => $item->status === 'Finalizado' || $item->progressPercentage() >= 100)->count();
        @endphp

        {{-- Encabezado Fabricación + Botón "+ Seleccionar más OPs" --}}
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
            <h3 class="fw-bold mb-0" style="color: #2d3748; font-size: 1.65rem; letter-spacing: -0.03em;">Fabricación</h3>

            <button type="button" class="ep-add-op-capsule" onclick="switchSection('ordenes')">
                <span class="ep-add-op-icon">
                    <i class="bi bi-file-earmark-plus-fill"></i>
                </span>
                <span>Seleccionar más OPs</span>
            </button>
        </div>

        {{-- Pestañas de Filtro (Todas, En Proceso, Terminadas) + Filtros de Fecha en "En Proceso" --}}
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
            <div class="d-flex flex-wrap align-items-center gap-2">
                <button type="button" class="tc-filter-tab active" data-ep-filter-tab="todas">
                    <i class="bi bi-list-ul"></i>
                    <span>Todas</span>
                    <span class="tc-tab-badge" id="epCountAll">{{ $epAllCount }}</span>
                </button>

                <button type="button" class="tc-filter-tab" data-ep-filter-tab="en_proceso">
                    <span class="tc-dot tc-dot-green"></span>
                    <span>En Fabricación</span>
                    <span class="tc-tab-badge" id="epCountInProcess">{{ $epInProcessCount }}</span>
                </button>

                <button type="button" class="tc-filter-tab" data-ep-filter-tab="terminadas">
                    <span class="tc-dot tc-dot-blue"></span>
                    <span>Terminadas</span>
                    <span class="tc-tab-badge" id="epCountFinished">{{ $epFinishedCount }}</span>
                </button>
            </div>

            <div class="d-flex flex-wrap align-items-center gap-2">
                <div class="tc-search-box py-1 px-3" style="min-width: 220px; border-radius: 999px;">
                    <i class="bi bi-search" style="color: #666F88; font-size: 0.82rem;"></i>
                    <input type="text" id="epSearchInput" placeholder="Buscar OP o lote..." autocomplete="off" style="font-size: 0.82rem;" oninput="filterEpCards()">
                </div>
                <select id="epPlantFilter" class="tc-select-control" style="min-width: 145px;" onchange="filterEpCards()">
                    <option value="">Todas las plantas</option>
                    <option value="G1">Planta G1</option>
                    <option value="SA">Planta SA</option>
                    <option value="DF">Planta DF</option>
                    <option value="GF">Planta GF</option>
                    <option value="LS">Planta LS</option>
                    <option value="G2">Planta G2</option>
                    <option value="G3">Planta G3</option>
                    <option value="MPC">Planta MPC</option>
                </select>
                <select id="epStepFilter" class="tc-select-control" style="min-width: 150px;" onchange="filterEpCards()">
                    <option value="">Todos los pasos</option>
                    <option value="1">Paso 1/7 · Portada</option>
                    <option value="2">Paso 2/7 · Despeje</option>
                    <option value="3">Paso 3/7 · Monitoreo y MP</option>
                    <option value="4">Paso 4/7 · Fase I</option>
                    <option value="5">Paso 5/7 · Fase II</option>
                    <option value="6">Paso 6/7 · Mezcla Final</option>
                    <option value="7">Paso 7/7 · Descargo</option>
                </select>
                <select id="epYearFilter" class="tc-select-control" style="min-width: 96px;">
                    <option value="">Año</option>
                    <option value="2026" selected>2026</option>
                    <option value="2025">2025</option>
                </select>
                <select id="epMonthFilter" class="tc-select-control" style="min-width: 110px;">
                    <option value="">Mes</option>
                    <option value="10">Octubre</option>
                    <option value="09">Septiembre</option>
                    <option value="08">Agosto</option>
                </select>
                <input type="date" id="epDateFilter" class="tc-select-control" style="min-width: 150px;" value="">
            </div>
        </div>

        {{-- Cuadrícula de Tarjetas Verticales (Solo las OPs enviadas a fabricación) --}}
        <div class="row g-4 align-items-stretch pt-1" id="epCardsGrid">
            @forelse($sentToFabricationBatches as $idx => $b)
                @php
                    $isPending = false;
                    $pct = $b->progressPercentage();
                    $isFinished = ($b->status === 'Finalizado' || $pct >= 100);
                    $completedSteps = $isFinished ? 7 : max(1, (int) $b->current_step);
                    $planta = $b->val('planta', 'G1');
                    $opDisplay = str_starts_with(strtoupper(trim($b->orden_produccion)), 'OP')
                        ? trim($b->orden_produccion)
                        : 'OP-' . trim($b->orden_produccion);
                    $aprobadoFecha = $b->val('aprobacion.fecha', $b->updated_at?->format('d/m/Y H:i'));
                    $variantNum = ($idx % 3) + 1;
                    $wizardUrl = route('batches.edit', ['batch' => $b->id, 'step' => $b->current_step]);
                    $epTabGroup = $isFinished ? 'terminadas' : 'en_proceso';
                    $itemYear = $b->updated_at?->format('Y') ?? '2026';
                    $itemMonth = $b->updated_at?->format('m') ?? '10';
                    $itemDate = $b->updated_at?->format('Y-m-d') ?? '';
                    $epSearchStr = strtolower($opDisplay . ' ' . $b->orden_produccion . ' ' . $b->lote . ' ' . $b->producto . ' ' . ($b->codigo ?: '332FB487') . ' ' . $planta);
                @endphp
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3 ep-card-col"
                     data-ep-tab="{{ $epTabGroup }}"
                     data-ep-plant="{{ strtoupper(trim($planta)) }}"
                     data-ep-step="{{ $completedSteps }}"
                     data-ep-year="{{ $itemYear }}"
                     data-ep-month="{{ $itemMonth }}"
                     data-ep-date="{{ $itemDate }}"
                     data-ep-search="{{ $epSearchStr }}">
                    <div class="ep-portrait-card ep-variant-{{ $variantNum }}"
                         onclick="window.location.href='{{ $wizardUrl }}'">

                        {{-- Zona Superior: Medallón Squircle Blanco 3D + Píldora de Lote e Impresión (Solo cuando está terminada) --}}
                        <div class="d-flex align-items-start justify-content-between gap-2">
                            <div class="ep-medallion-circle" title="Paso {{ $completedSteps }} de 7">
                                <div class="ep-medallion-inner-ring">
                                    <span>{{ $completedSteps }}/7</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-2" onclick="event.stopPropagation();">
                                <span class="ep-lote-pill">
                                    Lote {{ $b->lote }}
                                </span>
                                @if($isFinished)
                                    <a href="{{ route('batches.print', $b->id) }}"
                                       target="_blank"
                                       class="ep-mini-print-btn"
                                       title="Imprimir Expediente 14 Páginas">
                                        <i class="bi bi-printer"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- Zona Central con Fondo de Color detrás de las Palabras (.ep-words-color-panel) --}}
                        <div class="ep-words-color-panel">
                            <div class="ep-card-eyebrow text-truncate" title="{{ $b->producto }}">
                                {{ $b->producto ?: 'ANDANTOL GEL' }} · Planta {{ $planta }}
                            </div>
                            <div class="ep-card-big-title">
                                {{ $opDisplay }}
                            </div>
                            <div class="ep-card-stage-sub text-truncate">
                                {{ $isPending ? 'Etapa 0 · Pendiente de aprobar' : ($isFinished ? 'Expediente finalizado' : ($stepNames[$b->current_step] ?? 'Paso ' . $b->current_step)) }}
                            </div>
                            <div class="mt-2" style="font-size: 0.72rem; opacity: 0.85;">
                                <i class="bi bi-box-seam me-1"></i>{{ $b->tamano_lote ?: '500.000 kg' }} &nbsp;·&nbsp; <i class="bi bi-clock me-1"></i>{{ $aprobadoFecha }}
                            </div>
                        </div>

                        {{-- Zona Inferior: Píldora 3D Blanca con Avance + Botón Circular ">" acoplado --}}
                        <div class="ep-kit-bottom-pill mt-2">
                            <div class="d-flex align-items-center gap-2 flex-grow-1 min-w-0">
                                <span class="ep-kit-status-dot">
                                    <i class="bi {{ $isFinished ? 'bi-check-lg' : ($isPending ? 'bi-hourglass-split' : 'bi-layers-half') }}"></i>
                                </span>
                                <div class="flex-grow-1 min-w-0">
                                    <div class="d-flex align-items-baseline justify-content-between pe-1">
                                        <div class="ep-card-big-pct">
                                            {{ $pct }}<span>.0%</span>
                                        </div>
                                        <span style="font-size: 0.68rem; font-weight: 700; color: #666F88;">
                                            {{ $isPending ? 'Pendiente' : ($isFinished ? 'Terminada' : 'En captura') }}
                                        </span>
                                    </div>
                                    <div class="tc-step-segments mt-1" style="width: 100%; max-width: 135px; height: 5px;">
                                        @for($s = 1; $s <= 7; $s++)
                                            <span class="tc-step-seg {{ $s < $completedSteps || $isFinished ? 'is-done' : ($s === $completedSteps && !$isPending ? 'is-current' : '') }}"></span>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <a href="{{ $wizardUrl }}"
                               class="ep-circle-go-btn"
                               onclick="event.stopPropagation();"
                               title="Continuar Captura (14 Páginas)">
                                <i class="bi bi-chevron-right fw-bold"></i>
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="section-card p-5 text-center">
                        <div class="bento-icon mx-auto mb-3" style="width: 52px; height: 52px;">
                            <i class="bi bi-layers fs-4"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="color: #2d3748;">Aún no hay capturas registradas</h6>
                        <p class="text-muted small mb-3">Selecciona una Orden de Producción y pulsa <strong>Iniciar Fabricación</strong> para que aparezca aquí en tarjetas.</p>
                        <button type="button" class="btn btn-sm btn-wine-pill px-4" onclick="switchSection('ordenes')">
                            <i class="bi bi-arrow-left me-1"></i>Ir a Órdenes de Producción
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    {{-- ===================================================================== --}}
    {{-- SECCIÓN 6: ROLES (GESTIÓN DE ROLES Y USUARIOS — ESTILO LIQUID GLASS)  --}}
    {{-- ===================================================================== --}}
    <div id="sec_roles" class="app-section-pane hig-spring-pane {{ in_array($activeSection, ['roles', 'configuracion']) ? '' : 'd-none' }}">

        {{-- Encabezado Superior Compacto: Gestión de Roles y Usuarios + Botón "+ Dar de alta usuario" en una sola fila --}}
        <div class="ep-portrait-card mb-3" style="min-height: auto; padding: 1.1rem 1.35rem; border-radius: 22px; cursor: default;">
            <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center justify-content-between gap-3">
                <div class="ep-words-color-panel m-0 py-2.5 px-3.5 flex-grow-1"
                     style="background: linear-gradient(135deg, rgba(243, 232, 237, 0.96) 0%, rgba(207, 226, 243, 0.92) 100%); color: #2d3748; min-width: 0; border-radius: 16px;">
                    <h2 class="fw-bold mb-1" style="font-size: 1.35rem; color: #1e293b; letter-spacing: -0.025em;">
                        Gestión de Roles y Usuarios
                    </h2>
                    <p class="mb-0" style="font-size: 0.84rem; color: #4a5568; font-weight: 500;">
                        Solo los usuarios con rol <strong style="color: #2d3748; font-weight: 800;">Administrador</strong> pueden dar de alta nuevos usuarios y gestionar permisos.
                    </p>
                </div>

                <button type="button"
                        class="btn d-inline-flex align-items-center justify-content-center gap-2 px-3.5 py-2.5 text-white fw-bold flex-shrink-0"
                        style="border-radius: 14px; font-size: 0.86rem; white-space: nowrap; background: linear-gradient(145deg, #666F88 0%, #2d3748 100%); border: 1.5px solid rgba(255, 255, 255, 0.88); box-shadow: 0 10px 22px -6px rgba(45, 55, 72, 0.35), inset 0 1.5px 2px rgba(255, 255, 255, 0.65); padding: 0.68rem 1.25rem;"
                        onclick="openRoleUserModal()">
                    <i class="bi bi-person-plus-fill"></i>
                    <span>+ Dar de alta usuario</span>
                </button>
            </div>
        </div>

        {{-- Tarjeta Principal de Tabla de Usuarios y Roles --}}
        <div class="ep-portrait-card" style="min-height: auto; padding: 1.25rem 1.4rem; border-radius: 22px; cursor: default;">
            {{-- Barra de Búsqueda + Contador de Usuarios Activos --}}
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
                <div class="tc-search-box" style="max-width: 360px; width: 100%; background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(243,232,237,0.9) 100%); border: 1.5px solid #ffffff;">
                    <i class="bi bi-search" style="color: #666F88;"></i>
                    <input type="text"
                           id="rolesUserSearchInput"
                           placeholder="Buscar por Nombre o Correo..."
                           autocomplete="off"
                           oninput="filterRoleUsersTable()">
                </div>

                <div class="ep-lote-pill px-3 py-1.5" style="font-size: 0.82rem; font-weight: 600; color: #4a5568;">
                    Total de usuarios activos: <strong id="rolesActiveUsersCount" class="ms-1" style="color: #2d3748;">{{ isset($roleUsers) ? $roleUsers->count() : 2 }}</strong>
                </div>
            </div>

            {{-- Tabla de Usuarios con Fondo de Cristal Esmerilado (Sincronizada con SQL Server tabla batch_users) --}}
            <div class="table-responsive rounded-4 overflow-hidden"
                 style="background: rgba(255, 255, 255, 0.90); border: 1.5px solid #ffffff; box-shadow: 0 12px 28px -6px rgba(45, 55, 72, 0.16);">
                <table class="table align-middle mb-0" style="--bs-table-bg: transparent;">
                    <thead>
                        <tr style="border-bottom: 1.5px solid rgba(102, 111, 136, 0.16); background: linear-gradient(90deg, rgba(243, 232, 237, 0.65) 0%, rgba(207, 226, 243, 0.55) 100%);">
                            <th class="py-2.5 px-4 text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.06em; color: #666F88;">
                                USUARIO & CORREO
                            </th>
                            <th class="py-2.5 px-4 text-uppercase fw-bold text-center" style="font-size: 0.72rem; letter-spacing: 0.06em; color: #666F88;">
                                ROL ASIGNADO
                            </th>
                            <th class="py-2.5 px-4 text-uppercase fw-bold text-center" style="font-size: 0.72rem; letter-spacing: 0.06em; color: #666F88;">
                                ACCIONES
                            </th>
                        </tr>
                    </thead>
                    <tbody id="rolesUsersTableBody">
                        @foreach(($roleUsers ?? collect()) as $u)
                            <tr style="border-bottom: 1px solid rgba(102, 111, 136, 0.14);">
                                <td class="py-3.5 px-4">
                                    <div class="fw-bold" style="font-size: 0.96rem; color: #1e293b;">{{ $u->name }}</div>
                                    <div style="font-size: 0.83rem; color: #666F88;">{{ $u->email }}</div>
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    <span class="d-inline-flex align-items-center justify-content-center gap-2 px-3 py-1.5 rounded-pill fw-bold"
                                          style="min-width: 155px; font-size: 0.8rem; background: linear-gradient(135deg, rgba(207, 226, 243, 0.78) 0%, rgba(243, 232, 237, 0.78) 100%); color: #2d3748; border: 1.5px solid #ffffff; box-shadow: 0 4px 12px rgba(45, 55, 72, 0.10);">
                                        <i class="bi bi-shield-shaded" style="color: #2d3748;"></i>
                                        <span>{{ $u->role }}</span>
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    @if($u->is_protected)
                                        <span class="d-inline-flex align-items-center justify-content-center gap-1.5 px-3 py-1.5 rounded-pill fw-bold"
                                              style="font-size: 0.8rem; background: linear-gradient(135deg, rgba(254, 243, 199, 0.92) 0%, rgba(253, 230, 138, 0.75) 100%); color: #b45309; border: 1.5px solid #ffffff; box-shadow: 0 4px 12px rgba(180, 83, 9, 0.12);">
                                            <i class="bi bi-lock-fill"></i>
                                            <span>Protegido</span>
                                        </span>
                                    @else
                                        <div class="d-inline-flex align-items-center gap-2">
                                            <button type="button"
                                                    class="ep-mini-print-btn"
                                                    style="width: 36px; height: 36px; color: #2d3748;"
                                                    onclick="openRoleUserModal({{ $u->id }})"
                                                    title="Editar usuario">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button"
                                                    class="ep-mini-print-btn"
                                                    style="width: 36px; height: 36px; color: #666F88;"
                                                    onclick="deleteRoleUser({{ $u->id }})"
                                                    title="Eliminar usuario">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('modals')
{{-- Modal para crear nuevo Lote / Orden de Producción (Apple Glassmorphism Sheet) --}}
<div class="modal fade" id="newBatchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('batches.store') }}" class="modal-content overflow-hidden"
              style="background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(25px) saturate(180%); -webkit-backdrop-filter: blur(25px) saturate(180%); border: 1px solid rgba(255, 255, 255, 0.4); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12); border-radius: 20px;">
            @csrf
            <div class="modal-header text-white py-2.5 px-3" style="background: rgba(45, 55, 72, 0.90); border-bottom: 1px solid rgba(255,255,255,0.3);">
                <h6 class="modal-title fw-bold mb-0">
                    <i class="bi bi-file-earmark-plus me-2"></i>Registrar Nueva Orden de Producción (OP)
                </h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-3">
                <div class="alert small py-2 px-3 mb-3" style="background: rgba(243, 232, 237, 0.70); border: 1px solid rgba(255, 255, 255, 0.4); border-radius: 14px; color: #2d3748;">
                    <strong>Formato Oficial:</strong> FGEN.018-1 V00 (14 Páginas)<br>
                    Puedes registrar la OP en <strong>Etapa 0 (Pendiente de aprobación)</strong> o aprobarla directamente.
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label class="form-label small fw-bold mb-1">Orden de Producción (OP) <span class="text-danger">*</span></label>
                        <input type="text" name="orden_produccion" class="form-control form-control-sm rounded-3" placeholder="Ej. OP-72690" required>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label small fw-bold mb-1">Número de Lote <span class="text-danger">*</span></label>
                        <input type="text" name="lote" class="form-control form-control-sm rounded-3" placeholder="Ej. 26AG0490" required>
                    </div>

                    <div class="col-sm-8">
                        <label class="form-label small fw-bold mb-1">Producto</label>
                        <input type="text" name="producto" class="form-control form-control-sm rounded-3" value="ANDANTOL (ISOTIPENDILO) GEL 0.75g / 100g">
                    </div>

                    <div class="col-sm-4">
                        <label class="form-label small fw-bold mb-1">Código</label>
                        <input type="text" name="codigo" class="form-control form-control-sm rounded-3" value="332FB487">
                    </div>

                    <div class="col-sm-4">
                        <label class="form-label small fw-bold mb-1">Planta</label>
                        <select name="planta" class="form-select form-select-sm rounded-3">
                            <option value="G1" selected>G1</option>
                            <option value="SA">SA</option>
                            <option value="DF">DF</option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label class="form-label small fw-bold mb-1">Tamaño de Lote</label>
                        <input type="text" name="tamano_lote" class="form-control form-control-sm rounded-3" value="500.000 kg">
                    </div>

                    <div class="col-sm-4">
                        <label class="form-label small fw-bold mb-1">Presentación</label>
                        <select name="presentacion" class="form-select form-select-sm rounded-3">
                            <option value="ANDANTOL GEL 100 G">ANDANTOL GEL 100 G</option>
                            <option value="ISOTIPENDILO GEL ST">ISOTIPENDILO GEL ST</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label small fw-bold mb-1">Etapa Inicial de la OP</label>
                        <select name="initial_status" class="form-select form-select-sm rounded-3">
                            <option value="Pendiente" selected>Etapa 0 - En curso (Aparecerá en la lista para seleccionarla y aprobarla)</option>
                            <option value="En Proceso">Aprobada Directamente (Ir de inmediato al llenado de 14 páginas)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-2 px-3" style="background: rgba(255,255,255,0.45); border-top: 1px solid rgba(255,255,255,0.3);">
                <button type="button" class="btn btn-sm btn-outline-wine-pill px-3" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-sm btn-wine-pill">
                    <i class="bi bi-check2-circle"></i>Guardar Orden de Producción
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal para Dar de Alta / Editar Usuario en Gestión de Roles y Usuarios --}}
<div class="modal fade" id="roleUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="roleUserForm" onsubmit="saveRoleUser(event)" class="modal-content overflow-hidden"
              style="background: rgba(255, 255, 255, 0.88); backdrop-filter: blur(25px) saturate(180%); -webkit-backdrop-filter: blur(25px) saturate(180%); border: 1.5px solid rgba(255, 255, 255, 0.85); box-shadow: 0 24px 48px rgba(45, 55, 72, 0.22); border-radius: 24px;">
            <div class="modal-header text-white py-3 px-4" style="background: linear-gradient(135deg, #666F88 0%, #2d3748 100%); border-bottom: 1px solid rgba(255,255,255,0.3);">
                <h6 class="modal-title fw-bold mb-0" id="roleUserModalTitle">
                    <i class="bi bi-person-plus-fill me-2"></i>Dar de alta usuario
                </h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" id="roleUserEditIndex" value="-1">

                <div class="mb-3">
                    <label class="form-label small fw-bold mb-1" style="color: #2d3748;">Nombre Completo o Usuario <span class="text-danger">*</span></label>
                    <input type="text" id="roleUserNameInput" class="form-control rounded-pill px-3" placeholder="Ej. Brenda Campos Valadez" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold mb-1" style="color: #2d3748;">Correo Institucional <span class="text-danger">*</span></label>
                    <input type="email" id="roleUserEmailInput" class="form-control rounded-pill px-3" placeholder="Ej. usuario@sanfer.com.mx" required>
                </div>

                <div class="mb-1">
                    <label class="form-label small fw-bold mb-1" style="color: #2d3748;">Rol Asignado <span class="text-danger">*</span></label>
                    <select id="roleUserRoleSelect" class="form-select rounded-pill px-3">
                        <option value="Administrador" selected>Administrador</option>
                        <option value="Usuario">Usuario</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer py-2.5 px-4" style="background: rgba(243, 232, 237, 0.55); border-top: 1px solid rgba(255,255,255,0.6);">
                <button type="button" class="btn btn-sm btn-outline-wine-pill px-3" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-sm btn-wine-pill px-4">
                    <i class="bi bi-check2-circle"></i>Guardar Usuario
                </button>
            </div>
        </form>
    </div>
</div>
@endpush

@push('scripts')
<script>
    function animateProgressBars(container = document) {
        container.querySelectorAll('.hig-progress-fill').forEach(bar => {
            const target = bar.getAttribute('data-target-width') || '0%';
            bar.style.width = '0%';
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    bar.style.width = target;
                });
            });
        });
    }

    function switchSection(sec) {
        document.querySelectorAll('.app-section-pane').forEach(el => {
            el.classList.add('d-none');
            el.classList.remove('hig-spring-pane');
        });
        const target = document.getElementById('sec_' + sec);
        if (target) {
            target.classList.remove('d-none');
            void target.offsetWidth;
            target.classList.add('hig-spring-pane');
            animateProgressBars(target);
            if (typeof refreshLiquidScrollAnimations === 'function') {
                refreshLiquidScrollAnimations(target);
            }
        }

        document.querySelectorAll('[data-section-link]').forEach(link => {
            const linkSec = link.getAttribute('data-section-link');
            const isActive = (linkSec === sec) || (linkSec === 'historial' && sec === 'captura');
            link.classList.toggle('active', isActive);
        });

        const url = new URL(window.location);
        url.searchParams.set('section', sec);
        window.history.replaceState({}, '', url);
    }

    function openSearchExistingBatch() {
        switchSection('ordenes');
        requestAnimationFrame(() => {
            const input = document.getElementById('tcSearchInput');
            if (input) {
                input.focus();
                input.select();
            }
        });
    }

    /* =========================================================================
       GESTIÓN DE ROLES Y USUARIOS (PERSISTENCIA EN SQL SERVER - TABLA batch_users)
       ========================================================================= */
    try { localStorage.removeItem('ebr_role_users_v1'); } catch (e) {}

    let sqlRoleUsers = @json($roleUsers ?? []);
    const csrfToken = @json(csrf_token());

    function getRoleUsersList() {
        return Array.isArray(sqlRoleUsers) ? sqlRoleUsers : [];
    }

    function renderRoleUsersTable() {
        const tbody = document.getElementById('rolesUsersTableBody');
        const countEl = document.getElementById('rolesActiveUsersCount');
        if (!tbody) return;

        const users = getRoleUsersList();
        const query = (document.getElementById('rolesUserSearchInput')?.value || '').trim().toLowerCase();

        const filtered = users.filter(u =>
            !query ||
            (u.name || '').toLowerCase().includes(query) ||
            (u.email || '').toLowerCase().includes(query) ||
            (u.role || '').toLowerCase().includes(query)
        );

        if (countEl) countEl.textContent = users.length;

        const currentUserName = @json(Auth::user()->name ?? 'Brenda Campos Valadez').trim().toLowerCase();
        const currentUserEmail = @json(Auth::user()->email ?? '').trim().toLowerCase();
        const matchedCurrentUser = users.find(u =>
            (currentUserEmail && (u.email || '').trim().toLowerCase() === currentUserEmail) ||
            (currentUserName && (u.name || '').trim().toLowerCase() === currentUserName)
        );
        if (matchedCurrentUser && matchedCurrentUser.role) {
            const topRoleBadge = document.getElementById('topbarUserRoleBadge');
            const topDropRole = document.getElementById('topbarDropdownUserRole');
            if (topRoleBadge) topRoleBadge.textContent = matchedCurrentUser.role;
            if (topDropRole) topDropRole.textContent = matchedCurrentUser.role;
        }

        tbody.innerHTML = filtered.map(u => {
            const isProt = Boolean(u.is_protected || u.protected);
            return `
            <tr style="border-bottom: 1px solid rgba(102, 111, 136, 0.14);">
                <td class="py-3.5 px-4">
                    <div class="fw-bold" style="font-size: 0.96rem; color: #1e293b;">${u.name}</div>
                    <div style="font-size: 0.83rem; color: #666F88;">${u.email}</div>
                </td>
                <td class="py-3.5 px-4 text-center">
                    <span class="d-inline-flex align-items-center justify-content-center gap-2 px-3 py-1.5 rounded-pill fw-bold"
                          style="min-width: 155px; font-size: 0.8rem; background: linear-gradient(135deg, rgba(207, 226, 243, 0.78) 0%, rgba(243, 232, 237, 0.78) 100%); color: #2d3748; border: 1.5px solid #ffffff; box-shadow: 0 4px 12px rgba(45, 55, 72, 0.10);">
                        <i class="bi bi-shield-shaded" style="color: #2d3748;"></i>
                        <span>${u.role}</span>
                    </span>
                </td>
                <td class="py-3.5 px-4 text-center">
                    ${isProt ? `
                        <span class="d-inline-flex align-items-center justify-content-center gap-1.5 px-3 py-1.5 rounded-pill fw-bold"
                              style="font-size: 0.8rem; background: linear-gradient(135deg, rgba(254, 243, 199, 0.92) 0%, rgba(253, 230, 138, 0.75) 100%); color: #b45309; border: 1.5px solid #ffffff; box-shadow: 0 4px 12px rgba(180, 83, 9, 0.12);">
                            <i class="bi bi-lock-fill"></i>
                            <span>Protegido</span>
                        </span>
                    ` : `
                        <div class="d-inline-flex align-items-center gap-2">
                            <button type="button"
                                    class="ep-mini-print-btn"
                                    style="width: 36px; height: 36px; color: #2d3748;"
                                    onclick="openRoleUserModal(${u.id})"
                                    title="Editar usuario">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button"
                                    class="ep-mini-print-btn"
                                    style="width: 36px; height: 36px; color: #666F88;"
                                    onclick="deleteRoleUser(${u.id})"
                                    title="Eliminar usuario">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    `}
                </td>
            </tr>
            `;
        }).join('');
    }

    function filterRoleUsersTable() {
        renderRoleUsersTable();
    }

    function openRoleUserModal(userId = -1) {
        const users = getRoleUsersList();
        const modalEl = document.getElementById('roleUserModal');
        const titleEl = document.getElementById('roleUserModalTitle');
        const idxInput = document.getElementById('roleUserEditIndex');
        const nameInput = document.getElementById('roleUserNameInput');
        const emailInput = document.getElementById('roleUserEmailInput');
        const roleSelect = document.getElementById('roleUserRoleSelect');

        const existingUser = userId > 0 ? users.find(item => Number(item.id) === Number(userId)) : null;

        if (existingUser) {
            if (titleEl) titleEl.innerHTML = '<i class="bi bi-pencil-square me-2"></i>Editar usuario y rol';
            if (idxInput) idxInput.value = existingUser.id;
            if (nameInput) nameInput.value = existingUser.name;
            if (emailInput) emailInput.value = existingUser.email;
            if (roleSelect) roleSelect.value = existingUser.role === 'Administrador' ? 'Administrador' : 'Usuario';
        } else {
            if (titleEl) titleEl.innerHTML = '<i class="bi bi-person-plus-fill me-2"></i>Dar de alta usuario';
            if (idxInput) idxInput.value = -1;
            if (nameInput) nameInput.value = '';
            if (emailInput) emailInput.value = '';
            if (roleSelect) roleSelect.value = 'Administrador';
        }

        if (modalEl && window.bootstrap) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    }

    async function saveRoleUser(event) {
        event.preventDefault();
        const userId = parseInt(document.getElementById('roleUserEditIndex')?.value || '-1', 10);
        const name = (document.getElementById('roleUserNameInput')?.value || '').trim();
        const email = (document.getElementById('roleUserEmailInput')?.value || '').trim();
        const role = document.getElementById('roleUserRoleSelect')?.value || 'Administrador';

        if (!name || !email) return;

        const isEdit = userId > 0;
        const url = isEdit
            ? `{{ url('/roles/users') }}/${userId}`
            : `{{ route('roles.users.store') }}`;
        const method = isEdit ? 'PUT' : 'POST';

        try {
            const response = await fetch(url, {
                method,
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ name, email, role })
            });

            const data = await response.json();
            if (!response.ok || !data.ok) {
                alert(data.message || 'No se pudo guardar el usuario en SQL Server.');
                return;
            }

            sqlRoleUsers = data.users || [];
            renderRoleUsersTable();

            const modalEl = document.getElementById('roleUserModal');
            if (modalEl && window.bootstrap) {
                bootstrap.Modal.getInstance(modalEl)?.hide();
            }
        } catch (err) {
            alert('Error de conexión al guardar en SQL Server.');
        }
    }

    async function deleteRoleUser(userId) {
        const users = getRoleUsersList();
        const target = users.find(item => Number(item.id) === Number(userId));
        if (!target || target.is_protected || target.protected) return;
        if (!confirm(`¿Eliminar al usuario "${target.name}" de SQL Server?`)) return;

        try {
            const response = await fetch(`{{ url('/roles/users') }}/${userId}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            const data = await response.json();
            if (!response.ok || !data.ok) {
                alert(data.message || 'No se pudo eliminar el usuario.');
                return;
            }

            sqlRoleUsers = data.users || [];
            renderRoleUsersTable();
        } catch (err) {
            alert('Error de conexión al eliminar de SQL Server.');
        }
    }

    /* =========================================================================
       FILTRADO E INTERACTIVIDAD EN VIVO DEL DASHBOARD DE ESTATUS (#sec_dashboard)
       ========================================================================= */
    let currentDashFilter = 'todas';
    let currentDashStepFilter = '';
    let lastDashStats = {
        total: {{ $totalOpsCount }},
        inProcess: {{ $inProcessOpsCount }},
        pending: {{ $pendingOpsCount }},
        finished: {{ $finishedOpsCount }},
        pctInProcess: {{ $pctInProcess }},
        pctPending: {{ $pctPending }},
        pctFinished: {{ $pctFinished }},
        avgPct: {{ $avgProgressPct }}
    };

    function filterDashboardOps(filterGroup) {
        currentDashFilter = filterGroup || 'todas';
        if (currentDashFilter === 'pendientes') {
            currentDashStepFilter = '';
            const stepSel = document.getElementById('dashTopStepFilter');
            if (stepSel) stepSel.value = '0';
        } else if (currentDashStepFilter === '0') {
            currentDashStepFilter = '';
            const stepSel = document.getElementById('dashTopStepFilter');
            if (stepSel) stepSel.value = '';
        }
        applyDashboardFilters();
    }

    function onDashTopStepSelect(stepVal) {
        const val = String(stepVal ?? '').trim();
        if (val === '') {
            currentDashStepFilter = '';
            if (currentDashFilter === 'pendientes') {
                currentDashFilter = 'todas';
            }
        } else if (val === '0') {
            currentDashStepFilter = '0';
            currentDashFilter = 'pendientes';
        } else {
            currentDashStepFilter = val;
            if (currentDashFilter === 'pendientes') {
                currentDashFilter = 'todas';
            }
        }
        applyDashboardFilters();
    }

    function filterDashboardByStep(stepNum) {
        const targetStr = stepNum ? String(stepNum) : '';
        currentDashStepFilter = (currentDashStepFilter === targetStr) ? '' : targetStr;
        if (currentDashStepFilter !== '' && currentDashFilter === 'pendientes') {
            currentDashFilter = 'todas';
        }
        const stepSel = document.getElementById('dashTopStepFilter');
        if (stepSel) {
            stepSel.value = currentDashStepFilter;
        }
        applyDashboardFilters();
    }

    function selectDashPlant(plantCode) {
        const normalized = (plantCode || '').trim().toUpperCase();
        const selectEl = document.getElementById('dashPlantFilter');
        if (selectEl && selectEl.value.toUpperCase() !== normalized) {
            selectEl.value = normalized;
        }
        document.querySelectorAll('[data-dash-plant-btn]').forEach(btn => {
            btn.classList.toggle('active', (btn.getAttribute('data-dash-plant-btn') || '').toUpperCase() === normalized);
        });
        applyDashboardFilters();
    }

    function resetAllDashboardFilters() {
        currentDashFilter = 'todas';
        currentDashStepFilter = '';
        const searchEl = document.getElementById('dashStatusSearchInput');
        if (searchEl) searchEl.value = '';
        const plantEl = document.getElementById('dashPlantFilter');
        if (plantEl) plantEl.value = '';
        const stepEl = document.getElementById('dashTopStepFilter');
        if (stepEl) stepEl.value = '';
        const monthEl = document.getElementById('dashTopMonthFilter');
        if (monthEl) monthEl.value = '';
        const yearEl = document.getElementById('dashTopYearFilter');
        if (yearEl) yearEl.value = '';
        document.querySelectorAll('[data-dash-plant-btn]').forEach(btn => {
            btn.classList.toggle('active', (btn.getAttribute('data-dash-plant-btn') || '') === '');
        });
        applyDashboardFilters();
    }

    function updateDonutCenterDisplay(mode) {
        const countEl = document.getElementById('donutCenterCount');
        const labelEl = document.getElementById('donutCenterLabel');
        const subEl = document.getElementById('donutCenterSub');
        if (!countEl || !labelEl || !subEl) return;

        const targetMode = mode || currentDashFilter || 'todas';
        if (targetMode === 'en_proceso') {
            countEl.textContent = lastDashStats.inProcess;
            countEl.style.color = '#0c4a6e';
            labelEl.textContent = 'EN PROCESO';
            labelEl.style.color = '#0369a1';
            subEl.textContent = `${lastDashStats.pctInProcess}% del total`;
            subEl.style.background = '#e0f2fe';
            subEl.style.color = '#075985';
        } else if (targetMode === 'pendientes') {
            countEl.textContent = lastDashStats.pending;
            countEl.style.color = '#78350f';
            labelEl.textContent = 'PENDIENTES';
            labelEl.style.color = '#b45309';
            subEl.textContent = `${lastDashStats.pctPending}% del total`;
            subEl.style.background = '#fef3c7';
            subEl.style.color = '#92400e';
        } else if (targetMode === 'finalizadas') {
            countEl.textContent = lastDashStats.finished;
            countEl.style.color = '#14532d';
            labelEl.textContent = 'FINALIZADAS';
            labelEl.style.color = '#15803d';
            subEl.textContent = `${lastDashStats.pctFinished}% completado`;
            subEl.style.background = '#dcfce7';
            subEl.style.color = '#166534';
        } else {
            countEl.textContent = lastDashStats.total;
            countEl.style.color = '#3b0764';
            labelEl.textContent = 'OPs TOTALES';
            labelEl.style.color = '#6d28d9';
            subEl.textContent = `${lastDashStats.avgPct}% Avance`;
            subEl.style.background = 'linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%)';
            subEl.style.color = '#4c1d95';
        }
    }

    function previewDonutStatus(statusKey) {
        updateDonutCenterDisplay(statusKey);
    }

    function resetDonutPreview() {
        updateDonutCenterDisplay(currentDashFilter);
    }

    function applyDashboardFilters() {
        const query = (document.getElementById('dashStatusSearchInput')?.value || '').trim().toLowerCase();
        const plant = (document.getElementById('dashPlantFilter')?.value || '').trim().toUpperCase();
        const month = (document.getElementById('dashTopMonthFilter')?.value || '').trim();
        const year = (document.getElementById('dashTopYearFilter')?.value || '').trim();
        const allRows = Array.from(document.querySelectorAll('.dash-status-row'));

        // 1. Recalcular KPIs y Donut según Planta + Mes + Año seleccionados
        const baseScopedRows = allRows.filter(r => {
            const matchPlant = !plant || (r.getAttribute('data-dash-plant') || '') === plant;
            const matchMonth = !month || (r.getAttribute('data-dash-month') || '') === month;
            const matchYear = !year || (r.getAttribute('data-dash-year') || '') === year;
            return matchPlant && matchMonth && matchYear;
        });

        const totalPlant = baseScopedRows.length;
        const inProcessPlant = baseScopedRows.filter(r => r.getAttribute('data-dash-group') === 'en_proceso').length;
        const pendingPlant = baseScopedRows.filter(r => r.getAttribute('data-dash-group') === 'pendientes').length;
        const finishedPlant = baseScopedRows.filter(r => r.getAttribute('data-dash-group') === 'finalizadas').length;

        const pctInProcess = totalPlant > 0 ? Math.round((inProcessPlant / totalPlant) * 100) : 0;
        const pctPending = totalPlant > 0 ? Math.round((pendingPlant / totalPlant) * 100) : 0;
        const pctFinished = totalPlant > 0 ? Math.round((finishedPlant / totalPlant) * 100) : 0;
        const avgPct = totalPlant > 0
            ? Math.round(baseScopedRows.reduce((acc, r) => acc + Number(r.getAttribute('data-dash-pct') || 0), 0) / totalPlant)
            : 0;

        lastDashStats = {
            total: totalPlant,
            inProcess: inProcessPlant,
            pending: pendingPlant,
            finished: finishedPlant,
            pctInProcess,
            pctPending,
            pctFinished,
            avgPct
        };

        // Actualizar números en las 4 tarjetas KPI y pestañas
        const setElText = (id, val) => { const el = document.getElementById(id); if (el) el.textContent = val; };
        setElText('kpiTotalCount', totalPlant);
        setElText('kpiAvgBadge', `Avance ${avgPct}%`);
        setElText('kpiInProcessCount', inProcessPlant);
        setElText('kpiInProcessPct', `${pctInProcess}% del total`);
        setElText('kpiPendingCount', pendingPlant);
        setElText('kpiPendingPct', `${pctPending}% del total`);
        setElText('kpiFinishedCount', finishedPlant);
        setElText('kpiFinishedPct', `${pctFinished}% completado`);

        setElText('tabBadgeTodas', totalPlant);
        setElText('tabBadgeInProcess', inProcessPlant);
        setElText('tabBadgePending', pendingPlant);
        setElText('tabBadgeFinished', finishedPlant);

        // Actualizar barras y porcentajes al lado del Donut
        setElText('barBadgeInProcess', `${inProcessPlant} (${pctInProcess}%)`);
        setElText('barBadgePending', `${pendingPlant} (${pctPending}%)`);
        setElText('barBadgeFinished', `${finishedPlant} (${pctFinished}%)`);

        const barInProc = document.getElementById('barFillInProcess');
        const barPend = document.getElementById('barFillPending');
        const barFin = document.getElementById('barFillFinished');
        if (barInProc) barInProc.style.width = `${pctInProcess}%`;
        if (barPend) barPend.style.width = `${pctPending}%`;
        if (barFin) barFin.style.width = `${pctFinished}%`;

        // Actualizar segmentos SVG del Donut en vivo
        const circ = 2 * Math.PI * 66;
        const lenInProc = (pctInProcess / 100) * circ;
        const lenPend = (pctPending / 100) * circ;
        const lenFin = (pctFinished / 100) * circ;

        const segInProc = document.getElementById('donutSegInProcess');
        const segPend = document.getElementById('donutSegPending');
        const segFin = document.getElementById('donutSegFinished');

        if (segInProc) {
            segInProc.setAttribute('stroke-dasharray', `${lenInProc} ${circ}`);
            segInProc.setAttribute('stroke-dashoffset', '0');
            segInProc.style.opacity = (currentDashFilter === 'todas' || currentDashFilter === 'en_proceso') ? '1' : '0.32';
        }
        if (segPend) {
            segPend.setAttribute('stroke-dasharray', `${lenPend} ${circ}`);
            segPend.setAttribute('stroke-dashoffset', `-${lenInProc}`);
            segPend.style.opacity = (currentDashFilter === 'todas' || currentDashFilter === 'pendientes') ? '1' : '0.32';
        }
        if (segFin) {
            segFin.setAttribute('stroke-dasharray', `${lenFin} ${circ}`);
            segFin.setAttribute('stroke-dashoffset', `-${lenInProc + lenPend}`);
            segFin.style.opacity = (currentDashFilter === 'todas' || currentDashFilter === 'finalizadas') ? '1' : '0.32';
        }

        updateDonutCenterDisplay(currentDashFilter);

        // 2. Resaltar KPI activo, Barra activa, Pestaña activa y Paso activo
        document.querySelectorAll('[data-dash-kpi]').forEach(card => {
            card.classList.toggle('active-kpi', card.getAttribute('data-dash-kpi') === currentDashFilter);
        });
        document.querySelectorAll('[data-dash-bar]').forEach(bar => {
            bar.classList.toggle('active-bar', bar.getAttribute('data-dash-bar') === currentDashFilter);
        });
        document.querySelectorAll('[data-dash-filter]').forEach(btn => {
            btn.classList.toggle('active', btn.getAttribute('data-dash-filter') === currentDashFilter);
        });
        document.querySelectorAll('[data-dash-step-row]').forEach(stepRow => {
            const stepNumStr = String(stepRow.getAttribute('data-dash-step-row') || '');
            stepRow.classList.toggle('active-step', currentDashStepFilter !== '' && currentDashStepFilter === stepNumStr);

            // Filtrar chips de OPs dentro del paso por Planta, Mes y Año
            const chips = stepRow.querySelectorAll('.dash-step-op-chip');
            let visibleChipCount = 0;
            chips.forEach(chip => {
                const chipPlant = (chip.getAttribute('data-chip-plant') || '').toUpperCase();
                const chipMonth = chip.getAttribute('data-chip-month') || '';
                const chipYear = chip.getAttribute('data-chip-year') || '';
                const showChip = (!plant || chipPlant === plant)
                    && (!month || chipMonth === month)
                    && (!year || chipYear === year);
                chip.classList.toggle('d-none', !showChip);
                if (showChip) visibleChipCount++;
            });
            const stepBarFill = stepRow.querySelector('.dash-step-bar-fill');
            if (stepBarFill) {
                const stepPct = totalPlant > 0 ? Math.max(visibleChipCount > 0 ? 18 : 4, Math.round((visibleChipCount / totalPlant) * 100)) : 4;
                stepBarFill.style.width = `${stepPct}%`;
            }
        });

        const stepBadge = document.getElementById('activeStepFilterBadge');
        if (stepBadge) {
            if (currentDashStepFilter !== '' && currentDashStepFilter !== '0') {
                stepBadge.classList.remove('d-none');
                stepBadge.innerHTML = `Filtrando: Paso ${currentDashStepFilter} <i class="bi bi-x-lg ms-1"></i>`;
            } else {
                stepBadge.classList.add('d-none');
            }
        }

        // 3. Filtrar filas de la tabla inferior
        let visibleRowsCount = 0;
        allRows.forEach(row => {
            const rowGroup = row.getAttribute('data-dash-group') || '';
            const rowPlant = row.getAttribute('data-dash-plant') || '';
            const rowStepStr = String(row.getAttribute('data-dash-step') || '0');
            const rowMonth = row.getAttribute('data-dash-month') || '';
            const rowYear = row.getAttribute('data-dash-year') || '';
            const rowSearch = row.getAttribute('data-dash-search') || '';

            const matchGroup = (currentDashFilter === 'todas') || (rowGroup === currentDashFilter);
            const matchPlant = !plant || (rowPlant === plant);
            const matchMonth = !month || (rowMonth === month);
            const matchYear = !year || (rowYear === year);
            const matchStep = (currentDashStepFilter === '')
                || (currentDashStepFilter === '0' ? rowGroup === 'pendientes' : (rowStepStr === currentDashStepFilter && rowGroup !== 'pendientes'));
            const matchSearch = !query || rowSearch.includes(query);

            const isVisible = matchGroup && matchPlant && matchMonth && matchYear && matchStep && matchSearch;
            row.classList.toggle('d-none', !isVisible);
            if (isVisible) visibleRowsCount++;
        });

        setElText('dashVisibleCounterBadge', `Mostrando ${visibleRowsCount} de ${allRows.length} OPs`);

        const resetBtn = document.getElementById('btnResetDashFilters');
        if (resetBtn) {
            const hasActiveFilter = (currentDashFilter !== 'todas')
                || (currentDashStepFilter !== '')
                || Boolean(plant)
                || Boolean(month)
                || Boolean(year)
                || Boolean(query);
            resetBtn.classList.toggle('d-none', !hasActiveFilter);
        }
    }

    /* =========================================================================
       LÓGICA DE SELECCIÓN, FILTRADO Y APROBACIÓN DE ÓRDENES DE PRODUCCIÓN (OPs)
       ========================================================================= */
    let currentTcTab = '{{ $activeOpTab }}';

    function toggleOpRowSelection(row, event) {
        if (event && (event.target.tagName === 'A' || event.target.closest('a') || event.target.tagName === 'INPUT' || event.target.closest('.tc-op-expand-fields'))) {
            return;
        }
        const checkbox = row.querySelector('.tc-row-check');
        if (checkbox) {
            checkbox.checked = !checkbox.checked;
            onOpCheckboxChange(checkbox);
        }
    }

    function onOpInlineFieldsInput(opId, defaultLote = '') {
        const loteEl = document.getElementById(`op_lote_input_${opId}`);
        const tamanoEl = document.getElementById(`op_tamano_input_${opId}`);
        const badgeEl = document.getElementById(`op_lote_badge_${opId}`);
        const hintEl = document.getElementById(`op_pending_hint_${opId}`);
        const btnEl = document.getElementById(`op_inline_start_btn_${opId}`);

        const loteVal = (loteEl?.value || '').trim();
        const tamanoVal = (tamanoEl?.value || '').trim();

        if (badgeEl) {
            badgeEl.textContent = 'Lote: ' + (loteVal || defaultLote);
        }

        const bothFilled = loteVal.length > 0 && tamanoVal.length > 0;
        if (btnEl) {
            btnEl.classList.toggle('d-none', !bothFilled);
        }
        if (hintEl) {
            hintEl.classList.toggle('d-none', bothFilled);
        }
    }

    function startSingleOpFabrication(opId) {
        const form = document.getElementById('tcApproveForm');
        if (!form) return;

        // Asegurar que la OP actual esté marcada
        document.querySelectorAll('.tc-op-row').forEach(row => {
            const cb = row.querySelector('.tc-row-check');
            if (cb && String(cb.value) === String(opId)) {
                cb.checked = true;
            }
        });
        onOpCheckboxChange();

        if (typeof showProductionLoader === 'function') {
            showProductionLoader('Iniciando fabricación...');
        }

        form.submit();
    }

    function onOpCheckboxChange(triggeredCheckbox = null) {
        const allRows = document.querySelectorAll('.tc-op-row');
        let selectedCount = 0;
        let visibleCount = 0;
        let visibleCheckedCount = 0;

        allRows.forEach(row => {
            const cb = row.querySelector('.tc-row-check');
            const isVisible = !row.classList.contains('d-none');
            if (isVisible) {
                visibleCount++;
                if (cb && cb.checked) {
                    visibleCheckedCount++;
                }
            }
            if (cb && cb.checked) {
                selectedCount++;
                row.classList.add('selected-row');
            } else {
                row.classList.remove('selected-row');
            }
        });

        if (triggeredCheckbox && triggeredCheckbox.checked) {
            const parentRow = triggeredCheckbox.closest('.tc-op-row');
            const loteInput = parentRow?.querySelector('input[id^="op_lote_input_"]');
            if (loteInput) {
                setTimeout(() => {
                    loteInput.focus();
                    loteInput.select();
                }, 40);
            }
        }

        const selectedNumEl = document.getElementById('tcSelectedNum');
        const visibleNumEl = document.getElementById('tcVisibleNum');
        const selectAllEl = document.getElementById('tcSelectAll');
        const btnApproveAndFill = document.getElementById('btnApproveAndFill');
        const btnApproveAndFillLabel = document.getElementById('btnApproveAndFillLabel');
        const btnApproveOnly = document.getElementById('btnApproveOnly');

        if (selectedNumEl) selectedNumEl.textContent = selectedCount;
        if (visibleNumEl) visibleNumEl.textContent = visibleCount;

        if (selectAllEl) {
            selectAllEl.checked = visibleCount > 0 && visibleCheckedCount === visibleCount;
            selectAllEl.indeterminate = visibleCheckedCount > 0 && visibleCheckedCount < visibleCount;
        }

        if (btnApproveAndFill) {
            btnApproveAndFill.disabled = selectedCount === 0;
            if (btnApproveAndFillLabel) {
                btnApproveAndFillLabel.textContent = selectedCount > 0
                    ? `Iniciar Fabricación (${selectedCount})`
                    : 'Iniciar Fabricación';
            }
        }
        if (btnApproveOnly) {
            btnApproveOnly.disabled = selectedCount === 0;
        }
    }

    let currentTcPage = {{ (int) ($fsoPageData['page'] ?? 1) }};
    let currentTcLastPage = {{ (int) ($fsoPageData['last_page'] ?? 1) }};
    let tcSearchDebounceTimer = null;
    let tcFetchController = null;

    function escapeHtmlAttr(str) {
        return String(str ?? '')
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    }

    function renderTcFsoRows(items) {
        const container = document.getElementById('tcTableBody');
        if (!container) return;

        if (!Array.isArray(items) || items.length === 0) {
            container.innerHTML = '<div class="text-center py-5 text-muted">No se encontraron Órdenes de Producción en la tabla FSO con esos filtros.</div>';
            onOpCheckboxChange();
            return;
        }

        const html = items.map(opItem => {
            const opKey = escapeHtmlAttr(opItem.key || '');
            const opStatus = opItem.status || 'Pendiente';
            const isPending = opStatus === 'Pendiente';
            const isFinished = opStatus === 'Finalizado';
            const planta = escapeHtmlAttr(opItem.planta || 'G1');
            const opDisplay = escapeHtmlAttr(opItem.op_display || '');
            const opLote = escapeHtmlAttr(opItem.lote || 'S/L');
            const opLoteJs = String(opItem.lote || 'S/L').replace(/\\/g, '\\\\').replace(/'/g, "\\'");
            const opProducto = escapeHtmlAttr(opItem.producto || '');
            const opCodigo = escapeHtmlAttr(opItem.codigo || 'S/C');
            const tabCategory = isPending ? 'pendientes' : (isFinished ? 'terminadas' : 'aprobadas');
            const searchString = escapeHtmlAttr(`${opItem.op_display || ''} ${opItem.producto || ''} ${opItem.codigo || ''} ${opItem.lote || ''} ${opItem.planta || ''}`.toLowerCase());

            const badgeBg = isPending ? 'rgba(245, 158, 11, 0.14)' : (isFinished ? 'rgba(59, 130, 246, 0.14)' : 'rgba(16, 185, 129, 0.14)');
            const badgeColor = isPending ? '#b45309' : (isFinished ? '#1d4ed8' : '#065f46');
            const badgeBorder = isPending ? 'rgba(245, 158, 11, 0.28)' : (isFinished ? 'rgba(59, 130, 246, 0.28)' : 'rgba(16, 185, 129, 0.28)');
            const badgeLabel = isPending ? 'Pendiente' : (isFinished ? 'Terminada' : 'En Proceso');

            return `
                <div class="recent-row-item tc-op-row d-flex flex-column gap-2"
                     data-op-id="${opKey}"
                     data-op-tab="${tabCategory}"
                     data-op-planta="${planta}"
                     data-op-search="${searchString}"
                     onclick="toggleOpRowSelection(this, event)">
                    <div class="d-flex align-items-center gap-3 w-100" style="min-width: 0;">
                        <input type="checkbox"
                               name="op_ids[]"
                               value="${opKey}"
                               class="tc-checkbox tc-row-check flex-shrink-0"
                               onclick="event.stopPropagation(); onOpCheckboxChange(this);">
                        <div class="flex-grow-1" style="min-width: 0;">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <span class="fw-bold" style="font-size: 1rem; color: #2d3748; letter-spacing: -0.01em;">${opDisplay}</span>
                                    <span class="badge text-dark" id="op_lote_badge_${opKey}" style="background: rgba(255,255,255,0.78); border: 1px solid rgba(255,255,255,0.55); font-size: 0.74rem;">Lote: ${opLote}</span>
                                    <span class="badge text-truncate" style="max-width: 480px; background: rgba(255,255,255,0.55); border: 1px solid rgba(255,255,255,0.45); color: #666F88; font-size: 0.72rem; font-weight: 600;">
                                        ${opProducto} (${opCodigo}) · Planta ${planta}
                                    </span>
                                </div>
                                <span class="badge rounded-pill" style="background: ${badgeBg}; color: ${badgeColor}; border: 1px solid ${badgeBorder}; font-size: 0.7rem; font-weight: 600;">
                                    ${badgeLabel}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="tc-op-expand-fields" onclick="event.stopPropagation();">
                        <div class="row g-3 align-items-end">
                            <div class="col-sm-6 col-md-4 col-lg-5">
                                <label class="tc-inline-label" for="op_lote_input_${opKey}">
                                    <i class="bi bi-upc-scan" style="color: #666F88;"></i>
                                    <span>Lote</span>
                                </label>
                                <input type="text"
                                       id="op_lote_input_${opKey}"
                                       name="op_lote[${opKey}]"
                                       value=""
                                       class="tc-inline-input"
                                       placeholder="Escribe el número de lote..."
                                       oninput="onOpInlineFieldsInput('${opKey}', '${opLoteJs}')">
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <label class="tc-inline-label" for="op_tamano_input_${opKey}">
                                    <i class="bi bi-box-seam" style="color: #666F88;"></i>
                                    <span>Tamaño de Lote</span>
                                </label>
                                <input type="text"
                                       id="op_tamano_input_${opKey}"
                                       name="op_tamano_lote[${opKey}]"
                                       value=""
                                       class="tc-inline-input"
                                       placeholder="Escribe el tamaño de lote..."
                                       oninput="onOpInlineFieldsInput('${opKey}', '${opLoteJs}')">
                            </div>
                            <div class="col-12 col-md-4 col-lg-3 d-flex align-items-center justify-content-end">
                                <span id="op_pending_hint_${opKey}"
                                      class="badge rounded-pill px-2.5 py-1.5"
                                      style="background: rgba(148, 163, 184, 0.14); color: #64748b; border: 1px solid rgba(148, 163, 184, 0.28); font-size: 0.7rem;">
                                    <i class="bi bi-pencil-square me-1"></i>Completa Lote y Tamaño
                                </span>
                                <button type="button"
                                        id="op_inline_start_btn_${opKey}"
                                        class="tc-approve-btn d-none w-100 justify-content-center"
                                        style="padding: 0.52rem 1rem; font-size: 0.79rem; white-space: nowrap;"
                                        onclick="startSingleOpFabrication('${opKey}')">
                                    <i class="bi bi-play-circle-fill"></i>
                                    <span>Iniciar Fabricación</span>
                                    <i class="bi bi-arrow-right-short fs-6"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }).join('');

        container.innerHTML = html;
        onOpCheckboxChange();
    }

    async function fetchTcFsoOrders(page = 1) {
        const searchVal = (document.getElementById('tcSearchInput')?.value || '').trim();
        const plantVal = (document.getElementById('tcPlantSelect')?.value || '').trim();

        if (tcFetchController) {
            tcFetchController.abort();
        }
        tcFetchController = new AbortController();

        const params = new URLSearchParams({
            page: String(page),
            per_page: '50',
            q: searchVal,
            planta: plantVal,
            tab: currentTcTab || 'todas',
        });

        try {
            const resp = await fetch(`{{ route('batches.fso_orders') }}?${params.toString()}`, {
                headers: { 'Accept': 'application/json' },
                signal: tcFetchController.signal,
            });
            if (!resp.ok) return;
            const data = await resp.json();

            currentTcPage = data.page || 1;
            currentTcLastPage = data.last_page || 1;

            renderTcFsoRows(data.items || []);

            const totalFsoEl = document.getElementById('tcTotalFsoNum');
            if (totalFsoEl && typeof data.total === 'number') {
                totalFsoEl.textContent = data.total.toLocaleString('en-US');
            }
            const pageIndEl = document.getElementById('tcPageIndicator');
            if (pageIndEl) {
                pageIndEl.textContent = `Página ${currentTcPage} de ${currentTcLastPage}`;
            }
            const prevBtn = document.getElementById('tcPrevPageBtn');
            if (prevBtn) prevBtn.disabled = currentTcPage <= 1;
            const nextBtn = document.getElementById('tcNextPageBtn');
            if (nextBtn) nextBtn.disabled = currentTcPage >= currentTcLastPage;
        } catch (err) {
            if (err && err.name === 'AbortError') return;
        }
    }

    function changeTcPage(delta) {
        const target = currentTcPage + delta;
        if (target < 1 || target > currentTcLastPage) return;
        fetchTcFsoOrders(target);
    }

    function filterTcTable(triggerRemote = false) {
        if (triggerRemote) {
            clearTimeout(tcSearchDebounceTimer);
            tcSearchDebounceTimer = setTimeout(() => {
                fetchTcFsoOrders(1);
            }, 180);
            return;
        }
        onOpCheckboxChange();
    }

    let currentEpTab = 'todas';

    function filterEpCards() {
        const searchVal = (document.getElementById('epSearchInput')?.value || '').trim().toLowerCase();
        const plantVal = (document.getElementById('epPlantFilter')?.value || '').trim().toUpperCase();
        const stepVal = (document.getElementById('epStepFilter')?.value || '').trim();
        const yearVal = (document.getElementById('epYearFilter')?.value || '').trim();
        const monthVal = (document.getElementById('epMonthFilter')?.value || '').trim();
        const dateVal = (document.getElementById('epDateFilter')?.value || '').trim();

        let countAll = 0;
        let countInProcess = 0;
        let countFinished = 0;

        document.querySelectorAll('.ep-card-col').forEach(col => {
            const colTab = col.getAttribute('data-ep-tab') || 'en_proceso';
            const colPlant = (col.getAttribute('data-ep-plant') || 'G1').toUpperCase();
            const colStep = col.getAttribute('data-ep-step') || '';
            const colYear = col.getAttribute('data-ep-year') || '';
            const colMonth = col.getAttribute('data-ep-month') || '';
            const colDate = col.getAttribute('data-ep-date') || '';
            const colSearch = col.getAttribute('data-ep-search') || '';

            const matchesPlant = !plantVal || (colPlant === plantVal);
            const matchesStep = !stepVal || (colStep === stepVal);
            const matchesYear = !yearVal || (colYear === yearVal);
            const matchesMonth = !monthVal || (colMonth === monthVal);
            const matchesDate = !dateVal || (colDate === dateVal);
            const matchesSearch = !searchVal || colSearch.includes(searchVal);

            const matchesFilters = matchesPlant && matchesStep && matchesYear && matchesMonth && matchesDate && matchesSearch;
            if (matchesFilters) {
                countAll++;
                if (colTab === 'terminadas') {
                    countFinished++;
                } else {
                    countInProcess++;
                }
            }

            const matchesTab = (currentEpTab === 'todas') || (colTab === currentEpTab);
            col.classList.toggle('d-none', !(matchesTab && matchesFilters));
        });

        const allBadge = document.getElementById('epCountAll');
        const inProcBadge = document.getElementById('epCountInProcess');
        const finBadge = document.getElementById('epCountFinished');
        if (allBadge) allBadge.textContent = countAll;
        if (inProcBadge) inProcBadge.textContent = countInProcess;
        if (finBadge) finBadge.textContent = countFinished;

        const gridEl = document.getElementById('epCardsGrid');
        if (gridEl && typeof refreshLiquidScrollAnimations === 'function') {
            refreshLiquidScrollAnimations(gridEl);
        }
    }

    /* =========================================================================
       FILTRADO EN TIEMPO REAL Y EXPORTACIÓN CSV DE BASE DE DATOS (#sec_bd)
       ========================================================================= */
    let currentBdStatusFilter = 'todas';

    function setBdStatusFilter(statusGroup) {
        currentBdStatusFilter = statusGroup || 'todas';
        document.querySelectorAll('[data-bd-kpi]').forEach(card => {
            card.classList.toggle('active-kpi', card.getAttribute('data-bd-kpi') === currentBdStatusFilter);
        });
        document.querySelectorAll('[data-bd-tab]').forEach(tab => {
            tab.classList.toggle('active', tab.getAttribute('data-bd-tab') === currentBdStatusFilter);
        });
        filterBdTable();
    }

    function filterBdTable() {
        const query = (document.getElementById('searchBatchInput')?.value || '').trim().toLowerCase();
        const plant = (document.getElementById('bdPlantFilter')?.value || '').trim().toUpperCase();
        const rows = document.querySelectorAll('.bd-record-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const rowGroup = row.getAttribute('data-bd-group') || '';
            const rowPlant = (row.getAttribute('data-bd-plant') || '').toUpperCase();
            const rowSearch = row.getAttribute('data-bd-search') || '';

            const matchGroup = (currentBdStatusFilter === 'todas') || (rowGroup === currentBdStatusFilter);
            const matchPlant = (!plant) || (rowPlant === plant);
            const matchSearch = (!query) || rowSearch.includes(query);

            const isVisible = matchGroup && matchPlant && matchSearch;
            row.classList.toggle('d-none', !isVisible);
            if (isVisible) visibleCount++;
        });

        const counterEl = document.getElementById('bdVisibleCounterBadge');
        if (counterEl) {
            counterEl.textContent = `Mostrando ${visibleCount} de ${rows.length} registros`;
        }

        const resetBtn = document.getElementById('btnResetBdFilters');
        if (resetBtn) {
            const hasFilter = (currentBdStatusFilter !== 'todas') || Boolean(plant) || Boolean(query);
            resetBtn.classList.toggle('d-none', !hasFilter);
        }
    }

    function resetBdFilters() {
        currentBdStatusFilter = 'todas';
        const searchEl = document.getElementById('searchBatchInput');
        if (searchEl) searchEl.value = '';
        const plantEl = document.getElementById('bdPlantFilter');
        if (plantEl) plantEl.value = '';
        setBdStatusFilter('todas');
    }

    function exportBdTableToCsv() {
        const rows = Array.from(document.querySelectorAll('.bd-record-row')).filter(r => !r.classList.contains('d-none'));
        const headers = ['Lote', 'Orden de Produccion', 'Planta', 'Producto', 'Codigo', 'Estatus', 'Avance', 'Actualizado'];
        const csvLines = [headers.join(',')];

        rows.forEach(r => {
            const cols = [
                r.getAttribute('data-csv-lote') || '',
                r.getAttribute('data-csv-op') || '',
                r.getAttribute('data-csv-planta') || '',
                r.getAttribute('data-csv-producto') || '',
                r.getAttribute('data-csv-codigo') || '',
                r.getAttribute('data-csv-status') || '',
                r.getAttribute('data-csv-avance') || '',
                r.getAttribute('data-csv-fecha') || ''
            ].map(val => `"${String(val).replace(/"/g, '""')}"`);
            csvLines.push(cols.join(','));
        });

        const blob = new Blob(["\uFEFF" + csvLines.join('\r\n')], { type: 'text/csv;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.download = `BatchRecords_SQLServer_${new Date().toISOString().slice(0, 10)}.csv`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
    }

    document.addEventListener('DOMContentLoaded', () => {
        animateProgressBars();

        document.querySelectorAll('[data-section-link]').forEach(link => {
            link.addEventListener('click', (e) => {
                const sec = link.getAttribute('data-section-link');
                if (document.getElementById('sec_' + sec)) {
                    e.preventDefault();
                    switchSection(sec);
                }
            });
        });

        // Master Select All checkbox
        const selectAllEl = document.getElementById('tcSelectAll');
        if (selectAllEl) {
            selectAllEl.addEventListener('change', () => {
                const checked = selectAllEl.checked;
                document.querySelectorAll('.tc-op-row').forEach(row => {
                    if (!row.classList.contains('d-none')) {
                        const cb = row.querySelector('.tc-row-check');
                        if (cb) cb.checked = checked;
                    }
                });
                onOpCheckboxChange();
            });
        }

        // Filter Tabs in En Proceso (Todas, Pendientes, Aprobadas, Terminadas)
        document.querySelectorAll('[data-ep-filter-tab]').forEach(tabBtn => {
            tabBtn.addEventListener('click', () => {
                currentEpTab = tabBtn.getAttribute('data-ep-filter-tab') || 'todas';
                document.querySelectorAll('[data-ep-filter-tab]').forEach(b => b.classList.remove('active'));
                tabBtn.classList.add('active');
                filterEpCards();
            });
        });

        document.getElementById('epYearFilter')?.addEventListener('change', filterEpCards);
        document.getElementById('epMonthFilter')?.addEventListener('change', filterEpCards);
        document.getElementById('epDateFilter')?.addEventListener('change', filterEpCards);

        // Search and Plant filter listeners in Órdenes de Producción
        document.getElementById('tcSearchInput')?.addEventListener('input', () => filterTcTable(true));
        document.getElementById('tcPlantSelect')?.addEventListener('change', () => filterTcTable(true));

        // Loader feedback when submitting approval form
        document.getElementById('tcApproveForm')?.addEventListener('submit', () => {
            if (typeof showProductionLoader === 'function') {
                showProductionLoader('Iniciando fabricación...');
            }
        });

        // Initial filter calculation
        filterTcTable();
        filterEpCards();
        filterBdTable();
        renderRoleUsersTable();
    });
</script>
@endpush
