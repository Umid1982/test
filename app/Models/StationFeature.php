<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationFeature extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'stations_features';

    protected $fillable = ['station_id', 'feature_id'];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function feature()
    {
        return $this->belongsTo(Service::class, 'feature_id');
    }
}
