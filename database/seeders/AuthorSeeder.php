<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::query()->create([
            'name' => 'Lil Peep'
        ]);

        Author::query()->create([
            'name' => 'Juice WRLD'
        ]);

        Author::query()->create([
            'name' => '$uicideboy$'
        ]);
    }
}
