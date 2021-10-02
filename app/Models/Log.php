<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperLog
 */
class Log extends Model
{
    use HasFactory;

    public const LOG_TRACE = 'trace';
    public const LOG_DEBUG = 'debug';
    public const LOG_INFO = 'info';
    public const LOG_WARNING = 'warining';
    public const LOG_ERROR = 'error';
    public const LOG_FATAL = 'fatal';

    protected $fillable = [
        'message',
        'level',
    ];

    public static function getLevels(): array
    {
        return [
            0 => self::LOG_FATAL,
            1 => self::LOG_ERROR,
            2 => self::LOG_WARNING,
            3 => self::LOG_INFO,
            4 => self::LOG_DEBUG,
            5 => self::LOG_TRACE
        ];
    }

    public static function getLevelName(int $id): string
    {
        return self::getLevels()[$id] ?? '';
    }

    public static function getLevelId(string $name): int
    {
        return array_flip(self::getLevels())[$name] ?? -1;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function data(): HasOne
    {
        return $this->hasOne(LogData::class, 'log_id', 'id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(LogFile::class, 'log_id', 'id');
    }
}
