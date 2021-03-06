<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Log;
use App\Models\LogData;
use App\Models\LogFile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Project::factory(1)
            ->has(User::factory(), 'users')
            ->has(
                Category::factory(5)
                    ->has(
                        Log::factory(5)
                            ->has(LogData::factory(), 'data')
                            ->has(LogFile::factory(5), 'files'),
                        'logs'
                    ),
                'categories'
            )
            ->create();
    }
}
