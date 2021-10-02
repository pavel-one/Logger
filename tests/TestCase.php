<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function getToken()
    {
        /** @var User $user */
        $user = User::factory()->make();

        $response = $this->post(route('register'), [
            'name' => $user->name,
            'email' => $user->email,
            'password' => \Str::random(8)
        ]);

        return $response->json('token.token');
    }
}
