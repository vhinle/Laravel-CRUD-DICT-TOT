<?php

namespace Database\Seeders;

use App\Models\Movie; // Import the Movies model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Seed the movies table with 100 movie records using the Movie factory.
         */
        Movie::factory(100)->create();
    }
}
