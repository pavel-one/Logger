<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperUserSocial
 */
class UserSocial extends Model
{
    public const GITHUB_PROVIDER = 'github';
    public const YANDEX_PROVIDER = 'yandex';
    public const VK_PROVIDER = 'vkontakte';

    protected $fillable = [
        'social_id',
        'provider',
        'token',
        'info'
    ];

    protected $casts = [
        'info' => 'array'
    ];

    public static function getProviderList(): array
    {
        return [self::GITHUB_PROVIDER];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
