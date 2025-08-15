<?php

namespace App\Http\Controllers;

use App\Models\kpi;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Request;

class KpiController extends Controller
{
    //
     // Ambil KPI terbaru per site_id

     public function getKpis(Request $request) {
        $kpis = Kpi::select('kpi_name', 'site_id', 'value', 'date')
            ->orderBy('date', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $kpis
        ]);
     }
}
