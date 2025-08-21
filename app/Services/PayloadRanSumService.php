<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PayloadRanSumResource; // Corrected namespace

class PayloadRanSumService
{
    public function getRanSum(array $filters)
    {
        $month = $filters['month'] ?? null; // Default to current month if not provided
        $node = $filters['node'] ?? null; // Not used in this query, but kept for consistency
        $vendor = $filters['vendor'] ?? null;
        $region = $filters['region'] ?? null;
        $site_id = $filters['site_id'] ?? null;
        $cell_name = $filters['cell_name'] ?? null;
        $lac = $filters['lac'] ?? null;
        $ci = $filters['ci'] ?? null;
        $band = $filters['band'] ?? null;
        $kecamatan = $filters['kecamatan'] ?? null;
        $kabupaten = $filters['kabupaten'] ?? null;
        $longitude = $filters['longitude'] ?? null;
        $latittude = $filters['latittude'] ?? null;
        $rev_total = $filters['rev_total'] ?? null;
        $total_payload_mbyte = $filters['total_payload_mbyte'] ?? null;
        $traffic_erl = $filters['traffic_erl'] ?? null;

        // Parse month ke tanggal mulai dan selesai
        // $dates = $this->getmonthRange($month);
        // $startDate = $dates['start'];
        // $endDate = $dates['end'];

        $query = DB::table('net.py_fix_v3')
            ->select(
                'month',
                'node',
                'vendor',
                'region',
                'site_id',
                'cell_name',
                'lac',
                'ci',
                'band',
                'kecamatan',
                'kabupaten',
                'longitude',
                'latittude',
                'rev_total',
                'total_payload_mbyte',
                'traffic_erl',
            )
          ->groupBy('site_id', 'region', 'sto', 'vendor')
          ->orderBy('node', 'asc');

        if ($region) $query->where('region', $region);
        if ($site_id) $query->where('site_id', $site_id);
        if ($cell_name) $query->where('cell_name', $cell_name);
        if ($vendor) $query->where('vendor', $vendor);
        if ($band) $query->where('band', $band);
        if ($kecamatan) $query->where('kecamatan', $kecamatan);
        if ($kabupaten) $query->where('kabupaten', $kabupaten);

        return $query->get();
    }

//    private function getmonthRange(string $month)
// {
//     // Format YYYYWW, misal 202512
//     $year = substr($month, 0, 4);
//     $monthNumber = substr($month, 4, 2);

//     $date = new \DateTime();
//     $date->setISODate((int)$year, (int)$monthNumber);

//     $start = $date->format('Y-m-d');  // Senin
//     $date->modify('+6 days');
//     $end = $date->format('Y-m-d');    // Minggu

//     return ['start' => $start, 'end' => $end];
// }

// private function getCurrentIsomonth(): string
//     {
//         $date = new \DateTime();
//         $year = $date->format('o');        // ISO year
//         $month = $date->format('M');        // ISO month number, 2 digit
//         return $year . $month;              // Contoh: 202533
//     }
}
