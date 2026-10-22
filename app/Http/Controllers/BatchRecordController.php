<?php

namespace App\Http\Controllers;

use App\Models\BatchRecord;
use App\Models\BatchUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BatchRecordController extends Controller
{
    /**
     * Legacy seed method disabled so only real OPs from dbo.FSO are used.
     * Also removes the 10 legacy demo records if present on any environment.
     */
    protected function ensureSeedOrdersExist(): void
    {
        try {
            BatchRecord::whereIn('orden_produccion', [
                'OP-1', 'OP-71600', 'OP-71650', 'OP-71800', 'OP-72100',
                'OP-72250', 'OP-72310', 'OP-72480', 'OP-72590', 'OP-72650',
            ])->whereIn('lote', [
                'G082301', 'B26008', 'L-71650', 'S26114', 'V26302',
                'E26045', 'D26180', 'P26092', 'N26410', 'L26501',
            ])->delete();
        } catch (\Throwable $e) {
            // Ignore cleanup errors
        }
    }

    /**
     * Ensure initial Role Users exist in the SQL Server batch_users table.
     */
    protected function ensureSeedUsersExist(): void
    {
        if (BatchUser::count() === 0) {
            BatchUser::create([
                'name'         => 'chatboteams',
                'email'        => 'chatboteams@sanfer.com.mx',
                'role'         => 'Administrador',
                'is_protected' => true,
            ]);

            BatchUser::create([
                'name'         => 'Brenda Campos Valadez',
                'email'        => 'brenda.campos@sanfer.com.mx',
                'role'         => 'Administrador',
                'is_protected' => false,
            ]);
        }
    }

    /**
     * Check if the currently authenticated user is registered as an Administrator.
     */
    protected function isCurrentUserAdmin(): bool
    {
        $emailLower = strtolower(trim((string) (Auth::user()->email ?? '')));
        if ($emailLower === '') {
            return false;
        }

        $record = BatchUser::whereRaw('LOWER(email) = ?', [$emailLower])->first();
        return $record && $record->role === 'Administrador';
    }

    /**
     * Load Production Orders from dbo.FSO (cached locally for instant pagination/search)
     * and merge any active status/lot overrides from dbo.batch_records without altering dbo.FSO.
     */
    protected function getFsoCatalog($batches = null): array
    {
        if ($batches === null) {
            $batches = BatchRecord::orderBy('id')->get();
        }

        $cachePath = storage_path('app/fso_orders_cache.json');
        $seedFallbackPath = database_path('fso_orders_seed.json');
        $fsoRows = null;

        if (is_file($cachePath) && (time() - filemtime($cachePath)) < 3600) {
            $decoded = json_decode((string) file_get_contents($cachePath), true);
            if (is_array($decoded) && count($decoded) > 0) {
                $fsoRows = $decoded;
            }
        }

        if ($fsoRows === null) {
            try {
                $rawRows = DB::select("
                    SELECT
                        NumeroOrden,
                        RTRIM(ISNULL(Estatus, '')) AS Estatus,
                        RTRIM(ISNULL(CodigoArticulo, '')) AS CodigoArticulo,
                        RTRIM(ISNULL(Descripcion, '')) AS Descripcion,
                        RTRIM(ISNULL(Lote, '')) AS Lote,
                        CantidadOrden,
                        RTRIM(ISNULL(Instalacion, 'G1')) AS Instalacion
                    FROM dbo.FSO
                    ORDER BY NumeroOrden ASC
                ");

                if (count($rawRows) > 0) {
                    $fsoRows = array_map(fn($r) => [
                        'NumeroOrden'    => (string) $r->NumeroOrden,
                        'Estatus'        => (string) $r->Estatus,
                        'CodigoArticulo' => (string) $r->CodigoArticulo,
                        'Descripcion'    => (string) $r->Descripcion,
                        'Lote'           => (string) $r->Lote,
                        'CantidadOrden'  => $r->CantidadOrden !== null ? (float) $r->CantidadOrden : 0.0,
                        'Instalacion'    => (string) ($r->Instalacion ?: 'G1'),
                    ], $rawRows);

                    @file_put_contents($cachePath, json_encode($fsoRows, JSON_UNESCAPED_UNICODE));
                }
            } catch (\Throwable $e) {
                $fsoRows = null;
            }
        }

        if ((empty($fsoRows) || !is_array($fsoRows)) && is_file($seedFallbackPath)) {
            $decodedSeed = json_decode((string) file_get_contents($seedFallbackPath), true);
            if (is_array($decodedSeed) && count($decodedSeed) > 0) {
                $fsoRows = $decodedSeed;
            }
        }

        if (!is_array($fsoRows)) {
            $fsoRows = [];
        }

        // Map existing BatchRecord rows by normalized OP number
        $batchByOpNum = [];
        $matchedBatchIds = [];
        foreach ($batches as $b) {
            $opClean = preg_replace('/^OP[\-\s]*/i', '', trim((string) $b->orden_produccion));
            if ($opClean !== '') {
                $batchByOpNum[strtoupper($opClean)] = $b;
            }
        }

        $catalog = [];

        foreach ($fsoRows as $row) {
            $numOrden = trim((string) ($row['NumeroOrden'] ?? ''));
            if ($numOrden === '') {
                continue;
            }

            $matchedBatch = $batchByOpNum[strtoupper($numOrden)] ?? null;
            if ($matchedBatch) {
                $matchedBatchIds[$matchedBatch->id] = true;
            }

            $opDisplay = 'OP-' . $numOrden;
            $lote = $matchedBatch ? (string) $matchedBatch->lote : ($row['Lote'] !== '' ? $row['Lote'] : 'S/L');
            $producto = $matchedBatch ? (string) $matchedBatch->producto : ($row['Descripcion'] !== '' ? $row['Descripcion'] : 'PRODUCTO SIN DESCRIPCIÓN');
            $codigo = $matchedBatch ? (string) ($matchedBatch->codigo ?: '332FB487') : ($row['CodigoArticulo'] !== '' ? $row['CodigoArticulo'] : 'S/C');
            $planta = $matchedBatch ? (string) $matchedBatch->val('planta', $row['Instalacion'] ?: 'G1') : ($row['Instalacion'] ?: 'G1');
            $status = $matchedBatch ? (string) $matchedBatch->status : 'Pendiente';
            $cant = isset($row['CantidadOrden']) && $row['CantidadOrden'] > 0
                ? rtrim(rtrim(number_format((float) $row['CantidadOrden'], 3, '.', ''), '0'), '.')
                : '';

            $catalog[] = [
                'key'          => 'FSO_' . $numOrden,
                'batch_id'     => $matchedBatch ? $matchedBatch->id : null,
                'numero_orden' => $numOrden,
                'op_display'   => $opDisplay,
                'lote'         => $lote,
                'producto'     => $producto,
                'codigo'       => $codigo,
                'planta'       => $planta,
                'cantidad'     => $cant,
                'status'       => $status,
                'estatus_fso'  => $row['Estatus'] ?? '',
            ];
        }

        return $catalog;
    }

    /**
     * Filter and paginate the FSO catalog for the Órdenes de Producción section.
     */
    protected function paginateFsoCatalog(array $catalog, string $search = '', string $planta = '', int $page = 1, int $perPage = 50): array
    {
        $searchLower = mb_strtolower(trim($search));
        $plantaUpper = strtoupper(trim($planta));

        $filtered = array_filter($catalog, function (array $item) use ($searchLower, $plantaUpper) {
            if ($plantaUpper !== '' && strtoupper($item['planta']) !== $plantaUpper) {
                return false;
            }
            if ($searchLower !== '') {
                $haystack = mb_strtolower(
                    $item['op_display'] . ' ' .
                    $item['numero_orden'] . ' ' .
                    $item['lote'] . ' ' .
                    $item['producto'] . ' ' .
                    $item['codigo'] . ' ' .
                    $item['planta']
                );
                if (!str_contains($haystack, $searchLower)) {
                    return false;
                }
            }
            return true;
        });

        $filtered = array_values($filtered);
        $total = count($filtered);
        $lastPage = max(1, (int) ceil($total / $perPage));
        $page = max(1, min($lastPage, $page));
        $offset = ($page - 1) * $perPage;
        $items = array_slice($filtered, $offset, $perPage);

        return [
            'items'     => $items,
            'total'     => $total,
            'page'      => $page,
            'per_page'  => $perPage,
            'last_page' => $lastPage,
        ];
    }

    /**
     * Display the dashboard listing all batch records and FSO Production Orders.
     */
    public function index(Request $request)
    {
        $this->ensureSeedOrdersExist();
        $this->ensureSeedUsersExist();

        $query = BatchRecord::query()->orderBy('id');

        if ($search = trim((string) $request->input('q'))) {
            $query->where(function ($q) use ($search) {
                $q->where('lote', 'like', "%{$search}%")
                  ->orWhere('orden_produccion', 'like', "%{$search}%")
                  ->orWhere('producto', 'like', "%{$search}%")
                  ->orWhere('codigo', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $batches = $query->get();
        $roleUsers = BatchUser::orderBy('id')->get();

        $fsoCatalog = $this->getFsoCatalog($batches);
        $fsoPageData = $this->paginateFsoCatalog(
            $fsoCatalog,
            (string) $request->input('fso_q', ''),
            (string) $request->input('fso_planta', ''),
            (int) $request->input('fso_page', 1),
            50
        );

        $stats = [
            'total'       => BatchRecord::count(),
            'fso_total'   => count($fsoCatalog),
            'pendientes'  => BatchRecord::where('status', 'Pendiente')->count(),
            'en_proceso'  => BatchRecord::whereIn('status', ['En Proceso', 'Aprobada', 'En Verificación', 'Con Desviación'])->count(),
            'verificando' => BatchRecord::where('status', 'En Verificación')->count(),
            'finalizados' => BatchRecord::where('status', 'Finalizado')->count(),
            'desviacion'  => BatchRecord::where('tiene_desviacion', true)->count(),
        ];

        return view('dashboard', compact('batches', 'stats', 'roleUsers', 'fsoPageData'));
    }

    /**
     * JSON endpoint to search, filter by plant, and paginate OPs from dbo.FSO in real time.
     */
    public function fsoOrders(Request $request)
    {
        $batches = BatchRecord::orderBy('id')->get();
        $fsoCatalog = $this->getFsoCatalog($batches);
        $result = $this->paginateFsoCatalog(
            $fsoCatalog,
            (string) $request->query('q', ''),
            (string) $request->query('planta', ''),
            (int) $request->query('page', 1),
            (int) $request->query('per_page', 50)
        );

        return response()->json([
            'ok' => true,
            ...$result,
        ]);
    }

    /**
     * Direct shortcut to the Production Orders (OP) Selection & Approval view.
     */
    public function seleccion(Request $request)
    {
        $request->merge(['section' => 'ordenes']);
        return $this->index($request);
    }

    /**
     * Approve one or more selected OPs (from dbo.FSO or dbo.batch_records) and transition them to Captura / En Proceso.
     */
    public function approve(Request $request)
    {
        $opIds = $request->input('op_ids', []);
        if (is_string($opIds)) {
            $opIds = array_filter(explode(',', $opIds));
        }

        if (empty($opIds) || !is_array($opIds)) {
            return redirect()
                ->route('dashboard', ['section' => 'ordenes'])
                ->with('error', 'Selecciona al menos una Orden de Producción (OP) para aprobar.');
        }

        $approverName = Auth::user()->name ?? 'Brenda Campos';
        $approvedTimestamp = now()->format('d/m/Y H:i');

        $opLotes = $request->input('op_lote', []);
        $opTamanos = $request->input('op_tamano_lote', []);

        $processedBatches = collect();

        foreach ($opIds as $rawKey) {
            $rawKeyStr = trim((string) $rawKey);
            if ($rawKeyStr === '') {
                continue;
            }

            $batch = null;
            $lookupKey = $rawKeyStr;

            if (str_starts_with($rawKeyStr, 'FSO_')) {
                $numOrden = trim(substr($rawKeyStr, 4));
                $batch = BatchRecord::where('orden_produccion', 'OP-' . $numOrden)
                    ->orWhere('orden_produccion', $numOrden)
                    ->first();

                if (!$batch && $numOrden !== '') {
                    $fsoRow = DB::table('FSO')->where('NumeroOrden', $numOrden)->first();
                    if ($fsoRow) {
                        $fsoDesc   = trim((string) ($fsoRow->Descripcion ?? '')) ?: 'PRODUCTO SIN DESCRIPCIÓN';
                        $fsoCod    = trim((string) ($fsoRow->CodigoArticulo ?? '')) ?: 'S/C';
                        $fsoLote   = trim((string) ($fsoRow->Lote ?? '')) ?: 'S/L';
                        $fsoPlanta = trim((string) ($fsoRow->Instalacion ?? '')) ?: 'G1';
                        $fsoCant   = isset($fsoRow->CantidadOrden) && (float) $fsoRow->CantidadOrden > 0
                            ? number_format((float) $fsoRow->CantidadOrden, 3, '.', '')
                            : '500.000';

                        $batch = BatchRecord::create([
                            'producto'         => $fsoDesc,
                            'codigo'           => $fsoCod,
                            'revision'         => '09',
                            'lote'             => $fsoLote,
                            'orden_produccion' => 'OP-' . $numOrden,
                            'tamano_lote'      => $fsoCant . ' kg',
                            'presentacion'     => $fsoDesc,
                            'current_step'     => 1,
                            'status'           => 'En Proceso',
                            'payload'          => [
                                'planta'          => $fsoPlanta,
                                'alerta_estado'   => 'APROBADA',
                                'etapa_label'     => 'Etapa 1 - Llenado 14 Págs.',
                                'presentacion_vt' => '1',
                                'rendimiento'     => ['peso_teorico' => $fsoCant],
                                'signatures'      => [],
                                'fso_data'        => [
                                    'numero_orden'       => $fsoRow->NumeroOrden,
                                    'estatus_fso'        => trim((string) ($fsoRow->Estatus ?? '')),
                                    'fecha_ingreso'      => $fsoRow->FechaIngreso ?? null,
                                    'fecha_cierre_op'    => $fsoRow->FechaCierreOP ?? null,
                                    'cantidad_orden'     => $fsoRow->CantidadOrden ?? null,
                                    'cantidad_realizada' => $fsoRow->CantidadRealizada ?? null,
                                ],
                            ],
                            'created_by'       => Auth::id(),
                            'updated_by'       => Auth::id(),
                        ]);
                    }
                }
            } elseif (str_starts_with($rawKeyStr, 'BR_')) {
                $brId = (int) substr($rawKeyStr, 3);
                $batch = BatchRecord::find($brId);
            } elseif (is_numeric($rawKeyStr)) {
                $batch = BatchRecord::find((int) $rawKeyStr);
                if (!$batch) {
                    $batch = BatchRecord::where('orden_produccion', 'OP-' . $rawKeyStr)
                        ->orWhere('orden_produccion', $rawKeyStr)
                        ->first();
                }
            }

            if (!$batch) {
                continue;
            }

            $payload = $batch->payload ?? [];
            $payload['aprobacion'] = [
                'aprobado'     => true,
                'aprobado_por' => $approverName,
                'fecha'        => $approvedTimestamp,
            ];
            $payload['etapa_label'] = 'Etapa 1 - Llenado 14 Págs.';
            $payload['alerta_estado'] = 'APROBADA';

            $customLote = null;
            if (is_array($opLotes)) {
                if (isset($opLotes[$lookupKey]) && trim((string) $opLotes[$lookupKey]) !== '') {
                    $customLote = trim((string) $opLotes[$lookupKey]);
                } elseif (isset($opLotes[$batch->id]) && trim((string) $opLotes[$batch->id]) !== '') {
                    $customLote = trim((string) $opLotes[$batch->id]);
                }
            }
            if ($customLote !== null) {
                $batch->lote = $customLote;
            }

            $customTamano = null;
            if (is_array($opTamanos)) {
                if (isset($opTamanos[$lookupKey]) && trim((string) $opTamanos[$lookupKey]) !== '') {
                    $customTamano = trim((string) $opTamanos[$lookupKey]);
                } elseif (isset($opTamanos[$batch->id]) && trim((string) $opTamanos[$batch->id]) !== '') {
                    $customTamano = trim((string) $opTamanos[$batch->id]);
                }
            }
            if ($customTamano !== null) {
                $batch->tamano_lote = $customTamano;
                if (preg_match('/([0-9]+(?:\.[0-9]+)?)/', $customTamano, $m)) {
                    $payload['rendimiento']['peso_teorico'] = $m[1];
                }
            }

            if ($batch->status === 'Pendiente') {
                $batch->status = 'En Proceso';
            }
            if (!$batch->current_step || $batch->current_step < 1) {
                $batch->current_step = 1;
            }
            $batch->payload = $payload;
            $batch->updated_by = Auth::id();
            $batch->save();

            $processedBatches->push($batch);
        }

        if ($processedBatches->isEmpty()) {
            return redirect()
                ->route('dashboard', ['section' => 'ordenes'])
                ->with('error', 'No se encontraron las Órdenes de Producción seleccionadas.');
        }

        $firstBatch = $processedBatches->first();
        $count = $processedBatches->count();

        $msg = $count === 1
            ? "Fabricación iniciada para {$firstBatch->orden_produccion} (Lote {$firstBatch->lote}). Ya se encuentra disponible en En Proceso."
            : "Se enviaron {$count} OPs a la sección En Proceso para iniciar su captura.";

        return redirect()
            ->route('dashboard', ['section' => 'historial'])
            ->with('success', $msg);
    }

    /**
     * Create a new BatchRecord and redirect either to the OP selection list or step 1 of the wizard.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lote'             => 'required|string|max:100',
            'orden_produccion' => 'required|string|max:100',
            'producto'         => 'nullable|string|max:200',
            'codigo'           => 'nullable|string|max:50',
            'planta'           => 'nullable|string|max:20',
            'tamano_lote'      => 'nullable|string|max:100',
            'presentacion'     => 'nullable|string|max:100',
            'initial_status'   => 'nullable|string|max:50',
        ]);

        $presentacion = $validated['presentacion'] ?? 'ANDANTOL GEL 100 G';
        $producto = $validated['producto'] ?? 'ANDANTOL (ISOTIPENDILO) GEL 0.75g / 100g';
        $codigo = $validated['codigo'] ?? '332FB487';
        $planta = $validated['planta'] ?? 'G1';
        $initialStatus = $validated['initial_status'] ?? 'Pendiente';

        $initialPayload = [
            'planta'          => $planta,
            'alerta_estado'   => $initialStatus === 'Pendiente' ? 'RETRASO' : 'APROBADA',
            'etapa_label'     => $initialStatus === 'Pendiente' ? 'Etapa 0 - En curso' : 'Etapa 1 - Llenado 14 Págs.',
            'presentacion_st' => $presentacion === 'ISOTIPENDILO GEL ST' ? '1' : '',
            'presentacion_vt' => $presentacion === 'ANDANTOL GEL 100 G' ? '1' : '',
            'rendimiento'     => [
                'peso_teorico' => '500.000',
            ],
            'signatures'      => [],
        ];

        $batch = BatchRecord::create([
            'producto'         => $producto,
            'codigo'           => $codigo,
            'revision'         => '09',
            'lote'             => $validated['lote'],
            'orden_produccion' => $validated['orden_produccion'],
            'tamano_lote'      => $validated['tamano_lote'] ?? '500.000 kg',
            'presentacion'     => $presentacion,
            'current_step'     => 1,
            'status'           => $initialStatus,
            'payload'          => $initialPayload,
            'created_by'       => Auth::id(),
            'updated_by'       => Auth::id(),
        ]);

        if ($initialStatus === 'Pendiente') {
            return redirect()
                ->route('dashboard', ['section' => 'ordenes'])
                ->with('success', "Orden de Producción {$batch->orden_produccion} (Lote {$batch->lote}) registrada en Órdenes de Producción. Selecciónala y apruébala para pasar a Captura.");
        }

        return redirect()
            ->route('batches.edit', ['batch' => $batch->id, 'step' => 1])
            ->with('success', "Lote {$batch->lote} creado y aprobado. Puedes comenzar el llenado paso a paso.");
    }

    /**
     * Show the step-by-step wizard for filling out the 14-page Batch Record.
     */
    public function edit(Request $request, BatchRecord $batch)
    {
        $step = (int) $request->query('step', $batch->current_step ?: 1);
        $step = max(1, min(7, $step));

        return view('batches.wizard', compact('batch', 'step'));
    }

    /**
     * Save changes from the wizard (supports step navigation, auto-save, and file uploads).
     */
    public function update(Request $request, BatchRecord $batch)
    {
        $existingPayload = $batch->payload ?? [];
        $incomingPayload = $request->input('payload', []);

        if (is_array($incomingPayload)) {
            $mergedPayload = array_replace_recursive($existingPayload, $incomingPayload);
        } else {
            $mergedPayload = $existingPayload;
        }

        // Handle file uploads for Page 14 (Anexos: Boletas MP y Tickets Esterilización)
        if ($request->hasFile('anexo_boletas_file')) {
            $file = $request->file('anexo_boletas_file');
            $filename = 'boletas_mp_' . time() . '.' . $file->getClientOriginalExtension();
            $destPath = public_path("uploads/batches/{$batch->id}");
            if (!is_dir($destPath)) {
                mkdir($destPath, 0775, true);
            }
            $file->move($destPath, $filename);
            $mergedPayload['anexos']['boletas_mp_file'] = "uploads/batches/{$batch->id}/{$filename}";
            $mergedPayload['anexos']['boletas_mp_name'] = $file->getClientOriginalName();
        }

        if ($request->hasFile('anexo_mangueras_file')) {
            $file = $request->file('anexo_mangueras_file');
            $filename = 'ticket_mangueras_' . time() . '.' . $file->getClientOriginalExtension();
            $destPath = public_path("uploads/batches/{$batch->id}");
            if (!is_dir($destPath)) {
                mkdir($destPath, 0775, true);
            }
            $file->move($destPath, $filename);
            $mergedPayload['anexos']['mangueras_file'] = "uploads/batches/{$batch->id}/{$filename}";
            $mergedPayload['anexos']['mangueras_name'] = $file->getClientOriginalName();
        }

        // Update top-level fields if provided
        if ($request->filled('lote')) {
            $batch->lote = $request->input('lote');
        }
        if ($request->filled('orden_produccion')) {
            $batch->orden_produccion = $request->input('orden_produccion');
        }
        if ($request->has('tamano_lote')) {
            $batch->tamano_lote = $request->input('tamano_lote');
        }

        // Sync presentation summary
        $st = !empty($mergedPayload['presentacion_st']);
        $vt = !empty($mergedPayload['presentacion_vt']);
        if ($st && $vt) {
            $batch->presentacion = 'ISOTIPENDILO GEL ST / ANDANTOL GEL 100 G';
        } elseif ($st) {
            $batch->presentacion = 'ISOTIPENDILO GEL ST';
        } elseif ($vt) {
            $batch->presentacion = 'ANDANTOL GEL 100 G';
        }

        // Recalculate container Neto = Bruto - Tara server-side if present
        if (!empty($mergedPayload['contenedores']) && is_array($mergedPayload['contenedores'])) {
            $totalNeto = 0.0;
            $hasCont = false;
            for ($c = 1; $c <= 5; $c++) {
                $bRaw = $mergedPayload['contenedores'][$c]['bruto'] ?? '';
                $tRaw = $mergedPayload['contenedores'][$c]['tara'] ?? '';
                if ($bRaw !== '' || $tRaw !== '') {
                    $hasCont = true;
                    $bVal = is_numeric(str_replace(',', '.', (string) $bRaw)) ? (float) str_replace(',', '.', (string) $bRaw) : 0.0;
                    $tVal = is_numeric(str_replace(',', '.', (string) $tRaw)) ? (float) str_replace(',', '.', (string) $tRaw) : 0.0;
                    $neto = $bVal - $tVal;
                    $mergedPayload['contenedores'][$c]['neto'] = number_format($neto, 3, '.', '');
                    $totalNeto += $neto;
                } else {
                    $mergedPayload['contenedores'][$c]['neto'] = '';
                }
            }
            if ($hasCont) {
                $formattedTotal = number_format($totalNeto, 3, '.', '');
                $mergedPayload['contenedores']['total_neto'] = $formattedTotal;
                $mergedPayload['rendimiento']['peso_obtenido'] = $formattedTotal;
            } else {
                $mergedPayload['contenedores']['total_neto'] = '';
            }
        }

        // Recalculate yield percentage: ((1 + 2) / 3) * 100
        if (!empty($mergedPayload['rendimiento']) && is_array($mergedPayload['rendimiento'])) {
            $p1Raw = str_replace(',', '.', (string) ($mergedPayload['rendimiento']['peso_obtenido'] ?? ''));
            $p2Raw = str_replace(',', '.', (string) ($mergedPayload['rendimiento']['peso_muestras'] ?? '0'));
            $p3Raw = str_replace(',', '.', (string) ($mergedPayload['rendimiento']['peso_teorico'] ?? '500'));

            $p1Valid = ($p1Raw !== '' && is_numeric($p1Raw));
            $p2Val   = ($p2Raw !== '' && is_numeric($p2Raw)) ? (float) $p2Raw : 0.0;
            $p3Val   = ($p3Raw !== '' && is_numeric($p3Raw)) ? (float) $p3Raw : 0.0;

            if (($p1Valid || $p2Val > 0) && $p3Val > 0) {
                $p1Val = $p1Valid ? (float) $p1Raw : 0.0;
                $calcPct = (($p1Val + $p2Val) / $p3Val) * 100.0;
                $mergedPayload['rendimiento']['porcentaje_final'] = number_format($calcPct, 2, '.', '');
                $batch->rendimiento_porcentaje = round($calcPct, 2);
            } else {
                $mergedPayload['rendimiento']['porcentaje_final'] = '';
                $batch->rendimiento_porcentaje = null;
            }
        }

        // Deviation flag
        $desv = $mergedPayload['desviacion']['tuvo_desviacion'] ?? 'NO';
        $batch->tiene_desviacion = ($desv === 'SI');

        // Step & Status
        $nextStep = (int) $request->input('next_step', $request->input('current_step', $batch->current_step));
        $batch->current_step = max(1, min(7, $nextStep));

        if ($request->filled('status')) {
            $batch->status = $request->input('status');
        } elseif ($batch->tiene_desviacion && $batch->status !== 'Finalizado') {
            $batch->status = 'Con Desviación';
        }

        $batch->payload = $mergedPayload;
        $batch->updated_by = Auth::id();
        $batch->save();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'ok'       => true,
                'message'  => 'Avance guardado correctamente en la base de datos.',
                'progress' => $batch->progressPercentage(),
                'status'   => $batch->status,
            ]);
        }

        return redirect()
            ->route('batches.edit', ['batch' => $batch->id, 'step' => $batch->current_step])
            ->with('success', 'Datos del formato guardados correctamente.');
    }

    /**
     * Render the 14-page full print replica of the Batch Record as a native PDF in Chrome.
     */
    public function printView(Request $request, BatchRecord $batch)
    {
        if ($request->boolean('html')) {
            return view('batches.print', compact('batch'));
        }

        $chromeCandidates = [
            'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe',
            'C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe',
            'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe',
            'C:\\Program Files\\Microsoft\\Edge\\Application\\msedge.exe',
        ];

        $browserBinary = null;
        foreach ($chromeCandidates as $candidate) {
            if (is_file($candidate)) {
                $browserBinary = $candidate;
                break;
            }
        }

        if ($browserBinary) {
            try {
                $html = view('batches.print', [
                    'batch'     => $batch,
                    'isPdfMode' => true,
                ])->render();

                // Replace local server URLs with relative public paths so Chrome Headless loads local images directly from public/ without hitting the single-threaded dev server
                $hostPrefix = rtrim($request->getSchemeAndHttpHost(), '/') . '/';
                $urlPrefix  = rtrim(url('/'), '/') . '/';
                $html = str_replace([$hostPrefix, $urlPrefix], '', $html);

                $token = $batch->id . '_' . uniqid();
                $tempHtmlPath = public_path("_ebr_pdf_tmp_{$token}.html");
                $pdfDir = storage_path('app/temp_pdfs');
                if (!is_dir($pdfDir)) {
                    @mkdir($pdfDir, 0775, true);
                }
                $profileDir = storage_path('app/chrome_pdf_profile');
                if (!is_dir($profileDir)) {
                    @mkdir($profileDir, 0775, true);
                }
                $pdfPath = $pdfDir . DIRECTORY_SEPARATOR . "BatchRecord_{$token}.pdf";

                file_put_contents($tempHtmlPath, $html);

                $cmd = sprintf(
                    '"%s" --headless=new --disable-gpu --no-sandbox --no-pdf-header-footer --user-data-dir=%s --print-to-pdf=%s %s 2>&1',
                    $browserBinary,
                    escapeshellarg($profileDir),
                    escapeshellarg($pdfPath),
                    escapeshellarg($tempHtmlPath)
                );

                @exec($cmd, $outputLines, $exitCode);
                @unlink($tempHtmlPath);

                if (is_file($pdfPath) && filesize($pdfPath) > 500) {
                    $safeLote = preg_replace('/[^A-Za-z0-9_\-]/', '_', (string) $batch->lote);
                    $safeOp   = preg_replace('/[^A-Za-z0-9_\-]/', '_', (string) $batch->orden_produccion);
                    $fileName = "BatchRecord_{$safeOp}_Lote_{$safeLote}.pdf";

                    return response()->file($pdfPath, [
                        'Content-Type'        => 'application/pdf',
                        'Content-Disposition' => 'inline; filename="' . $fileName . '"',
                    ])->deleteFileAfterSend(true);
                }
            } catch (\Throwable $e) {
                if (isset($tempHtmlPath) && is_file($tempHtmlPath)) {
                    @unlink($tempHtmlPath);
                }
            }
        }

        return view('batches.print', compact('batch'));
    }

    /**
     * Delete a batch record.
     */
    public function destroy(BatchRecord $batch)
    {
        $lote = $batch->lote;
        $batch->delete();

        return redirect()
            ->route('dashboard', ['section' => 'captura'])
            ->with('success', "El registro del lote {$lote} fue eliminado.");
    }

    /**
     * Store a new user and role in the SQL Server batch_users table.
     */
    public function storeRoleUser(Request $request)
    {
        if (!$this->isCurrentUserAdmin()) {
            return response()->json([
                'ok'      => false,
                'message' => 'Solo un Administrador puede dar de alta usuarios.',
            ], 403);
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role'  => 'required|in:Administrador,Usuario',
        ]);

        $emailLower = strtolower(trim($validated['email']));
        $nameClean  = trim($validated['name']);
        $roleClean  = $validated['role'];

        $batchUser = BatchUser::updateOrCreate(
            ['email' => $emailLower],
            [
                'name'         => $nameClean,
                'role'         => $roleClean,
                'is_protected' => $emailLower === 'chatboteams@sanfer.com.mx',
            ]
        );

        // Sync with main users table so Azure AD login recognizes the user
        User::updateOrCreate(
            ['email' => $emailLower],
            ['name' => $nameClean]
        );

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'ok'    => true,
                'user'  => $batchUser,
                'users' => BatchUser::orderBy('id')->get(),
            ]);
        }

        return redirect()
            ->route('dashboard', ['section' => 'roles'])
            ->with('success', "Usuario {$batchUser->name} registrado en SQL Server correctamente.");
    }

    /**
     * Update an existing user and role in the SQL Server batch_users table.
     */
    public function updateRoleUser(Request $request, BatchUser $batchUser)
    {
        if (!$this->isCurrentUserAdmin()) {
            return response()->json([
                'ok'      => false,
                'message' => 'Solo un Administrador puede modificar roles de usuarios.',
            ], 403);
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:batch_users,email,' . $batchUser->id,
            'role'  => 'required|in:Administrador,Usuario',
        ]);

        $emailLower = strtolower(trim($validated['email']));
        $nameClean  = trim($validated['name']);
        $roleClean  = $validated['role'];

        $batchUser->update([
            'name' => $nameClean,
            'email' => $emailLower,
            'role' => $batchUser->is_protected ? 'Administrador' : $roleClean,
        ]);

        User::updateOrCreate(
            ['email' => $emailLower],
            ['name' => $nameClean]
        );

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'ok'    => true,
                'user'  => $batchUser,
                'users' => BatchUser::orderBy('id')->get(),
            ]);
        }

        return redirect()
            ->route('dashboard', ['section' => 'roles'])
            ->with('success', "Usuario {$batchUser->name} actualizado en SQL Server.");
    }

    /**
     * Delete a user from the SQL Server batch_users table.
     */
    public function destroyRoleUser(Request $request, BatchUser $batchUser)
    {
        if (!$this->isCurrentUserAdmin()) {
            return response()->json([
                'ok'      => false,
                'message' => 'Solo un Administrador puede eliminar usuarios.',
            ], 403);
        }

        if ($batchUser->is_protected || strtolower($batchUser->email) === 'chatboteams@sanfer.com.mx') {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'ok'      => false,
                    'message' => 'Este usuario está protegido y no puede eliminarse.',
                ], 403);
            }
            return redirect()
                ->route('dashboard', ['section' => 'roles'])
                ->with('error', 'Este usuario está protegido y no puede eliminarse.');
        }

        $batchUser->delete();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'ok'    => true,
                'users' => BatchUser::orderBy('id')->get(),
            ]);
        }

        return redirect()
            ->route('dashboard', ['section' => 'roles'])
            ->with('success', 'Usuario eliminado de SQL Server.');
    }
}
