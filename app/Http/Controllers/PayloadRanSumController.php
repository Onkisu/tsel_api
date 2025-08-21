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

       $PayValue = $this->payloadService->getRanSum($validated);
       $PayValue = PayValue::paginate(200);

        // $perPage = $request->integer('per_page', 100); // damn broo bugged
        // $rows = $kpiData->paginate($perPage); // damn broo bugged
        return response()->json(
            PayloadRanSumResource::collection($PayValue),
            200,
            [],
            JSON_PRETTY_PRINT
          );
    }
}
