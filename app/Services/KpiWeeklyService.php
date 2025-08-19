<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

class KpiWeeklyService
{
    public function getWeeklyKpi(array $filters)
    {
        $week = $filters['week'] ?? null; // Default to current week if not provided
        $region = $filters['region'] ?? null;
        $sto = $filters['sto'] ?? null;
        $site_id = $filters['site_id'] ?? null;
        $vendor = $filters['vendor'] ?? null;

        // Parse week ke tanggal mulai dan selesai
        $dates = $this->getWeekRange($week);
        $startDate = $dates['start'];
        $endDate = $dates['end'];

        $query = DB::table('net.daily_2g_kpi')
            ->select(
                 DB::raw("'" . $week . "' as week"),
                'site_id',
                'region',
                'sto',
                'vendor',
                DB::raw('ROUND(AVG(throughput), 2) as avg_throughput'),
                DB::raw('ROUND(SUM(payload), 2) as total_payload'),
                DB::raw('SUM(CASE WHEN activation_status = 1 THEN 1 ELSE 0 END) as total_activations'),
                DB::raw('ROUND(AVG(churn_rate), 2) as avg_churn')
            )
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('site_id', 'region', 'sto', 'vendor');

        if ($region) $query->where('region', $region);
        if ($sto) $query->where('sto', $sto);
        if ($site_id) $query->where('site_id', $site_id);
        if ($vendor) $query->where('vendor', $vendor);

        return $query->get();
    }

   private function getWeekRange(string $week)
{
    // Format YYYYWW, misal 202512
    $year = substr($week, 0, 4);
    $weekNumber = substr($week, 4, 2);

    $date = new \DateTime();
    $date->setISODate((int)$year, (int)$weekNumber);

    $start = $date->format('Y-m-d');  // Senin
    $date->modify('+6 days');
    $end = $date->format('Y-m-d');    // Minggu

    return ['start' => $start, 'end' => $end];
}

private function getCurrentIsoWeek(): string
    {
        $date = new \DateTime();
        $year = $date->format('o');        // ISO year
        $week = $date->format('W');        // ISO week number, 2 digit
        return $year . $week;              // Contoh: 202533
    }
}
