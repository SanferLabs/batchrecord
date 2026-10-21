<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Impresión 14 Páginas · Lote {{ $batch->lote }} (332FB487)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        @page {
            size: letter portrait;
            margin: 5mm 6mm;
        }

        body {
            background-color: {{ !empty($isPdfMode) ? '#ffffff' : '#e2e8f0' }};
            color: #111827;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10.5px;
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .print-container {
            max-width: {{ !empty($isPdfMode) ? '100%' : '215mm' }};
            margin: {{ !empty($isPdfMode) ? '0' : '1.25rem auto' }};
        }

        .ebr-page {
            background: #ffffff;
            border: {{ !empty($isPdfMode) ? 'none' : '1px solid #94a3b8' }} !important;
            margin-bottom: {{ !empty($isPdfMode) ? '0' : '1.25rem' }} !important;
            box-shadow: {{ !empty($isPdfMode) ? 'none' : '0 4px 12px rgba(0, 0, 0, 0.08)' }} !important;
            page-break-inside: avoid !important;
            break-inside: avoid !important;
            page-break-after: always !important;
            break-after: page !important;
            overflow: hidden !important;
            box-sizing: border-box;
        }

        .ebr-page:last-child {
            page-break-after: auto !important;
            break-after: auto !important;
            margin-bottom: 0 !important;
        }

        .ebr-page > .card-body {
            padding: {{ !empty($isPdfMode) ? '0.15rem 0.25rem' : '0.85rem 1rem' }} !important;
        }

        /* Compactación de encabezados, tablas, celdas y firmas para que cada hoja quepa en 1 página Carta */
        .ebr-doc-header {
            margin-bottom: 0.3rem !important;
        }
        .ebr-doc-header img {
            height: 28px !important;
        }
        .ebr-doc-header h4 {
            font-size: 0.98rem !important;
        }

        .ebr-page .table {
            margin-bottom: 0.3rem !important;
        }

        .ebr-header-table th,
        .ebr-header-table td,
        .ebr-table th,
        .ebr-table td {
            border-color: #000000 !important;
            padding: 0.14rem 0.28rem !important;
            line-height: 1.16 !important;
            font-size: 0.69rem !important;
        }

        .ebr-th-gray {
            background-color: #d9d9d9 !important;
            color: #000000;
            font-size: 0.68rem !important;
            text-transform: uppercase;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .ebr-cell-blue {
            background-color: #cfe2f3 !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .ebr-cell-pink {
            background-color: #f4cccc !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .ebr-page .mb-2,
        .ebr-page .mb-3,
        .ebr-page .mb-4 {
            margin-bottom: 0.28rem !important;
        }

        .ebr-page .py-2,
        .ebr-page .py-3 {
            padding-top: 0.16rem !important;
            padding-bottom: 0.16rem !important;
        }

        .ebr-page .fs-6 {
            font-size: 0.78rem !important;
        }

        .ebr-sig-widget {
            padding: 0.12rem 0.2rem !important;
        }
        .ebr-sig-widget > div {
            min-height: 24px !important;
        }
        .ebr-sig-widget span {
            font-size: 0.66rem !important;
            line-height: 1.1 !important;
        }

        /* Apariencia limpia de solo lectura para inputs en el PDF */
        .ebr-page input.form-control,
        .ebr-page select.form-select,
        .ebr-page textarea.form-control {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            padding: 0.04rem 0.12rem !important;
            min-height: 16px !important;
            height: auto !important;
            font-size: 0.68rem !important;
            line-height: 1.12 !important;
            font-weight: 600;
            color: #000000;
            pointer-events: none;
            appearance: none;
            -webkit-appearance: none;
        }
        .ebr-page input::placeholder,
        .ebr-page textarea::placeholder {
            color: transparent !important;
        }

        @media print {
            @page {
                size: letter portrait;
                margin: 5mm 6mm;
            }
            body {
                background: #ffffff !important;
            }
            .print-container {
                max-width: 100%;
                margin: 0;
            }
            .ebr-page {
                border: none !important;
                box-shadow: none !important;
                margin-bottom: 0 !important;
            }
            .ebr-page > .card-body {
                padding: 0.1rem 0.2rem !important;
            }
        }
    </style>
</head>
<body>
    @if(empty($isPdfMode))
        {{-- Barra flotante (oculta al imprimir o al generar PDF directo) --}}
        <div class="bg-dark text-white py-2 px-4 sticky-top d-print-none shadow">
            <div class="container-xxl d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('batches.edit', ['batch' => $batch->id, 'step' => $batch->current_step]) }}" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-arrow-left me-1"></i>Volver al Asistente Paso a Paso
                    </a>
                    <div>
                        <strong>Réplica Oficial 14 Páginas (FGEN.018-1 V00)</strong> · Lote: <span class="text-warning fw-bold">{{ $batch->lote }}</span> · OP: <span class="text-info fw-bold">{{ $batch->orden_produccion }}</span>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-danger" onclick="window.print()">
                        <i class="bi bi-printer-fill me-1"></i>Imprimir / Guardar como PDF (14 Hojas)
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="print-container">
        @for($s = 1; $s <= 7; $s++)
            @include("batches.steps.step{$s}", ['batch' => $batch])
        @endfor
    </div>

    <script>
        (function fitAllPagesToSingleSheet() {
            // Altura máxima segura de una hoja Carta con márgenes de 5mm (~965px a 96dpi)
            const MAX_SHEET_HEIGHT_PX = 955;
            const pages = document.querySelectorAll('.ebr-page');
            pages.forEach((page, idx) => {
                // Ocultar botones o elementos interactivos no imprimibles en el PDF
                page.querySelectorAll('.d-print-none').forEach(el => {
                    el.style.display = 'none';
                });
                const h = page.scrollHeight;
                if (h > MAX_SHEET_HEIGHT_PX) {
                    const scale = Math.max(0.62, (MAX_SHEET_HEIGHT_PX / h) - 0.01);
                    page.style.zoom = scale.toFixed(3);
                }
                if (idx === pages.length - 1) {
                    page.style.pageBreakAfter = 'auto';
                    page.style.breakAfter = 'auto';
                }
            });
        })();

        @if(empty($isPdfMode))
            window.addEventListener('load', () => {
                setTimeout(() => {
                    window.print();
                }, 350);
            });
        @endif
    </script>
</body>
</html>
