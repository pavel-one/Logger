<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Log;
use App\Models\LogData;
use App\Models\LogFile;
use App\Models\Project;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogRelationsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_check_relations()
    {
        $this->seed(DatabaseSeeder::class);

        //Записи в бд
        $this->assertEquals(1, Project::count());
        $this->assertEquals(1, User::count());
        $this->assertEquals(5, Category::count());
        $this->assertEquals(5 * 5, Log::count());
        $this->assertEquals(5 * 5, LogData::count());
        $this->assertEquals(5 * 5 * 5, LogFile::count());

        $project = Project::first();

        //Все записи правильно привязались
        $this->assertEquals(5, $project->categories()->first()->logs()->count());
        $this->assertEquals(1, $project->categories()->first()->logs()->first()->data()->count());
        $this->assertEquals(5, $project->categories()->first()->logs()->first()->files()->count());

        //Все классы соответствуют
        $this->assertInstanceOf(User::class, $project->users()->first());
        $this->assertInstanceOf(Log::class, $project->categories()->first()->logs()->first());
        $this->assertInstanceOf(LogData::class, $project->categories()->first()->logs()->first()->data()->first());
        $this->assertInstanceOf(LogFile::class, $project->categories()->first()->logs()->first()->files()->first());
    }
}
