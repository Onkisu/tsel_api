<?php

namespace App\Http\Controllers;

use App\Models\PayloadReport;
use Illuminate\Http\Request;


class PayloadReportController extends Controller
{
    // Display a listing of the payload reports
   public function index()
{
    try {
        $reports = PayloadReport::getMonthlyVendorSummary();
        return response()->json($reports);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}

}
