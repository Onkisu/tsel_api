<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\PayloadRanSumService;
use App\Http\Resources\PayloadRanSumResource; // Corrected namespace


class PayloadRanSumController extends Controller
{
    protected $payloadService;

    public function __construct(PayloadRanSumService $payloadService)
    {
        $this->payloadService = $payloadService;
    }

    public function ranSumPayload(Request $request)
    {
        $validated = $request->validate([
            'region' => 'nullable|string',
            'site_id' => 'nullable|string',   // karena site_id bisa JKT001 dll
            'cell_name' => 'nullable|string',
            'vendor' => 'nullable|string',
            'band' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kabupaten' => 'nullable|string',
        ]);

        $PayValue = $this->payloadService->get($validated);
        // $perPage = $request->integer('per_page', 100); // damn broo bugged
        // $rows = $kpiData->paginate($perPage); // damn broo bugged
        return PayloadRanSumResource::collection($PayValue);
    }
}
