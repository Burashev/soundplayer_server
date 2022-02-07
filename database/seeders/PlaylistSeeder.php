<?php

namespace Database\Seeders;

use App\Models\Playlist;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $playlist_1 = Playlist::query()->create([
            'title' => 'Playlist 1',
            'on_main' => 1,
        ]);

        $playlist_2 = Playlist::query()->create([
            'title' => 'Playlist 2',
            'on_main' => 1,
        ]);

        $playlist_1->songs()->attach(1);
        $playlist_1->songs()->attach(2);
    }
}
