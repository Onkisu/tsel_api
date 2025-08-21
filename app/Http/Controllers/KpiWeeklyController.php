<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KpiWeeklyService;
use App\Http\Resources\KpiWeeklyResource;

class KpiWeeklyController extends Controller
{
    protected $kpiService;

    public function __construct(KpiWeeklyService $kpiService)
    {
        $this->kpiService = $kpiService;
    }

    public function weeklyKpi(Request $request)
    {
        $validated = $request->validate([
            'week' => ['nullable', 'string', 'regex:/^\d{6}$/'], // format YYYYWW
            'region' => 'nullable|string',
            'sto' => 'nullable|string',
            'site_id' => 'nullable|string',   // karena site_id bisa JKT001 dll
            'vendor' => 'nullable|string',
        ]);

        $kpiData = $this->kpiService->getWeeklyKpi($validated);
        // $perPage = $request->integer('per_page', 100);
        // $rows = $kpiData->paginate($perPage);
        return KpiWeeklyResource::collection($kpiData);
    }
}
