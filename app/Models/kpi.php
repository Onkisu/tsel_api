<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class kpi extends Model
{
    use HasFactory;
    protected $table = 'net.kpis';

    protected $fillable = [
        'kpi_name',
        'site_id',
        'value',
        'date',
    ];




    //
}
