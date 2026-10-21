<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('batch_records')) {
            Schema::create('batch_records', function (Blueprint $table) {
                $table->id();
                $table->string('producto')->default('ANDANTOL (ISOTIPENDILO) GEL 0.75g / 100g');
                $table->string('codigo', 50)->default('332FB487');
                $table->string('revision', 20)->default('09');
                $table->string('lote', 100)->index();
                $table->string('orden_produccion', 100)->index();
                $table->string('tamano_lote', 100)->nullable();
                $table->string('presentacion', 100)->nullable();
                $table->integer('current_step')->default(1);
                $table->string('status', 50)->default('En Proceso');
                $table->decimal('rendimiento_porcentaje', 8, 2)->nullable();
                $table->boolean('tiene_desviacion')->default(false);
                $table->longText('payload')->nullable();
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_records');
    }
};
