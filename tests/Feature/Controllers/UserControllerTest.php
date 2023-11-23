<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testIndexReturnsDataInValidFormat(): void
    {
        $response = $this->getJson('/api/v1/users');

        $response->assertStatus(200)->assertJsonStructure(
            [
                'current_page',
                'total_pages',
                'users_per_page',
                'total_users',
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'email',
                        'password'
                    ]
                ]
            ]);

    }

    public function testUserIsCreatedSuccessfully(): void
    {
        $user = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password()
        ];

        $response = $this->postJson('/api/v1/users', $user);

        $response->assertStatus(201)->assertJsonStructure([
            'id',
            'name',
            'email',
            'password'
        ]);

        $this->assertDatabaseHas('users', $user);
    }

    public function testUserIsShownCorrectly(): void
    {
        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password()
        ]);

        $response = $this->getJson('/api/v1/users/' . $user->id);

        $response->assertStatus(200)->assertExactJson([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password
        ]);
    }

    public function testUserIsUpdated(): void
    {
        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password()
        ]);

        $payload = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password()
        ];

        $response = $this->putJson('/api/v1/users/' . $user->id, $payload);

        $response->assertStatus(200)->assertExactJson([
            'id' => $user->id,
            'name' => $payload['name'],
            'email' => $payload['email'],
            'password' => $payload['password']
        ]);
    }

    public function testUserIsDestroyed(): void
    {
        $userData = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password()
        ];

        $user = User::create(
            $userData
        );

        $response = $this->deleteJson('/api/v1/users/' . $user->id);

        $response->assertStatus(200)->assertExactJson([
            'message' => 'User deleted',
            'user_id' => strval($user->id)
        ]);

        $this->assertDatabaseMissing('users', $userData);

    }
    
}
