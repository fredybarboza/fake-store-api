<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('categories')->insert([
        ['name' => 'Electronics and Technology'],
        ['name' => 'Clothing and Fashion'],
        ['name' => 'Home and Decor'],
        ['name' => 'Others']
       ]);
    }
}