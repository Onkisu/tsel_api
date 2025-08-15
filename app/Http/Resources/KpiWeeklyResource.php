<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KpiWeeklyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'week' => $this->week,
            'site_id' => $this->site_id,
            'region' => $this->region,
            'sto' => $this->sto,
            'vendor' => $this->vendor,
            'average_throughput' => $this->avg_throughput,
            'total_payload' => $this->total_payload,
            'total_activations' => $this->total_activations,
            'average_churn_rate' => $this->avg_churn,
        ];
    }
}
