<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StationTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'stations_translation';

    protected $fillable = ['station_id', 'language_id', 'value'];

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }
}
