<?php

namespace App\Http\Controllers;

use App\Models\PayloadReport;
use Illuminate\Http\Request;

class PayloadReportController extends Controller
{
    // Display a listing of the payload reports
    public function index()
    {
        $reports = PayloadReport::all();
        return response()->json($reports);
    }

}
