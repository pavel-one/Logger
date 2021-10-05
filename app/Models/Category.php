<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'id', 'project_id');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class, 'category_id', 'id');
    }
}
