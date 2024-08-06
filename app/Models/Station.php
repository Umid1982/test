<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Station extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'external_id',
        'number',
        'line_id',
        'name',
        'cross_line_id',
        'cross_type',
        'crossPlatform',
        'crossPlatformColor',
        'scheme',
        'sort',
        'active'
    ];

    public function line(): BelongsTo
    {
        return $this->belongsTo(Line::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(StationTranslation::class, 'station_id');
    }

    public function transfers(): HasMany
    {
        return $this->hasMany(StationTransfer::class,'station_id');
    }

    public function audio(): HasMany
    {
        return $this->hasMany(StationAudio::class);
    }

    public function features(): HasMany
    {
        return $this->hasMany(StationFeature::class);
    }
}
