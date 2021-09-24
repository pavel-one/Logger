<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperLogData
 */
class LogData extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => 'array'
    ];

    public function log(): BelongsTo
    {
        return $this->belongsTo(Log::class);
    }
}
