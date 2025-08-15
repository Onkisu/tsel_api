<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public $withinTransaction = false;
    public function up(): void
    {
        Schema::create('net.kpis', function (Blueprint $table) {
            $table->id();
            $table->string('kpi_name');
            $table->string('site_id')->nullable();
            $table->decimal('value', 15, 2)->default(0);
            $table->date('date'); // tanggal KPI
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('net.kpis');
    }
};
