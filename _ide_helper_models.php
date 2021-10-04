<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Log
 *
 * @property int $id
 * @property string $message
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $level
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\LogData|null $data
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LogFile[] $files
 * @property-read int|null $files_count
 * @method static \Database\Factories\LogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LogData
 *
 * @property int $id
 * @property array $content
 * @property int $log_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Log $log
 * @method static \Database\Factories\LogDataFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|LogData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogData query()
 * @method static \Illuminate\Database\Eloquent\Builder|LogData whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogData whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogData whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperLogData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LogFile
 *
 * @property int $id
 * @property string $path
 * @property string $disk
 * @property int $log_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Log $log
 * @method static \Database\Factories\LogFileFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|LogFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|LogFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogFile whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogFile whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperLogFile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperProject extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser extends \Eloquent {}
}

