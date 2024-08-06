<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StationAudio extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'stations_audio';

    protected $fillable = ['station_id', 'direction', 'action', 'sound'];

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }
}
