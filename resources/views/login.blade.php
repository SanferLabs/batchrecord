<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Sistema</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .bg-pattern {
            background-color: #e6e9f2;
            background-image:
                radial-gradient(at 12% 15%, rgba(102, 111, 136, 0.24) 0px, transparent 50%),
                radial-gradient(at 88% 18%, rgba(243, 232, 237, 0.65) 0px, transparent 52%),
                url('{{ asset("images/fondo.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Animated Production Loader on Login */
        .login-loader-overlay {
            position: fixed;
            inset: 0;
            z-index: 2000;
            background: rgba(230, 233, 242, 0.55);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.4s cubic-bezier(0.22, 1, 0.36, 1), visibility 0.4s ease;
        }
        .login-loader-overlay.is-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        .login-loader-card {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            padding: 1.85rem 2.35rem 1.6rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .loader-gear {
            transform-origin: 100px 54px;
            animation: loaderGearSpin 3.4s linear infinite;
        }
        .loader-arrow-up {
            animation: loaderArrowUp 1.35s cubic-bezier(0.65, 0, 0.35, 1) infinite alternate;
        }
        .loader-arrow-down {
            animation: loaderArrowDown 1.35s cubic-bezier(0.65, 0, 0.35, 1) infinite alternate;
        }
        .loader-box-left {
            animation: loaderBoxBounce 1.1s cubic-bezier(0.65, 0, 0.35, 1) infinite alternate;
        }
        .loader-box-right {
            animation: loaderBoxBounce 1.1s cubic-bezier(0.65, 0, 0.35, 1) 0.35s infinite alternate;
        }
        .loader-roller-1 { transform-origin: 49px 163px; animation: loaderRollerPulse 0.9s ease-in-out 0s infinite alternate; }
        .loader-roller-2 { transform-origin: 83px 163px; animation: loaderRollerPulse 0.9s ease-in-out 0.15s infinite alternate; }
        .loader-roller-3 { transform-origin: 117px 163px; animation: loaderRollerPulse 0.9s ease-in-out 0.3s infinite alternate; }
        .loader-roller-4 { transform-origin: 151px 163px; animation: loaderRollerPulse 0.9s ease-in-out 0.45s infinite alternate; }

        @keyframes loaderGearSpin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        @keyframes loaderArrowUp { 0% { transform: translateY(5px); opacity: 0.72; } 100% { transform: translateY(-6px); opacity: 1; } }
        @keyframes loaderArrowDown { 0% { transform: translateY(-6px); opacity: 0.72; } 100% { transform: translateY(5px); opacity: 1; } }
        @keyframes loaderBoxBounce { 0% { transform: translateY(0px); } 100% { transform: translateY(-3.5px); } }
        @keyframes loaderRollerPulse { 0% { transform: scale(0.92); } 100% { transform: scale(1.04); } }
    </style>
</head>

<body class="bg-pattern min-h-screen flex items-center justify-center font-sans antialiased text-gray-900">

    {{-- Pantalla de Carga Animada --}}
    <div id="loginLoader" class="login-loader-overlay">
        <div class="login-loader-card">
            <svg width="112" height="112" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g class="loader-arrow-up" stroke="#2d3748" stroke-width="6.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="48" y1="77" x2="48" y2="30" />
                    <polyline points="36,42 48,29 60,42" />
                </g>
                <g class="loader-gear" stroke="#2d3748" stroke-width="6" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M 94 21 L 106 21 L 108 29 A 26 26 0 0 1 114 31.5 L 121 26.5 L 129.5 35 L 124.5 42 A 26 26 0 0 1 127 48 L 135 50 L 135 60 L 127 62 A 26 26 0 0 1 124.5 68 L 129.5 75 L 121 83.5 L 114 78.5 A 26 26 0 0 1 108 81 L 106 89 L 94 89 L 92 81 A 26 26 0 0 1 86 78.5 L 79 83.5 L 70.5 75 L 75.5 68 A 26 26 0 0 1 73 62 L 65 60 L 65 50 L 73 48 A 26 26 0 0 1 75.5 42 L 70.5 35 L 79 26.5 L 86 31.5 A 26 26 0 0 1 92 29 Z" fill="rgba(243, 232, 237, 0.75)" />
                    <circle cx="100" cy="55" r="13.5" fill="rgba(255, 255, 255, 0.85)" />
                </g>
                <g class="loader-arrow-down" stroke="#2d3748" stroke-width="6.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="152" y1="30" x2="152" y2="77" />
                    <polyline points="140,65 152,78 164,65" />
                </g>
                <g class="loader-box-left" stroke="#2d3748" stroke-width="6" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="35" y="92" width="58" height="46" rx="3" fill="rgba(255, 255, 255, 0.82)" />
                    <polygon points="56,92 56,112 64,106 72,112 72,92" fill="rgba(243, 232, 237, 0.9)" />
                    <line x1="35" y1="126" x2="93" y2="126" />
                </g>
                <g class="loader-box-right" stroke="#2d3748" stroke-width="6" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="107" y="92" width="58" height="46" rx="3" fill="rgba(255, 255, 255, 0.82)" />
                    <polygon points="128,92 128,112 136,106 144,112 144,92" fill="rgba(243, 232, 237, 0.9)" />
                    <line x1="107" y1="126" x2="165" y2="126" />
                </g>
                <g stroke="#2d3748" stroke-width="6.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="14" y="138" width="172" height="50" rx="25" fill="rgba(243, 232, 237, 0.75)" />
                    <circle class="loader-roller-1" cx="49" cy="163" r="11.5" fill="rgba(255, 255, 255, 0.9)" />
                    <circle class="loader-roller-2" cx="83" cy="163" r="11.5" fill="rgba(255, 255, 255, 0.9)" />
                    <circle class="loader-roller-3" cx="117" cy="163" r="11.5" fill="rgba(255, 255, 255, 0.9)" />
                    <circle class="loader-roller-4" cx="151" cy="163" r="11.5" fill="rgba(255, 255, 255, 0.9)" />
                </g>
            </svg>
            <div style="font-size: 0.92rem; font-weight: 700; color: #2d3748; margin-top: 0.8rem;">Conectando con Plataforma EBR</div>
            <div style="font-size: 0.75rem; color: #666F88;">Grimann • Sanfer</div>
        </div>
    </div>

    <div
        style="background: rgba(255, 255, 255, 0.65); backdrop-filter: blur(20px) saturate(180%); -webkit-backdrop-filter: blur(20px) saturate(180%); border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.08); border-radius: 20px;"
        class="w-full max-w-md mx-4 p-8 sm:p-10 flex flex-col items-center relative overflow-hidden">

        <div class="z-10 w-full flex flex-col items-center">

            <!-- Logo -->
            <div class="mb-4 transform transition-all hover:scale-105 duration-300">
                <img src="{{ asset('images/SANFER_logo_rojo.png') }}" alt="Logo Sanfer"
                    class="h-16 w-auto object-contain">
            </div>

            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight mb-2 text-center text-balance mt-4">
                Inicia sesión con tu cuenta corporativa
            </h1>
            <p class="text-gray-600 text-center mb-8 font-medium">
                Ingresa a tu cuenta para continuar
            </p>

            @if(session('error'))
                <div style="width: 100%; margin-bottom: 1.25rem; padding: 0.85rem 1rem; border-radius: 14px; background: rgba(254, 226, 226, 0.88); border: 1px solid rgba(220, 38, 38, 0.35); color: #991b1b; font-size: 0.82rem; font-weight: 600; text-align: center; line-height: 1.35;">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Botón de Login Azure -->
            <a href="{{ url('/auth/azure') }}"
                onclick="document.getElementById('loginLoader').classList.remove('is-hidden');"
                class="group relative w-full flex justify-center items-center py-3.5 px-4 border border-white/30 text-sm sm:text-base font-semibold rounded-[14px] text-white bg-[#2d3748]/85 hover:bg-[#2d3748] transition-all duration-200 ease-in-out shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                <span class="absolute left-0 inset-y-0 flex items-center pl-4">
                    <!-- Icono Microsoft -->
                    <svg class="h-5 w-5 text-gray-300 group-hover:text-white transition-colors duration-200"
                        viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0H11V11H0V0Z" fill="currentColor" />
                        <path d="M12 0H23V11H12V0Z" fill="currentColor" />
                        <path d="M0 12H11V23H0V12Z" fill="currentColor" />
                        <path d="M12 12H23V23H12V12Z" fill="currentColor" />
                    </svg>
                </span>
                Iniciar sesión con Azure
            </a>

            <!-- Pie de la tarjeta -->
            <div class="mt-10 pt-6 border-t border-white/40 w-full text-center">
                <p class="text-xs text-gray-600 font-medium tracking-wide">
                    &copy; {{ date('Y') }} Todos los derechos reservados.
                </p>
            </div>

        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                document.getElementById('loginLoader')?.classList.add('is-hidden');
            }, 520);
        });
    </script>
</body>

</html>