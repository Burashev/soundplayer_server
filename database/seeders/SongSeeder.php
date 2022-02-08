<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $folder = 'seeders/';

        Song::query()->create([
            'title' => 'Awful Things',
            'author_id' => 1,
            'source' => $folder . 'Awful Things.mp3',
            'duration' => 123,
        ]);

        Song::query()->create([
            'title' => 'Beamer Boy',
            'author_id' => 1,
            'source' => $folder . 'Beamer Boy.mp3',
            'duration' => 123,
        ]);


        Song::query()->create([
            'title' => 'All Girls Are the Same',
            'author_id' => 2,
            'source' => $folder . 'All Girls Are the Same.mp3',
            'duration' => 123,
        ]);

        Song::query()->create([
            'title' => 'Already Dead',
            'author_id' => 2,
            'source' => $folder . 'Already Dead.mp3',
            'duration' => 123,
        ]);


        Song::query()->create([
            'title' => 'Magazine',
            'author_id' => 3,
            'source' => $folder . 'Magazine.mp3',
            'duration' => 123,
        ]);

        Song::query()->create([
            'title' => 'LTE',
            'author_id' => 3,
            'source' => $folder . 'LTE.mp3',
            'duration' => 123,
        ]);

    }
}
