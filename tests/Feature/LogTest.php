<?php

namespace Tests\Feature;

use App\Models\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class LogTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_createFullLog()
    {
        /** @var Log $log */
        $log = Log::factory()->make();

        $response = $this->post(route('create.log'), [
            'level' => $log->level,
            'message' => $log->message,
            'data' => $this->faker->arrayOf(15)->city,
            'file' => [
                UploadedFile::fake()->image('test.jpg'),
                UploadedFile::fake()->create('test.txt')
            ]
        ]);

        $response->assertStatus(201);
    }
}
