<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class BatchRecord extends Model
{
    use HasFactory;

    protected $table = 'batch_records';

    protected $fillable = [
        'producto',
        'codigo',
        'revision',
        'lote',
        'orden_produccion',
        'tamano_lote',
        'presentacion',
        'current_step',
        'status',
        'rendimiento_porcentaje',
        'tiene_desviacion',
        'payload',
        'created_by',
        'updated_by',
    ];

    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'tiene_desviacion' => 'boolean',
            'rendimiento_porcentaje' => 'decimal:2',
            'current_step' => 'integer',
        ];
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Retrieve a value from payload using dot notation.
     */
    public function val(string $key, $default = '')
    {
        $data = $this->payload ?? [];
        return Arr::get($data, $key, $default);
    }

    /**
     * Retrieve a signature object from payload.signatures.{key}
     */
    public function sig(string $key): array
    {
        $data = $this->payload ?? [];
        $sig = Arr::get($data, "signatures.{$key}", []);
        return is_array($sig) ? $sig : [];
    }

    /**
     * Calculate completion percentage across all 7 steps (140 signature slots + fields).
     * Never returns 100% unless the 7 steps are finished (status === 'Finalizado').
     */
    public function progressPercentage(): int
    {
        if ($this->status === 'Pendiente') {
            return 0;
        }

        if ($this->status === 'Finalizado') {
            return 100;
        }

        $data = $this->payload ?? [];
        if (isset($data['wizard_progress_pct']) && is_numeric($data['wizard_progress_pct'])) {
            return min(99, max(5, (int) round((float) $data['wizard_progress_pct'])));
        }

        $signatures = Arr::get($data, 'signatures', []);
        if (!is_array($signatures)) {
            return 5;
        }

        $signedCount = 0;
        foreach ($signatures as $sig) {
            if (!empty($sig['user_name']) || !empty($sig['drawing'])) {
                $signedCount++;
            }
        }

        // There are 140 signature slots across the 7 steps (14 pages)
        $pct = (int) round(($signedCount / 140) * 100);

        return min(99, max(5, $pct));
    }
}
