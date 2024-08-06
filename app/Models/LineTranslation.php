<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LineTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['line_id', 'language_id', 'value'];

    public function line(): BelongsTo
    {
        return $this->belongsTo(Line::class);
    }
}
