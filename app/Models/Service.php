<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'icon'];

    public function stations(): HasMany
    {
        return $this->hasMany(StationFeature::class,'feature_id');
    }
}
