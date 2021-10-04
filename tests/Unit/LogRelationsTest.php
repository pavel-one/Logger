<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Log;
use App\Models\LogData;
use App\Models\LogFile;
use App\Models\User;
use Database\Factories\LogFactory;
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
        $this->assertEquals(5, Category::count());
        $this->assertEquals(5 * 5, Log::count());
        $this->assertEquals(5 * 5, LogData::count());
        $this->assertEquals(5 * 5 * 5, LogFile::count());

        $category = Category::first();

        //Все записи правильно привязались
        $this->assertEquals(5, $category->logs()->count());
        $this->assertEquals(1, $category->logs()->first()->data()->count());
        $this->assertEquals(5, $category->logs()->first()->files()->count());

        //Все классы соответствуют
        $this->assertInstanceOf(User::class, $category->user);
        $this->assertInstanceOf(Log::class, $category->logs()->first());
        $this->assertInstanceOf(LogData::class, $category->logs()->first()->data()->first());
        $this->assertInstanceOf(LogFile::class, $category->logs()->first()->files()->first());
    }
}
