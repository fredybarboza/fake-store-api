<?php

namespace Tests\Feature\Controllers\Auth;

use App\Models\User;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    public function testUserCanLogin(): void
    {
        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password()
        ]);

        $loginData = [
            'email' => $user->email,
            'password' => $user->password
        ];

       $response = $this->postJson('/api/v1/auth/login', $loginData);

       $response->assertStatus(200)->assertJsonStructure([
            'access_token'
       ]);
    }
}
