<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use \Laravel\Socialite\Two\User as SocialUser;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const TOKEN_API_NAME = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6'
        ];
    }

    public static function createWithSocial(SocialUser $socialUser, string $provider): self
    {
        $user = User::whereEmail($socialUser->getEmail())->first();

        if (!$user) {
            /** @var self $user */
            $user = self::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'avatar' => $socialUser->getAvatar(),
                'password' => \Str::random(12),
            ]);
        }

        $social = $user->socials()->where('provider', '=', $provider)->first();
        $socialData = [
            'social_id' => $socialUser->getId(),
            'provider' => $provider,
            'token' => $socialUser->token,
            'info' => $socialUser->user
        ];

        if (!$social) {
            $user->socials()->create($socialData);
        } else {
            $social->update($socialData);
        }

        return $user;
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'user_id', 'id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(
            Project::class,
            ProjectsUsers::class,
            'user_id',
            'project_id',
        );
    }

    public function socials(): HasMany
    {
        return $this->hasMany(UserSocial::class);
    }
}
