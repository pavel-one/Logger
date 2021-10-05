<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperProject
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            ProjectsUsers::class,
            'project_id',
            'user_id',
        );
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'project_id', 'id');
    }
}
