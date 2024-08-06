<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Line extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['number', 'name', 'color', 'style', 'circular', 'external_id', 'sort'];

    public function stations(): HasMany
    {
        return $this->hasMany(Station::class);
    }

    public function translations():HasMany
    {
        return $this->hasMany(LineTranslation::class);
    }
}
