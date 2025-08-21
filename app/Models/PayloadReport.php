<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PayloadReport extends Model
{
    // If you don't have a table for this model, disable timestamps
    public $timestamps = false;

    /**
     * Call the view net.v_summary_monthly_py_vendor_v3 and get results.
     *
     * @return \Illuminate\Support\Collection
     */
        public static function getMonthlyVendorSummary()
        {
            return DB::select("SELECT * FROM net.v_summary_monthly_py_vendor_v3"); // better raw query
        }

}
