<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(49)->create();

        User::factory()->create([
            'name' => 'Jon Doe',
            'email' => 'jondoe@mail.com'
        ]);
    }
}
