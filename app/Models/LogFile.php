<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperLogFile
 */
class LogFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'disk'
    ];

    public function log(): BelongsTo
    {
        return $this->belongsTo(Log::class);
    }
}
