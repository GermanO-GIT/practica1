<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'suspenso',
            'drama',
            'comedia',
            'accion',
            'ciencia-ficcion',
        ];

        foreach ($genres as $genre) {
            Genre::firstOrCreate(['genre' => $genre]);
        }
    }
}
