<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

use Illuminate\Http\Resources\Json\JsonResource;

class PayloadRanSumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'month' => $this->month,
            'node' => $this->node,
            'vendor' => $this->vendor,
            'region' => $this->region,
            'site_id' => $this->site_id,
            'cell_name' => $this->cell_name,
            'lac' => $this->lac,
            'ci' => $this->ci,
            'band' => $this->band,
            'kecamatan' => $this->kecamatan,
            'kabupaten' => $this->kabupaten,
            'longitude' => $this->longitude,
            'latittude' => $this->latittude,
            'rev_total' => $this->rev_total,
            'total_payload_mbyte' => $this->total_payload_mbyte,
            'traffic_erl' => $this->traffic_erl

        ];
    }
}
