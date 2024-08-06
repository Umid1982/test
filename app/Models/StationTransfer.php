<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StationTransfer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'stations_transfers';

    protected $fillable = [
        'station_id',
        'station_to_id',
        'type',
        'name',
        'code',
        'icon'
    ];

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class, 'station_id');
    }

    public function stationTo(): BelongsTo
    {
        return $this->belongsTo(Station::class, 'station_to_id');
    }
}
