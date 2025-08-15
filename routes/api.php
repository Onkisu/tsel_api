<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\KpiWeeklyController;


Route::middleware('auth:sanctum')->group(function () {
    // Other API routes can be defined here
    Route::get('/kpis', [KpiController::class, 'getKpis']);
    Route::get('/kpis/weekly', [KpiWeeklyController::class, 'weeklyKpi']);
});

