<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;


    public function test_create_project()
    {
        $token = $this->getToken();

        $response = $this->post(route('create.project'), [
            'name' => 'Тестовый проект',
            'users' => [
                User::first()->id
            ]
        ], ['HTTP_Authorization' => "Bearer {$token}"]);


        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'users' => [
                    [
                        'id',
                        'name',
                        'email'
                    ]
                ]
            ]
        ]);

        return $response->json();
    }
}
