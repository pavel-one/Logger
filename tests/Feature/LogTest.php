<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class LogTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Создание лога без данных и файлов
     */
    public function test_createSimpleLog()
    {
        /** @var Log $log */
        $log = Log::factory()->make();
        /** @var Category $category */
        $category = Category::factory()->make();

        $response = $this->post(
            route('create.log'),
            [
                'level' => Log::getLevelName($log->level),
                'message' => $log->message,
                'category' => $category->name,
            ],
            ['HTTP_Authorization' => "Bearer {$this->getToken()}"]
        );

        $response->assertStatus(201);

        /** @var Category $category */
        $category = Category::whereName($category->name)->first();
        /** @var Log $log */
        $log = $category->logs()->first();

        $this->assertModelExists($category);
        $this->assertModelExists($log);

        $this->assertEquals(1, $category->logs()->count());
        $this->assertEquals(0, $log->data()->count());
        $this->assertEquals(0, $log->files()->count());
    }

    /**
     * Создание лога с данными, без файлов
     */
    public function test_createDataLog()
    {
        /** @var Log $log */
        $log = Log::factory()->make();
        /** @var Category $category */
        $category = Category::factory()->make();

        $response = $this->post(
            route('create.log'),
            [
                'level' => Log::getLevelName($log->level),
                'message' => $log->message,
                'category' => $category->name,
                'data' => Log::getLevels()
            ],
            ['HTTP_Authorization' => "Bearer {$this->getToken()}"]
        );

        $response->assertStatus(201);

        /** @var Category $category */
        $category = Category::whereName($category->name)->first();
        /** @var Log $log */
        $log = $category->logs()->first();

        $this->assertModelExists($category);
        $this->assertModelExists($log);

        $this->assertEquals(1, $category->logs()->count());
        $this->assertEquals(1, $log->data()->count());
        $this->assertEquals(0, $log->files()->count());
    }

    /**
     * Создание лога с данными и файлами
     */
    public function test_createFullLog()
    {
        /** @var Log $log */
        $log = Log::factory()->make();
        /** @var Category $category */
        $category = Category::factory()->make();

        $response = $this->post(
            route('create.log'),
            [
                'level' => Log::getLevelName($log->level),
                'message' => $log->message,
                'category' => $category->name,
                'data' => Log::getLevels(),
                'files' => [
                    UploadedFile::fake()->image('photo1.png'),
                    UploadedFile::fake()->create('test.txt')
                ]
            ],
            ['HTTP_Authorization' => "Bearer {$this->getToken()}"]
        );

        $response->assertStatus(201);

        /** @var Category $category */
        $category = Category::whereName($category->name)->first();
        /** @var Log $log */
        $log = $category->logs()->first();

        $this->assertModelExists($category);
        $this->assertModelExists($log);

        $this->assertEquals(1, $category->logs()->count());
        $this->assertEquals(1, $log->data()->count());
        $this->assertEquals(2, $log->files()->count());
    }
}
