<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected $token;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_registration()
    {
        /** @var User $user */
        $user = User::factory()->make();
        $response = $this->post(route('register'), [
            'name' => $user->name,
            'email' => $user->email,
            'password' => \Str::random(8)
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email'
            ],
            'token' => [
                'ttl',
                'token'
            ]
        ]);

        $this->assertDatabaseCount('users', 1);
        $model = User::whereEmail($user->email)->first();
        $this->assertModelExists($model);

        $this->token = $response->json('token.token');
    }

    public function test_checkGuardedRoutes()
    {
        $response = $this->get(route('get.user'));

        $response->assertStatus(401);
    }

    public function test_checkAuthRoutes()
    {
        $this->test_registration();

        $response = $this->get(
            route('get.user'),
            ['HTTP_Authorization' => "Bearer {$this->token}"])
        ;


        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email'
            ]
        ]);
    }
}
