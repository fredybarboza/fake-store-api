<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function testIndexReturnsDataInValidFormat(): void
    {
        $response = $this->getJson('/api/v1/categories');

        $response->assertStatus(200)->assertJsonStructure([
            '*' => [
                'id',
                'name'
            ]
        ]);
    }
}
