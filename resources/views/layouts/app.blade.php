<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Grimann • Sanfer | Procedimiento de Fabricación')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Google Fonts fallback for non-Apple OS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap 5.3 & Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* ==========================================================================
           3D LIQUID GLASS KIT — DESIGN SYSTEM TOKENS (BRAND PALETTE PRESERVED)
           ========================================================================== */
        :root {
            /* Brand Palette (Cold Blues, Purples & Slate Grays) */
            --hig-slate-900: #2d3748;
            --hig-slate-700: #666F88;
            --hig-slate-600: #788199;
            --hig-slate-500: #8990a2;
            --hig-slate-400: #a3a8b7;
            --hig-slate-300: #b5bac9;

            /* 3D Liquid Glass Kit Spec */
            --glass-blur: blur(28px) saturate(190%);
            --glass-sidebar-bg: linear-gradient(165deg, rgba(56, 67, 87, 0.82) 0%, rgba(45, 55, 72, 0.74) 55%, rgba(36, 44, 58, 0.86) 100%);
            --glass-white-bg: linear-gradient(145deg, rgba(255, 255, 255, 0.74) 0%, rgba(255, 255, 255, 0.46) 52%, rgba(243, 232, 237, 0.62) 100%);
            --glass-white-hover: linear-gradient(145deg, rgba(255, 255, 255, 0.86) 0%, rgba(255, 255, 255, 0.58) 52%, rgba(243, 232, 237, 0.74) 100%);
            --glass-accent-bg: linear-gradient(135deg, rgba(243, 232, 237, 0.82) 0%, rgba(216, 222, 236, 0.58) 52%, rgba(243, 232, 237, 0.76) 100%);
            --glass-accent-hover: linear-gradient(135deg, rgba(243, 232, 237, 0.92) 0%, rgba(216, 222, 236, 0.72) 52%, rgba(243, 232, 237, 0.88) 100%);
            --glass-border: 1.5px solid rgba(255, 255, 255, 0.82);
            --glass-shadow:
                0 20px 38px -8px rgba(45, 55, 72, 0.16),
                0 8px 16px -4px rgba(45, 55, 72, 0.09),
                inset 0 2px 3px rgba(255, 255, 255, 0.95),
                inset 1.5px 0 2px rgba(255, 255, 255, 0.75),
                inset 0 -3px 8px rgba(102, 111, 136, 0.14);
            --glass-shadow-hover:
                0 26px 46px -8px rgba(45, 55, 72, 0.22),
                0 10px 20px -4px rgba(45, 55, 72, 0.12),
                inset 0 2.5px 4px rgba(255, 255, 255, 1),
                inset 1.5px 0 3px rgba(255, 255, 255, 0.85),
                inset 0 -3px 10px rgba(243, 232, 237, 0.45);
            --glass-radius: 26px;

            /* Apple Motion Spring Curves */
            --hig-spring: cubic-bezier(0.22, 1, 0.36, 1);
            --hig-spring-snappy: cubic-bezier(0.32, 0.72, 0, 1);
            --hig-ease-in-out: cubic-bezier(0.65, 0, 0.35, 1);

            /* Official EBR PDF Cell Colors */
            --ebr-blue: #cfe2f3;
            --ebr-pink: #f4cccc;
            --ebr-gray-header: #d9d9d9;

            --sidebar-width: 256px;
        }

        /* ==========================================================================
           DYNAMIC BACKGROUND LAYER (VISIBLE BEHIND SIDEBAR, HEADER & CARDS)
           ========================================================================== */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Inter", system-ui, sans-serif;
            background-color: #e6e9f2;
            background-image:
                radial-gradient(at 12% 15%, rgba(102, 111, 136, 0.24) 0px, transparent 50%),
                radial-gradient(at 88% 18%, rgba(243, 232, 237, 0.65) 0px, transparent 52%),
                radial-gradient(at 75% 85%, rgba(120, 129, 153, 0.22) 0px, transparent 55%),
                url('{{ asset("images/fondo.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: var(--hig-slate-900);
            min-height: 100vh;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            letter-spacing: -0.011em;
        }

        h1, h2, h3, h4, h5, h6 {
            letter-spacing: -0.024em;
        }

        /* Reusable 3D Liquid Glass Utility Classes */
        .glass-panel {
            background: var(--glass-white-bg);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            border: var(--glass-border);
            box-shadow: var(--glass-shadow);
            border-radius: var(--glass-radius);
        }

        .glass-panel-accent {
            background: var(--glass-accent-bg);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            border: var(--glass-border);
            box-shadow: var(--glass-shadow);
            border-radius: var(--glass-radius);
        }

        /* Layout Shell */
        .app-shell {
            display: flex;
            min-height: 100vh;
            width: 100%;
            position: relative;
        }

        /* ==========================================================================
           SIDEBAR LIQUID GLASS — Floating Frosted Glass (Expanded + Slim Pill Modes)
           Conservando colores de marca (#2d3748, #666F88, #788199, #F3E8ED, #cfe2f3)
           ========================================================================== */
        .app-sidebar {
            width: 232px;
            min-width: 232px;
            background:
                radial-gradient(ellipse 88% 56% at 75% 44%, rgba(243, 232, 237, 0.44) 0%, rgba(137, 144, 162, 0.36) 48%, transparent 78%),
                radial-gradient(circle at 20% 74%, rgba(207, 226, 243, 0.24) 0%, transparent 55%),
                linear-gradient(158deg, rgba(27, 35, 50, 0.94) 0%, rgba(82, 92, 114, 0.78) 48%, rgba(25, 33, 48, 0.95) 100%);
            backdrop-filter: blur(28px) saturate(180%);
            -webkit-backdrop-filter: blur(28px) saturate(180%);
            border: 1.5px solid rgba(255, 255, 255, 0.34);
            border-radius: 26px;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 12px;
            bottom: 12px;
            left: 12px;
            z-index: 1040;
            box-shadow:
                0 24px 48px -8px rgba(15, 23, 42, 0.42),
                inset 0 1.5px 2px rgba(255, 255, 255, 0.45),
                inset 0 -1.5px 3px rgba(243, 232, 237, 0.22);
            transition:
                width 0.42s var(--hig-spring-snappy),
                min-width 0.42s var(--hig-spring-snappy),
                transform 0.45s var(--hig-spring-snappy),
                border-radius 0.35s ease;
            overflow: hidden;
        }

        .sidebar-brand {
            padding: 1.25rem 1.15rem 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-logo-white {
            height: 62px;
            width: 185px;
            max-width: 100%;
            object-fit: contain;
            filter: brightness(0) invert(1);
            display: block;
            transform: scale(1.14);
            transition: transform 0.28s var(--hig-spring), opacity 0.22s ease;
        }
        .sidebar-brand:hover .sidebar-logo-white {
            transform: scale(1.18);
        }

        /* Icono compacto blanco cuando la barra está en modo Slim (como el icono blanco superior izquierdo en la referencia) */
        .sidebar-slim-brand-badge {
            display: none;
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: #ffffff;
            color: #2d3748;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            box-shadow:
                0 6px 14px rgba(0, 0, 0, 0.25),
                inset 0 1.5px 2px #ffffff;
            margin: 0 auto;
        }

        /* Líneas divisorias horizontales difuminadas de cristal */
        .sidebar-glass-line {
            height: 1px;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.34) 0%, rgba(255, 255, 255, 0.12) 75%, transparent 100%);
            margin: 0.35rem 1.25rem;
            flex-shrink: 0;
        }

        .sidebar-section-label {
            font-size: 0.67rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.09em;
            color: rgba(255, 255, 255, 0.72);
            padding: 0.55rem 1.35rem 0.35rem;
        }

        .sidebar-nav {
            padding: 0.25rem 0.85rem;
            flex-grow: 1;
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
            display: flex;
            flex-direction: column;
        }
        .sidebar-nav::-webkit-scrollbar {
            display: none;
        }

        .sidebar-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.66rem 0.95rem;
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.80);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.89rem;
            margin-bottom: 0.3rem;
            border: 1px solid transparent;
            background: transparent;
            width: 100%;
            text-align: left;
            transition:
                background 0.22s ease,
                color 0.18s ease,
                transform 0.22s var(--hig-spring);
            user-select: none;
        }

        /* Barra vertical blanca luminosa en el borde izquierdo para el ítem activo (como en la foto) */
        .sidebar-link::before {
            content: '';
            position: absolute;
            left: -0.85rem;
            top: 50%;
            transform: translateY(-50%) scaleY(0);
            width: 4px;
            height: 22px;
            border-radius: 0 999px 999px 0;
            background: #ffffff;
            box-shadow: 0 0 12px rgba(255, 255, 255, 0.95), 0 0 4px #ffffff;
            transition: transform 0.26s var(--hig-spring);
        }

        .sidebar-link .hig-sf-icon {
            width: 19px;
            height: 19px;
            stroke-width: 1.85;
            color: rgba(255, 255, 255, 0.82);
            flex-shrink: 0;
            transition: color 0.2s ease, transform 0.24s var(--hig-spring);
        }

        .sidebar-link-text {
            flex-grow: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-link-chevron {
            font-size: 0.72rem;
            opacity: 0;
            transform: translateX(-4px);
            transition: all 0.22s ease;
            color: rgba(255, 255, 255, 0.85);
        }

        /* Punto blanco luminoso de notificación (como en "Subscription" de la imagen) */
        .sidebar-notif-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #ffffff;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.95);
            flex-shrink: 0;
        }

        .sidebar-link:hover {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.16) 0%, rgba(255, 255, 255, 0.04) 100%);
            color: #ffffff;
        }

        .sidebar-link:hover .hig-sf-icon {
            color: #ffffff;
            transform: scale(1.05);
        }

        /* Estado Activo: Franja horizontal esmerilada + Barra luminosa izquierda + Flecha derecha ">" */
        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.26) 0%, rgba(243, 232, 237, 0.15) 65%, rgba(255, 255, 255, 0.03) 100%);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #ffffff;
            font-weight: 700;
            box-shadow: 0 8px 20px -6px rgba(15, 23, 42, 0.22);
        }

        .sidebar-link.active::before {
            transform: translateY(-50%) scaleY(1);
        }

        .sidebar-link.active .hig-sf-icon {
            color: #ffffff;
            filter: drop-shadow(0 0 6px rgba(255, 255, 255, 0.45));
        }

        .sidebar-link.active .sidebar-link-chevron {
            opacity: 0.9;
            transform: translateX(0);
        }

        /* Pie de barra lateral con Avatar + Nombre + Rol + ">" (como en la imagen de referencia) */
        .sidebar-footer {
            padding: 0.75rem 1.05rem 1rem;
        }

        .sidebar-user-card {
            display: flex;
            align-items: center;
            gap: 0.72rem;
            padding: 0.35rem 0.4rem;
            border-radius: 14px;
            color: #ffffff;
            text-decoration: none;
            transition: background 0.2s ease;
        }
        .sidebar-user-card:hover {
            background: rgba(255, 255, 255, 0.10);
            color: #ffffff;
        }

        .sidebar-user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(145deg, #2d3748 0%, #111827 100%);
            border: 1.5px solid rgba(243, 232, 237, 0.65);
            color: #ffffff;
            font-weight: 700;
            font-size: 0.88rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.28);
        }

        .sidebar-user-info {
            flex-grow: 1;
            min-width: 0;
        }

        .sidebar-user-name {
            font-size: 0.83rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-user-role {
            font-size: 0.68rem;
            color: rgba(255, 255, 255, 0.62);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ==========================================================================
           MAIN WORKSPACE & MODO SLIM PILL (COMO LA BARRA DELGADA IZQUIERDA DE LA FOTO)
           ========================================================================== */
        .app-main {
            flex: 1 1 0%;
            min-width: 0;
            width: calc(100% - 252px);
            max-width: calc(100% - 252px);
            margin-left: 252px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            background: transparent;
            transition:
                margin-left 0.42s var(--hig-spring-snappy),
                width 0.42s var(--hig-spring-snappy),
                max-width 0.42s var(--hig-spring-snappy);
        }

        /* Cuando se contrae en escritorio, se convierte en la píldora vertical delgada (68px) de la foto */
        @media (min-width: 992px) {
            body.sidebar-collapsed .app-sidebar {
                width: 68px;
                min-width: 68px;
                border-radius: 30px;
            }
            body.sidebar-collapsed .app-main {
                margin-left: 88px;
                width: calc(100% - 88px);
                max-width: calc(100% - 88px);
            }
            body.sidebar-collapsed .sidebar-window-dots {
                justify-content: center;
                padding: 1.05rem 0.35rem 0.45rem;
                gap: 5px;
            }
            body.sidebar-collapsed .sidebar-brand {
                padding: 0.45rem 0.5rem 0.85rem;
                justify-content: center;
            }
            body.sidebar-collapsed .sidebar-logo-white {
                display: none;
            }
            body.sidebar-collapsed .sidebar-slim-brand-badge {
                display: inline-flex;
            }
            body.sidebar-collapsed .sidebar-section-label,
            body.sidebar-collapsed .sidebar-link-text,
            body.sidebar-collapsed .sidebar-link-chevron,
            body.sidebar-collapsed .sidebar-user-info,
            body.sidebar-collapsed .sidebar-user-chevron {
                display: none !important;
            }
            body.sidebar-collapsed .sidebar-glass-line {
                margin: 0.45rem 0.85rem;
                background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.35) 50%, transparent 100%);
            }
            body.sidebar-collapsed .sidebar-nav {
                padding: 0.25rem 0.55rem;
                align-items: center;
            }
            body.sidebar-collapsed .sidebar-link {
                justify-content: center;
                padding: 0.68rem;
                width: 44px;
                height: 44px;
                border-radius: 13px;
            }
            body.sidebar-collapsed .sidebar-link::before {
                left: -0.65rem;
            }
            body.sidebar-collapsed .sidebar-notif-dot {
                position: absolute;
                top: 8px;
                right: 8px;
                width: 6px;
                height: 6px;
            }
            body.sidebar-collapsed .sidebar-footer {
                padding: 0.65rem 0.4rem 0.95rem;
                display: flex;
                justify-content: center;
            }
            body.sidebar-collapsed .sidebar-user-card {
                padding: 0;
                justify-content: center;
            }
        }

        /* ==========================================================================
           FLOATING LIQUID GLASS HEADER
           ========================================================================== */
        .app-topbar {
            background: var(--glass-white-bg);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            border-radius: 999px;
            margin: 1.15rem 1.75rem 0;
            padding: 0.6rem 1.1rem 0.6rem 1.25rem;
            box-shadow: var(--glass-shadow);
            border: var(--glass-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            position: relative;
            z-index: 10;
            transition: box-shadow 0.3s var(--hig-spring), background 0.25s ease;
        }

        .topbar-breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.86rem;
            font-weight: 500;
            color: #5a6275;
            letter-spacing: -0.01em;
        }

        .topbar-breadcrumb strong {
            color: #2d3748;
            font-weight: 700;
        }

        .btn-menu-toggle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95) 0%, rgba(243, 244, 248, 0.82) 100%);
            border: 1.5px solid rgba(255, 255, 255, 0.9);
            color: var(--hig-slate-900);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 8px 18px -3px rgba(45, 55, 72, 0.16),
                inset 0 2px 2px rgba(255, 255, 255, 1),
                inset 0 -2px 4px rgba(102, 111, 136, 0.12);
            transition: all 0.24s var(--hig-spring);
        }
        .btn-menu-toggle:hover {
            background: #ffffff;
            color: var(--hig-slate-900);
            transform: translateY(-1px) scale(1.05);
            box-shadow:
                0 12px 22px -3px rgba(45, 55, 72, 0.22),
                inset 0 2px 2px rgba(255, 255, 255, 1);
        }
        .btn-menu-toggle:active {
            transform: scale(0.95);
        }

        /* User Chip / 3D Liquid Glass Capsule */
        .user-profile-pill {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: var(--glass-accent-bg);
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            border: 1.5px solid rgba(255, 255, 255, 0.88);
            border-radius: 9999px;
            padding: 0.3rem 1.05rem 0.3rem 0.35rem;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            box-shadow:
                0 10px 22px -4px rgba(45, 55, 72, 0.14),
                inset 0 2px 3px rgba(255, 255, 255, 0.95),
                inset 0 -2px 5px rgba(102, 111, 136, 0.12);
            transition: all 0.24s var(--hig-spring);
        }
        .user-profile-pill:hover {
            background: var(--glass-accent-hover);
            transform: translateY(-1px) scale(1.015);
            box-shadow: var(--glass-shadow-hover);
        }
        .user-profile-pill:active {
            transform: scale(0.98);
        }

        .user-avatar-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(145deg, #788199 0%, #2d3748 100%);
            color: #ffffff;
            font-weight: 700;
            font-size: 0.88rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            border: 1.5px solid rgba(255, 255, 255, 0.78);
            box-shadow:
                0 4px 10px rgba(45, 55, 72, 0.25),
                inset 0 2px 2px rgba(255, 255, 255, 0.45);
        }

        .user-status-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #34c759;
            border: 2px solid #ffffff;
            position: absolute;
            bottom: -1px;
            right: -1px;
        }

        .user-role-badge {
            font-size: 0.64rem;
            font-weight: 700;
            color: var(--hig-slate-700);
            letter-spacing: 0.03em;
            display: block;
            line-height: 1.15;
        }

        /* Content Container - NO z-index stacking context so modals are never trapped */
        .app-content {
            padding: 1.5rem 1.75rem 2.4rem;
            flex-grow: 1;
        }

        .modal {
            z-index: 1060 !important;
        }
        .modal-backdrop {
            z-index: 1050 !important;
            backdrop-filter: blur(8px);
        }

        /* ==========================================================================
           3D LIQUID GLASS BUTTONS & MICRO-INTERACTIONS
           ========================================================================== */
        .btn-sanfer {
            background: linear-gradient(180deg, rgba(120, 129, 153, 0.92) 0%, rgba(102, 111, 136, 0.88) 48%, rgba(45, 55, 72, 0.96) 100%);
            backdrop-filter: var(--glass-blur);
            color: #ffffff;
            border: 1.5px solid rgba(255, 255, 255, 0.72);
            border-radius: 999px;
            font-weight: 600;
            box-shadow:
                0 14px 26px -5px rgba(45, 55, 72, 0.34),
                0 5px 12px -2px rgba(102, 111, 136, 0.22),
                inset 0 3px 4px rgba(255, 255, 255, 0.62),
                inset 0 -3px 6px rgba(243, 232, 237, 0.28);
            transition: transform 0.24s var(--hig-spring), box-shadow 0.24s var(--hig-spring), background 0.2s ease;
        }
        .btn-sanfer:hover {
            background: linear-gradient(180deg, #788199 0%, #555d73 48%, #1e2633 100%);
            color: #ffffff;
            transform: translateY(-2px) scale(1.015);
            box-shadow:
                0 18px 32px -5px rgba(45, 55, 72, 0.42),
                inset 0 3px 5px rgba(255, 255, 255, 0.75);
        }
        .btn-sanfer:active {
            transform: scale(0.98) !important;
        }

        /* Screen Spring Transition Animation */
        @keyframes higSpringEnter {
            0% {
                opacity: 0;
                transform: translateY(12px) scale(0.985);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .hig-spring-pane {
            animation: higSpringEnter 0.46s var(--hig-spring) forwards;
            will-change: transform, opacity;
        }

        /* ==========================================================================
           SCROLL-DOWN REVEAL ANIMATION (3D LIQUID GLASS SPRING + SHIMMER)
           ========================================================================== */
        .liquid-scroll-item {
            opacity: 0;
            transform: translateY(42px) scale(0.94);
            filter: blur(6px);
            transition:
                opacity 0.65s cubic-bezier(0.22, 1, 0.36, 1) var(--scroll-delay, 0ms),
                transform 0.72s cubic-bezier(0.22, 1, 0.36, 1) var(--scroll-delay, 0ms),
                filter 0.55s cubic-bezier(0.22, 1, 0.36, 1) var(--scroll-delay, 0ms),
                box-shadow 0.34s var(--hig-spring),
                border-color 0.24s ease;
            will-change: opacity, transform, filter;
        }

        .liquid-scroll-item.is-scroll-visible {
            opacity: 1;
            transform: translateY(0) scale(1);
            filter: blur(0px);
        }

        .ep-portrait-card.liquid-scroll-item.is-scroll-visible:hover {
            transform: translateY(-8px) scale(1.016) !important;
            transition-delay: 0ms !important;
        }

        /* Subtle diagonal glass reflection sweep when card reveals on scroll */
        .ep-portrait-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -130%;
            width: 65%;
            height: 100%;
            background: linear-gradient(
                105deg,
                transparent 0%,
                rgba(255, 255, 255, 0.32) 50%,
                transparent 100%
            );
            transform: skewX(-20deg);
            pointer-events: none;
            transition: left 0.85s cubic-bezier(0.22, 1, 0.36, 1) var(--scroll-delay, 0ms);
        }

        .ep-portrait-card.is-scroll-visible::before {
            left: 165%;
        }

        /* ==========================================================================
           3D ANIMATED PHARMACEUTICAL PRODUCTION LOADING SCREEN (LIQUID GLASS 3D)
           ========================================================================== */
        .hig-loader-overlay {
            position: fixed;
            inset: 0;
            z-index: 2000;
            background:
                radial-gradient(circle at 50% 42%, rgba(243, 232, 237, 0.72) 0%, rgba(207, 226, 243, 0.62) 48%, rgba(181, 186, 201, 0.58) 100%);
            backdrop-filter: blur(22px) saturate(190%);
            -webkit-backdrop-filter: blur(22px) saturate(190%);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
            visibility: visible;
            perspective: 1200px;
            transition:
                opacity 0.42s var(--hig-spring),
                visibility 0.42s var(--hig-spring);
        }

        .hig-loader-overlay.is-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .hig-loader-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(
                145deg,
                rgba(255, 255, 255, 0.84) 0%,
                rgba(243, 232, 237, 0.68) 52%,
                rgba(207, 226, 243, 0.64) 100%
            );
            backdrop-filter: blur(28px) saturate(200%);
            -webkit-backdrop-filter: blur(28px) saturate(200%);
            border: 2px solid rgba(255, 255, 255, 0.94);
            box-shadow:
                24px 36px 68px -12px rgba(45, 55, 72, 0.28),
                0 12px 28px -6px rgba(102, 111, 136, 0.18),
                inset 0 3px 6px rgba(255, 255, 255, 0.98),
                inset 0 -4px 10px rgba(207, 226, 243, 0.55);
            border-radius: 28px;
            padding: 1.75rem 2.4rem 1.55rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transform: translateY(0) scale(1) rotateX(0deg);
            transform-style: preserve-3d;
            transition: transform 0.45s var(--hig-spring);
        }

        .hig-loader-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 8%;
            right: 8%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #ffffff, transparent);
            pointer-events: none;
        }

        .hig-loader-overlay.is-hidden .hig-loader-card {
            transform: translateY(14px) scale(0.92) rotateX(6deg);
        }

        .hig-loader-stage-3d {
            position: relative;
            width: 210px;
            height: 158px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: loaderStageFloat3D 3.2s ease-in-out infinite alternate;
        }

        .hig-loader-svg {
            width: 210px;
            height: 158px;
            overflow: visible;
            filter: drop-shadow(0 14px 20px rgba(45, 55, 72, 0.18));
        }

        /* 1. 3D Dual Gears Rotation */
        .loader-gear-main-spin {
            transform-origin: 90px 42px;
            animation: loaderGearSpinCW 4.2s linear infinite;
        }
        .loader-gear-sub-spin {
            transform-origin: 134px 52px;
            animation: loaderGearSpinCCW 3.1s linear infinite;
        }

        /* 2. 3D Floating Arrows */
        .loader-arrow-3d-up {
            animation: loaderArrow3DUp 1.25s ease-in-out infinite alternate;
        }
        .loader-arrow-3d-down {
            animation: loaderArrow3DDown 1.25s ease-in-out infinite alternate;
        }

        /* 3. 3D Isometric Boxes & Vials on Conveyor */
        .loader-box-3d-1 {
            animation: loaderBox3DGlide1 1.3s ease-in-out infinite alternate;
        }
        .loader-box-3d-2 {
            animation: loaderBox3DGlide2 1.3s ease-in-out 0.35s infinite alternate;
        }
        .loader-vial-3d {
            animation: loaderBox3DGlide1 1.1s ease-in-out 0.2s infinite alternate;
        }

        /* 4. 3D Dosing Laser / Liquid Beam */
        .loader-dosing-beam-3d {
            animation: loaderBeamPulse3D 0.95s ease-in-out infinite alternate;
        }

        /* 5. 3D Conveyor Rollers Spoke Spin */
        .loader-roller-spin-1 { transform-origin: 48px 132px; animation: loaderGearSpinCW 1.8s linear infinite; }
        .loader-roller-spin-2 { transform-origin: 79px 132px; animation: loaderGearSpinCW 1.8s linear infinite; }
        .loader-roller-spin-3 { transform-origin: 110px 132px; animation: loaderGearSpinCW 1.8s linear infinite; }
        .loader-roller-spin-4 { transform-origin: 141px 132px; animation: loaderGearSpinCW 1.8s linear infinite; }
        .loader-roller-spin-5 { transform-origin: 172px 132px; animation: loaderGearSpinCW 1.8s linear infinite; }

        @keyframes loaderStageFloat3D {
            0% { transform: translateY(0px); }
            100% { transform: translateY(-4px); }
        }

        @keyframes loaderGearSpinCW {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes loaderGearSpinCCW {
            0% { transform: rotate(360deg); }
            100% { transform: rotate(0deg); }
        }

        @keyframes loaderArrow3DUp {
            0% { transform: translateY(4px); opacity: 0.78; }
            100% { transform: translateY(-5px); opacity: 1; }
        }

        @keyframes loaderArrow3DDown {
            0% { transform: translateY(-5px); opacity: 0.78; }
            100% { transform: translateY(4px); opacity: 1; }
        }

        @keyframes loaderBox3DGlide1 {
            0% { transform: translate(0px, 0px); }
            100% { transform: translate(3px, -3.5px); }
        }

        @keyframes loaderBox3DGlide2 {
            0% { transform: translate(0px, -3px); }
            100% { transform: translate(-3px, 0.5px); }
        }

        @keyframes loaderBeamPulse3D {
            0% { opacity: 0.45; transform: scaleY(0.92); }
            100% { opacity: 1; transform: scaleY(1.06); }
        }

        .hig-loader-title {
            font-size: 0.96rem;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.02em;
            margin-top: 0.55rem;
            margin-bottom: 0.18rem;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .hig-loader-sub {
            font-size: 0.75rem;
            font-weight: 600;
            color: #666F88;
            margin-bottom: 0.8rem;
        }

        .hig-loader-bar-track {
            width: 168px;
            height: 8px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.65);
            border: 1.5px solid rgba(255, 255, 255, 0.95);
            box-shadow:
                inset 0 2px 4px rgba(45, 55, 72, 0.14),
                0 2px 6px rgba(255, 255, 255, 0.8);
            overflow: hidden;
            position: relative;
        }

        .hig-loader-bar-fill {
            width: 48%;
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg, #2d3748 0%, #666F88 45%, #38bdf8 80%, #a855f7 100%);
            box-shadow: 0 0 10px rgba(56, 189, 248, 0.45), inset 0 1px 2px rgba(255, 255, 255, 0.85);
            animation: loaderShimmerBar 1.15s var(--hig-ease-in-out) infinite alternate;
        }

        @keyframes loaderShimmerBar {
            0% { transform: translateX(-12%); width: 40%; }
            100% { transform: translateX(132%); width: 52%; }
        }

        /* ==========================================================================
           RESPONSIVE BREAKPOINTS (MONITORS GRANDES 4K/XXL, LAPTOPS, TABLETS, MÓVIL)
           ========================================================================== */
        .sidebar-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.35);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            z-index: 1035;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        body.sidebar-open .sidebar-backdrop {
            opacity: 1;
            visibility: visible;
        }

        /* Monitores Grandes y Ultrawide (>= 1600px) */
        @media (min-width: 1600px) {
            :root {
                --sidebar-width: 268px;
            }
            .app-topbar {
                margin: 1.25rem 2.25rem 0;
                padding: 0.8rem 1.65rem;
            }
            .app-content {
                padding: 1.75rem 2.25rem 2.75rem;
                max-width: 1920px;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* Monitores Medianos / Laptops Chicos (992px - 1399.98px, ej. 1366x768) */
        @media (min-width: 992px) and (max-width: 1399.98px) {
            :root {
                --sidebar-width: 232px;
            }
            .sidebar-brand {
                padding: 1.15rem 1.15rem 1rem;
            }
            .sidebar-link {
                padding: 0.6rem 0.85rem;
                font-size: 0.86rem;
                gap: 0.7rem;
            }
            .app-topbar {
                margin: 0.9rem 1.15rem 0;
                padding: 0.6rem 1.1rem;
            }
            .app-content {
                padding: 1.15rem 1.15rem 2rem;
            }
        }

        /* Tablets y Pantallas Menores a 992px */
        @media (max-width: 991.98px) {
            .app-sidebar {
                transform: translateX(-104%);
            }
            body.sidebar-open .app-sidebar {
                transform: translateX(0);
                opacity: 1;
                filter: none;
            }
            .app-main,
            body.sidebar-collapsed .app-main {
                margin-left: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
            }
            .app-topbar {
                margin: 0.75rem 0.9rem 0;
                padding: 0.55rem 0.9rem;
                border-radius: 999px;
                gap: 0.5rem;
            }
            .app-content {
                padding: 0.95rem 0.85rem 1.8rem;
                width: 100%;
                max-width: 100%;
                overflow-x: hidden;
            }
        }

        /* Pantallas Pequeñas / Móviles (< 575.98px) */
        @media (max-width: 575.98px) {
            .app-topbar {
                margin: 0.5rem 0.55rem 0;
                padding: 0.42rem 0.65rem;
                border-radius: 999px;
                gap: 0.4rem;
            }
            .btn-menu-toggle {
                width: 34px;
                height: 34px;
                flex-shrink: 0;
            }
            .topbar-breadcrumb {
                font-size: 0.74rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 155px;
            }
            .topbar-breadcrumb span:first-child,
            .topbar-breadcrumb span:nth-child(2) {
                display: none;
            }
            .topbar-breadcrumb strong {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                display: block;
            }
            .user-profile-pill {
                padding: 0.2rem 0.55rem 0.2rem 0.22rem;
                gap: 0.35rem;
            }
            .user-avatar-circle {
                width: 30px;
                height: 30px;
                font-size: 0.78rem;
            }
            .app-content {
                padding: 0.7rem 0.55rem 1.4rem;
            }
            .hig-loader-card {
                padding: 1.35rem 1.5rem 1.25rem;
                width: calc(100vw - 2rem);
                max-width: 310px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    @php
        $userName = Auth::user()->name ?? 'Brenda Campos Valadez';
        $userEmail = Auth::user()->email ?? null;
        $userInitial = mb_strtoupper(mb_substr(trim($userName), 0, 1));
        $userRole = 'Administrador';
        try {
            $batchUserRecord = null;
            if ($userEmail) {
                $batchUserRecord = \App\Models\BatchUser::where('email', $userEmail)->first();
            }
            if (!$batchUserRecord) {
                $batchUserRecord = \App\Models\BatchUser::where('name', $userName)->first();
            }
            if ($batchUserRecord && !empty($batchUserRecord->role)) {
                $userRole = $batchUserRecord->role;
            }
        } catch (\Throwable $e) {
            $userRole = 'Administrador';
        }
        $currentSection = request('section', request()->routeIs('batches.*') ? 'historial' : 'inicio');
    @endphp

    {{-- PANTALLA DE CARGA ANIMADA EN 3D (LÍNEA DE PRODUCCIÓN FARMACÉUTICA + ENGRANAJES 3D + CAJAS ISOMÉTRICAS) --}}
    <div id="higPageLoader" class="hig-loader-overlay is-hidden d-print-none" role="status" aria-live="polite">
        <div class="hig-loader-card">
            <div class="hig-loader-stage-3d">
                <svg class="hig-loader-svg" viewBox="0 0 220 165" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        {{-- Sombra y resplandor de piso bajo el podio 3D --}}
                        <radialGradient id="ldFloorGlow" cx="50%" cy="50%" r="50%">
                            <stop offset="0%" stop-color="#2d3748" stop-opacity="0.34"/>
                            <stop offset="60%" stop-color="#666F88" stop-opacity="0.14"/>
                            <stop offset="100%" stop-color="#cfe2f3" stop-opacity="0"/>
                        </radialGradient>

                        {{-- Gradientes 3D de Banda Transportadora --}}
                        <linearGradient id="ldBeltFront3D" x1="20" y1="115" x2="200" y2="148" gradientUnits="userSpaceOnUse">
                            <stop offset="0%" stop-color="#475569"/>
                            <stop offset="45%" stop-color="#1e293b"/>
                            <stop offset="100%" stop-color="#0f172a"/>
                        </linearGradient>
                        <linearGradient id="ldBeltTrackTop3D" x1="26" y1="106" x2="194" y2="122" gradientUnits="userSpaceOnUse">
                            <stop offset="0%" stop-color="#e2e8f0"/>
                            <stop offset="50%" stop-color="#f8fafc"/>
                            <stop offset="100%" stop-color="#cbd5e1"/>
                        </linearGradient>
                        <linearGradient id="ldRollerRim3D" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#ffffff"/>
                            <stop offset="55%" stop-color="#e2e8f0"/>
                            <stop offset="100%" stop-color="#94a3b8"/>
                        </linearGradient>

                        {{-- Gradientes 3D de Engranajes Metálicos / Cristal --}}
                        <linearGradient id="ldGearMainFace" x1="60" y1="14" x2="120" y2="70" gradientUnits="userSpaceOnUse">
                            <stop offset="0%" stop-color="#ffffff"/>
                            <stop offset="48%" stop-color="#f3e8ed"/>
                            <stop offset="100%" stop-color="#b5bac9"/>
                        </linearGradient>
                        <linearGradient id="ldGearSubFace" x1="112" y1="30" x2="156" y2="74" gradientUnits="userSpaceOnUse">
                            <stop offset="0%" stop-color="#ffffff"/>
                            <stop offset="50%" stop-color="#e0f2fe"/>
                            <stop offset="100%" stop-color="#7dd3fc"/>
                        </linearGradient>

                        {{-- Gradientes 3D para Cajas Isométricas de Lote --}}
                        <linearGradient id="ldBoxTopLit" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#ffffff"/>
                            <stop offset="100%" stop-color="#f3e8ed"/>
                        </linearGradient>
                        <linearGradient id="ldBoxLeftFace" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#ffffff"/>
                            <stop offset="100%" stop-color="#dbeafe"/>
                        </linearGradient>
                        <linearGradient id="ldBoxRightShade" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#cbd5e1"/>
                            <stop offset="100%" stop-color="#94a3b8"/>
                        </linearGradient>
                    </defs>

                    {{-- 1. SOMBRA ELÍPTICA 3D DE PISO --}}
                    <ellipse cx="110" cy="152" rx="88" ry="10" fill="url(#ldFloorGlow)"/>

                    {{-- 2. ENGRANAJES 3D INTERCONECTADOS EN EL FONDO SUPERIOR --}}
                    {{-- Engranaje Secundario 3D (Azul Cielo Cristal - Giro Antihorario) --}}
                    <g class="loader-gear-sub-spin">
                        {{-- Extrusión 3D trasera --}}
                        <circle cx="136" cy="54" r="18" fill="#475569" opacity="0.45"/>
                        <path d="M131 31 H137 L138.5 36 L143 37.5 L147 34 L151 38 L147.5 42 L149 46.5 L154 48 V54 L149 55.5 L147.5 60 L151 64 L147 68 L143 64.5 L138.5 66 L137 71 H131 L129.5 66 L125 64.5 L121 68 L117 64 L120.5 60 L119 55.5 L114 54 V48 L119 46.5 L120.5 42 L117 38 L121 34 L125 37.5 L129.5 36 Z"
                              fill="url(#ldGearSubFace)" stroke="#334155" stroke-width="2" stroke-linejoin="round"/>
                        <circle cx="134" cy="51" r="7.5" fill="#1e293b" stroke="#ffffff" stroke-width="1.8"/>
                    </g>

                    {{-- Engranaje Principal 3D (Lavanda / Acero Cristal - Giro Horario) --}}
                    <g class="loader-gear-main-spin">
                        {{-- Sombra de extrusión 3D --}}
                        <circle cx="93" cy="45" r="24" fill="#1e293b" opacity="0.38"/>
                        <path d="M85 14 H95 L97 21 L103 23.5 L109 18.5 L116 25.5 L111 31.5 L113.5 37.5 L120.5 39.5 V49.5 L113.5 51.5 L111 57.5 L116 63.5 L109 70.5 L103 65.5 L97 68 L95 75 H85 L83 68 L77 65.5 L71 70.5 L64 63.5 L69 57.5 L66.5 51.5 L59.5 49.5 V39.5 L66.5 37.5 L69 31.5 L64 25.5 L71 18.5 L77 23.5 L83 21 Z"
                              fill="url(#ldGearMainFace)" stroke="#1e293b" stroke-width="2.4" stroke-linejoin="round"/>
                        {{-- Bisel interno 3D --}}
                        <circle cx="90" cy="44.5" r="14" fill="none" stroke="#ffffff" stroke-width="1.6" opacity="0.9"/>
                        <circle cx="90" cy="44.5" r="9.5" fill="#2d3748" stroke="#ffffff" stroke-width="2"/>
                    </g>

                    {{-- 3. FLECHAS FLOTANTES 3D DE FLUJO (IZQUIERDA ↑ / DERECHA ↓) --}}
                    {{-- Flecha 3D Izquierda (Subida) --}}
                    <g class="loader-arrow-3d-up">
                        {{-- Extrusión 3D lateral --}}
                        <path d="M39 58 V30 H32 L42 18 L52 30 H45 V58 Z" fill="#475569" transform="translate(2.5, 3)"/>
                        {{-- Cara frontal iluminada --}}
                        <path d="M39 58 V30 H32 L42 18 L52 30 H45 V58 Z" fill="url(#ldGearSubFace)" stroke="#1e293b" stroke-width="2" stroke-linejoin="round"/>
                    </g>

                    {{-- Flecha 3D Derecha (Bajada) --}}
                    <g class="loader-arrow-3d-down">
                        {{-- Extrusión 3D lateral --}}
                        <path d="M175 20 V48 H168 L178 60 L188 48 H181 V20 Z" fill="#475569" transform="translate(2.5, 3)"/>
                        {{-- Cara frontal iluminada --}}
                        <path d="M175 20 V48 H168 L178 60 L188 48 H181 V20 Z" fill="url(#ldBoxTopLit)" stroke="#1e293b" stroke-width="2" stroke-linejoin="round"/>
                    </g>

                    {{-- 4. PISTA SUPERIOR EN PERSPECTIVA 3D DE LA BANDA TRANSPORTADORA --}}
                    <polygon points="34,107 186,107 202,118 18,118" fill="url(#ldBeltTrackTop3D)" stroke="#475569" stroke-width="1.8" stroke-linejoin="round"/>
                    {{-- Líneas de perspectiva sobre la banda --}}
                    <line x1="62" y1="107" x2="54" y2="118" stroke="#94a3b8" stroke-width="1.3" stroke-dasharray="2 2"/>
                    <line x1="110" y1="107" x2="110" y2="118" stroke="#94a3b8" stroke-width="1.3" stroke-dasharray="2 2"/>
                    <line x1="158" y1="107" x2="166" y2="118" stroke="#94a3b8" stroke-width="1.3" stroke-dasharray="2 2"/>

                    {{-- 5. CAJAS ISOMÉTRICAS 3D DE LOTES Y FRASCO DE GEL SOBRE LA BANDA --}}
                    {{-- Caja Isométrica 3D Izquierda (Con tapa superior, cara izquierda iluminada y cara derecha sombreada) --}}
                    <g class="loader-box-3d-1">
                        {{-- Sombra proyectada en la banda --}}
                        <polygon points="40,113 68,118 92,111 64,106" fill="rgba(15, 23, 42, 0.22)"/>
                        {{-- Cara Izquierda Frontal (Iluminada) --}}
                        <polygon points="42,78 68,86 68,114 42,106" fill="url(#ldBoxLeftFace)" stroke="#1e293b" stroke-width="2" stroke-linejoin="round"/>
                        {{-- Cara Derecha Lateral (Sombreada 3D) --}}
                        <polygon points="68,86 92,78 92,106 68,114" fill="url(#ldBoxRightShade)" stroke="#1e293b" stroke-width="2" stroke-linejoin="round"/>
                        {{-- Tapa Superior Isométrica 3D --}}
                        <polygon points="42,78 66,70 92,78 68,86" fill="url(#ldBoxTopLit)" stroke="#1e293b" stroke-width="2" stroke-linejoin="round"/>
                        {{-- Cinta adhesiva 3D en la tapa y frente --}}
                        <polygon points="53,74 79,82 74,84 48,76" fill="#f9a8d4" opacity="0.9"/>
                        <polygon points="65,85 71,85 71,97 68,95 65,97" fill="#f472b6" stroke="#1e293b" stroke-width="1.2" stroke-linejoin="round"/>
                        {{-- Etiqueta de Lote en la cara frontal --}}
                        <rect x="47" y="92" width="14" height="6" rx="1.5" fill="#38bdf8" opacity="0.85" transform="skewY(16)"/>
                    </g>

                    {{-- Haz de Luz / Dosificación Activa 3D en el Centro --}}
                    <g class="loader-dosing-beam-3d">
                        <polygon points="107,62 113,62 118,112 102,112" fill="#38bdf8" opacity="0.32"/>
                        <line x1="110" y1="62" x2="110" y2="111" stroke="#0284c7" stroke-width="2.2" stroke-dasharray="3 3"/>
                    </g>

                    {{-- Frasco / Vial 3D de Gel Farmacéutico en el Centro --}}
                    <g class="loader-vial-3d">
                        <ellipse cx="110" cy="112" rx="10" ry="3.5" fill="rgba(15, 23, 42, 0.22)"/>
                        <rect x="102" y="84" width="16" height="26" rx="4" fill="#ffffff" stroke="#1e293b" stroke-width="1.9"/>
                        {{-- Gel azul cielo interno --}}
                        <rect x="104.5" y="92" width="11" height="15.5" rx="2.5" fill="#38bdf8" opacity="0.88"/>
                        {{-- Tapa metálica 3D --}}
                        <rect x="105" y="78" width="10" height="6" rx="1.8" fill="#cbd5e1" stroke="#1e293b" stroke-width="1.7"/>
                        {{-- Brillo cilíndrico --}}
                        <line x1="105.5" y1="87" x2="105.5" y2="106" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round"/>
                    </g>

                    {{-- Caja Isométrica 3D Derecha (Lote Verificado GMP) --}}
                    <g class="loader-box-3d-2">
                        {{-- Sombra proyectada en la banda --}}
                        <polygon points="126,113 154,118 178,111 150,106" fill="rgba(15, 23, 42, 0.22)"/>
                        {{-- Cara Izquierda Frontal (Iluminada) --}}
                        <polygon points="128,78 154,86 154,114 128,106" fill="url(#ldBoxLeftFace)" stroke="#1e293b" stroke-width="2" stroke-linejoin="round"/>
                        {{-- Cara Derecha Lateral (Sombreada 3D) --}}
                        <polygon points="154,86 178,78 178,106 154,114" fill="url(#ldBoxRightShade)" stroke="#1e293b" stroke-width="2" stroke-linejoin="round"/>
                        {{-- Tapa Superior Isométrica 3D --}}
                        <polygon points="128,78 152,70 178,78 154,86" fill="url(#ldBoxTopLit)" stroke="#1e293b" stroke-width="2" stroke-linejoin="round"/>
                        {{-- Cinta adhesiva 3D --}}
                        <polygon points="139,74 165,82 160,84 134,76" fill="#86efac" opacity="0.95"/>
                        <polygon points="151,85 157,85 157,97 154,95 151,97" fill="#34d399" stroke="#1e293b" stroke-width="1.2" stroke-linejoin="round"/>
                        {{-- Sello verde de liberación en cara frontal --}}
                        <rect x="133" y="92" width="14" height="6" rx="1.5" fill="#34d399" opacity="0.9" transform="skewY(16)"/>
                    </g>

                    {{-- 6. CUERPO FRONTAL EXTRUIDO 3D DE LA BANDA TRANSPORTADORA + 5 RODILLOS 3D GIRATORIOS --}}
                    {{-- Sombra inferior de extrusión 3D de la cápsula --}}
                    <rect x="19" y="119" width="186" height="32" rx="16" fill="#0f172a" opacity="0.35"/>
                    {{-- Cápsula frontal metálica 3D --}}
                    <rect x="16" y="116" width="188" height="32" rx="16" fill="url(#ldBeltFront3D)" stroke="#1e293b" stroke-width="2.4"/>
                    {{-- Bisel especular superior de la banda --}}
                    <line x1="30" y1="118.5" x2="190" y2="118.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" opacity="0.75"/>
                    {{-- Riel interior hundido 3D --}}
                    <rect x="26" y="121" width="168" height="22" rx="11" fill="rgba(15, 23, 42, 0.55)" stroke="rgba(255,255,255,0.22)" stroke-width="1"/>

                    {{-- 5 Rodillos 3D con Aspas Giratorias --}}
                    @foreach([48 => 1, 79 => 2, 110 => 3, 141 => 4, 172 => 5] as $rx => $rIdx)
                        <g>
                            {{-- Sombra 3D del rodillo --}}
                            <circle cx="{{ $rx + 1.5 }}" cy="133.5" r="9.5" fill="#0f172a" opacity="0.55"/>
                            {{-- Rueda 3D con gradiente metálico --}}
                            <circle cx="{{ $rx }}" cy="132" r="9.5" fill="url(#ldRollerRim3D)" stroke="#1e293b" stroke-width="2"/>
                            {{-- Aspas internas giratorias --}}
                            <g class="loader-roller-spin-{{ $rIdx }}" stroke="#475569" stroke-width="1.6" stroke-linecap="round">
                                <line x1="{{ $rx - 5 }}" y1="132" x2="{{ $rx + 5 }}" y2="132"/>
                                <line x1="{{ $rx }}" y1="127" x2="{{ $rx }}" y2="137"/>
                            </g>
                            {{-- Eje central brillante --}}
                            <circle cx="{{ $rx }}" cy="132" r="2.8" fill="#38bdf8" stroke="#1e293b" stroke-width="1.2"/>
                        </g>
                    @endforeach
                </svg>
            </div>

            <div id="higLoaderTitle" class="hig-loader-title">Iniciando fabricación...</div>
            <div class="hig-loader-sub">Grimann • Sanfer · Sistema EBR</div>
            <div class="hig-loader-bar-track">
                <div class="hig-loader-bar-fill"></div>
            </div>
        </div>
    </div>

    <div class="app-shell">
        <div class="sidebar-backdrop d-lg-none d-print-none" onclick="document.body.classList.remove('sidebar-open')"></div>

        {{-- SIDEBAR FLOTANTE LIQUID GLASS (MODO EXPANDIDO + MODO SLIM PILL) --}}
        <aside class="app-sidebar d-print-none">
            {{-- Encabezado de Marca (Logo Grimann grande en modo expandido / Insignia blanca en modo Slim) --}}
            <div class="sidebar-brand">
                <a href="{{ route('dashboard', ['section' => 'inicio']) }}" class="text-decoration-none d-inline-flex align-items-center justify-content-center w-100">
                    <img id="sidebarGrimannLogo"
                         src="{{ asset('images/grimann logo.png') }}"
                         alt="Grimann"
                         class="sidebar-logo-white">
                    <span class="sidebar-slim-brand-badge" title="Grimann • Sanfer EBR">
                        <i class="bi bi-layers-fill"></i>
                    </span>
                </a>
            </div>

            <div class="sidebar-glass-line"></div>
            <div class="sidebar-section-label">MENU</div>

            <nav class="sidebar-nav">
                <a href="{{ route('dashboard', ['section' => 'inicio']) }}"
                   class="sidebar-link {{ $currentSection === 'inicio' ? 'active' : '' }}"
                   data-section-link="inicio"
                   title="Inicio">
                    <svg class="hig-sf-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 10.5L12 3l9 7.5"></path>
                        <path d="M5.5 9.5V20a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V9.5"></path>
                        <path d="M9.5 21v-6a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v6"></path>
                    </svg>
                    <span class="sidebar-link-text">Inicio</span>
                    <i class="bi bi-chevron-right sidebar-link-chevron"></i>
                </a>

                <a href="{{ route('dashboard', ['section' => 'dashboard']) }}"
                   class="sidebar-link {{ $currentSection === 'dashboard' ? 'active' : '' }}"
                   data-section-link="dashboard"
                   title="Dashboard de Estatus de OPs">
                    <svg class="hig-sf-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7.5" height="7.5" rx="2"></rect>
                        <rect x="13.5" y="3" width="7.5" height="7.5" rx="2"></rect>
                        <rect x="3" y="13.5" width="7.5" height="7.5" rx="2"></rect>
                        <rect x="13.5" y="13.5" width="7.5" height="7.5" rx="2"></rect>
                    </svg>
                    <span class="sidebar-link-text">Dashboard</span>
                    <i class="bi bi-chevron-right sidebar-link-chevron"></i>
                </a>

                <a href="{{ route('dashboard', ['section' => 'ordenes']) }}"
                   class="sidebar-link {{ $currentSection === 'ordenes' ? 'active' : '' }}"
                   data-section-link="ordenes"
                   title="Órdenes de Producción">
                    <svg class="hig-sf-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="5" y="2.5" width="14" height="19" rx="3"></rect>
                        <line x1="10" y1="18" x2="14" y2="18"></line>
                        <path d="M9 7.5h6M9 11h4"></path>
                    </svg>
                    <span class="sidebar-link-text">Órdenes de Prod.</span>
                    <i class="bi bi-chevron-right sidebar-link-chevron"></i>
                </a>

                <a href="{{ route('dashboard', ['section' => 'historial']) }}"
                   class="sidebar-link {{ in_array($currentSection, ['historial', 'en_proceso', 'captura']) ? 'active' : '' }}"
                   data-section-link="historial"
                   title="Fabricación">
                    <svg class="hig-sf-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="8.5"></circle>
                        <polyline points="12 7.5 12 12 15.2 14"></polyline>
                    </svg>
                    <span class="sidebar-link-text">Fabricación</span>
                    <span class="sidebar-notif-dot" title="Lotes en fabricación"></span>
                    <i class="bi bi-chevron-right sidebar-link-chevron"></i>
                </a>

                <a href="{{ route('dashboard', ['section' => 'bd']) }}"
                   class="sidebar-link {{ $currentSection === 'bd' ? 'active' : '' }}"
                   data-section-link="bd"
                   title="Base de Datos">
                    <svg class="hig-sf-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <ellipse cx="12" cy="5.5" rx="7.5" ry="2.8"></ellipse>
                        <path d="M4.5 5.5v6c0 1.55 3.36 2.8 7.5 2.8s7.5-1.25 7.5-2.8v-6"></path>
                        <path d="M4.5 11.5v6c0 1.55 3.36 2.8 7.5 2.8s7.5-1.25 7.5-2.8v-6"></path>
                    </svg>
                    <span class="sidebar-link-text">Base de Datos</span>
                    <i class="bi bi-chevron-right sidebar-link-chevron"></i>
                </a>

                <div class="sidebar-glass-line my-2"></div>

                <a href="{{ route('dashboard', ['section' => 'roles']) }}"
                   class="sidebar-link {{ in_array($currentSection, ['roles', 'configuracion']) ? 'active' : '' }}"
                   data-section-link="roles"
                   title="Roles">
                    <svg class="hig-sf-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>
                    <span class="sidebar-link-text">Roles</span>
                    <i class="bi bi-chevron-right sidebar-link-chevron"></i>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="sidebar-link border-0" title="Cerrar Sesión">
                        <svg class="hig-sf-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 20H5.5A2.5 2.5 0 0 1 3 17.5v-11A2.5 2.5 0 0 1 5.5 4H9"></path>
                            <polyline points="16 16.5 20.5 12 16 7.5"></polyline>
                            <line x1="20.5" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span class="sidebar-link-text">Cerrar Sesión</span>
                    </button>
                </form>
            </nav>
        </aside>

        {{-- CONTENIDO PRINCIPAL --}}
        <div class="app-main">
            {{-- ENCABEZADO SUPERIOR (HEADER CON BREADCRUMB SUTIL Y CHIP DE USUARIO) --}}
            <header class="app-topbar d-print-none">
                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="btn-menu-toggle" onclick="toggleSidebar()" title="Mostrar / ocultar barra lateral">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="16" rx="3"></rect>
                            <line x1="9" y1="4" x2="9" y2="20"></line>
                        </svg>
                    </button>
                    <div class="topbar-breadcrumb">
                        <span>Planta Farmacéutica</span>
                        <span style="opacity: 0.45;">•</span>
                        <strong>Batch Record Electrónico</strong>
                    </div>
                </div>

                <div class="dropdown">
                    <a href="#" class="user-profile-pill" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar-circle">
                            {{ $userInitial }}
                            <span class="user-status-dot"></span>
                        </div>
                        <div class="text-start me-1 d-none d-sm-block">
                            <div class="fw-semibold text-dark lh-sm" style="font-size: 0.83rem; letter-spacing: -0.015em;">{{ $userName }}</div>
                            <span class="user-role-badge" id="topbarUserRoleBadge">{{ $userRole }}</span>
                        </div>
                        <i class="bi bi-chevron-down text-muted small"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 mt-2 p-1"
                        style="background: rgba(255, 255, 255, 0.78); backdrop-filter: blur(25px) saturate(180%); -webkit-backdrop-filter: blur(25px) saturate(180%); border: 1px solid rgba(255, 255, 255, 0.4) !important; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06); border-radius: 20px;">
                        <li class="px-3 py-2 border-bottom" style="border-color: rgba(181,186,201,0.3) !important;">
                            <div class="fw-bold small">{{ $userName }}</div>
                            <div class="text-muted" id="topbarDropdownUserRole" style="font-size: 0.75rem;">{{ $userRole }}</div>
                        </li>
                        <li>
                            <a class="dropdown-item rounded-3 small py-2" href="{{ route('dashboard', ['section' => 'inicio']) }}">
                                <i class="bi bi-house-door me-2 text-secondary"></i>Ir a Inicio
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item rounded-3 small py-2 text-danger fw-semibold">
                                    <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </header>

            {{-- CONTENIDO DE LA VISTA --}}
            <main class="app-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-print-none mb-3"
                         style="background: rgba(220, 252, 231, 0.75); backdrop-filter: blur(20px) saturate(180%); border: 1px solid rgba(255,255,255,0.4); border-radius: 20px; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.08);" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show d-print-none mb-3"
                         style="background: rgba(254, 226, 226, 0.75); backdrop-filter: blur(20px) saturate(180%); border: 1px solid rgba(255,255,255,0.4); border-radius: 20px; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.08);" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Por favor verifica los siguientes datos:</strong>
                        <ul class="mb-0 mt-1">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let loaderTimeoutId = null;

        function showProductionLoader(customTitle = 'Procesando Lote de Fabricación') {
            const loader = document.getElementById('higPageLoader');
            const titleEl = document.getElementById('higLoaderTitle');
            if (!loader) return;
            if (titleEl && customTitle) titleEl.textContent = customTitle;
            if (loaderTimeoutId) clearTimeout(loaderTimeoutId);
            loader.classList.remove('is-hidden');
        }

        function hideProductionLoader() {
            const loader = document.getElementById('higPageLoader');
            if (!loader) return;
            loader.classList.add('is-hidden');
        }

        function flashProductionLoader(customTitle = 'Cargando módulo...', durationMs = 420) {
            showProductionLoader(customTitle);
            loaderTimeoutId = setTimeout(() => {
                hideProductionLoader();
            }, durationMs);
        }

        function toggleSidebar() {
            if (window.innerWidth < 992) {
                document.body.classList.toggle('sidebar-open');
            } else {
                document.body.classList.toggle('sidebar-collapsed');
            }
        }

        let liquidScrollObserver = null;

        function refreshLiquidScrollAnimations(scope = document) {
            const selectors = [
                '.ep-portrait-card',
                '.bento-card',
                '.recent-row-item',
                '.ebr-page',
                '.section-card',
                '.tc-table-card',
                '.min-hero-banner'
            ];

            if (!liquidScrollObserver && 'IntersectionObserver' in window) {
                liquidScrollObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-scroll-visible');
                        } else if (entry.boundingClientRect.top > window.innerHeight * 0.92) {
                            // Si el elemento queda abajo al subir el scroll, se vuelve a animar al bajar el scroll
                            entry.target.classList.remove('is-scroll-visible');
                        }
                    });
                }, {
                    threshold: 0.08,
                    rootMargin: '0px 0px -30px 0px'
                });
            }

            const elements = scope.querySelectorAll(selectors.join(','));
            elements.forEach((el, idx) => {
                // Calcular retraso escalonado para tarjetas en una misma fila
                const staggerIndex = el.classList.contains('ep-portrait-card') || el.classList.contains('bento-card')
                    ? (idx % 4)
                    : (idx % 3);
                el.style.setProperty('--scroll-delay', `${staggerIndex * 65}ms`);
                el.classList.add('liquid-scroll-item');

                if (liquidScrollObserver) {
                    liquidScrollObserver.unobserve(el);
                    el.classList.remove('is-scroll-visible');
                    requestAnimationFrame(() => {
                        liquidScrollObserver.observe(el);
                    });
                } else {
                    el.classList.add('is-scroll-visible');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            refreshLiquidScrollAnimations();

            // Cerrar barra lateral automáticamente en pantallas chicas al seleccionar una sección
            document.querySelectorAll('.sidebar-link').forEach(sLink => {
                sLink.addEventListener('click', () => {
                    if (window.innerWidth < 992) {
                        document.body.classList.remove('sidebar-open');
                    }
                });
            });

            // Hacer todas las tablas del formato EBR responsivas automáticamente en monitores chicos y tablets
            document.querySelectorAll('.ebr-page table.table').forEach(tbl => {
                if (!tbl.parentElement.classList.contains('table-responsive')) {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'table-responsive';
                    if (tbl.style.overflow === 'visible') {
                        wrapper.style.overflowY = 'visible';
                    }
                    tbl.parentNode.insertBefore(wrapper, tbl);
                    wrapper.appendChild(tbl);
                }
            });

            // Muestra la pantalla de carga únicamente al abrir el formato de 14 páginas o al guardar formularios
            document.querySelectorAll('a[href]').forEach(link => {
                link.addEventListener('click', (e) => {
                    const href = link.getAttribute('href') || '';
                    if (
                        !e.defaultPrevented &&
                        href &&
                        href.includes('/batches/') &&
                        link.target !== '_blank' &&
                        !link.hasAttribute('data-bs-toggle') &&
                        !link.hasAttribute('data-section-link')
                    ) {
                        showProductionLoader('Iniciando fabricación...');
                    }
                });
            });

            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', (e) => {
                    if (!e.defaultPrevented) {
                        const msg = form.id === 'tcApproveForm'
                            ? 'Iniciando fabricación...'
                            : 'Guardando datos en SQL Server...';
                        showProductionLoader(msg);
                    }
                });
            });

            document.querySelectorAll('.modal').forEach(modalEl => {
                if (modalEl.parentElement !== document.body) {
                    document.body.appendChild(modalEl);
                }
            });

            const logoImg = document.getElementById('sidebarGrimannLogo');
            if (!logoImg) return;

            const processLogo = () => {
                try {
                    const c = document.createElement('canvas');
                    const w = logoImg.naturalWidth;
                    const h = logoImg.naturalHeight;
                    if (!w || !h) return;
                    c.width = w;
                    c.height = h;
                    const ctx = c.getContext('2d');
                    ctx.drawImage(logoImg, 0, 0);
                    const imgData = ctx.getImageData(0, 0, w, h);
                    const d = imgData.data;

                    if (d[3] > 200 && d[0] > 235 && d[1] > 235 && d[2] > 235) {
                        for (let i = 0; i < d.length; i += 4) {
                            const r = d[i], g = d[i + 1], b = d[i + 2];
                            const minChannel = Math.min(r, g, b);
                            if (minChannel > 238) {
                                d[i + 3] = 0;
                            } else {
                                const alpha = Math.min(255, Math.round((245 - minChannel) * 1.4));
                                d[i] = 255;
                                d[i + 1] = 255;
                                d[i + 2] = 255;
                                d[i + 3] = alpha;
                            }
                        }
                        ctx.putImageData(imgData, 0, 0);
                        logoImg.style.filter = 'none';
                        logoImg.src = c.toDataURL('image/png');
                    }
                } catch (e) {
                    console.warn(e);
                }
            };

            if (logoImg.complete && logoImg.naturalWidth) {
                processLogo();
            } else {
                logoImg.addEventListener('load', processLogo, { once: true });
            }
        });

        window.addEventListener('pageshow', () => {
            hideProductionLoader();
        });
    </script>
    @stack('modals')
    @stack('scripts')
</body>
</html>
