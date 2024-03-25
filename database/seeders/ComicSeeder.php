<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_data = config('comics');

        foreach ($file_data as $data) {
            $comic = new Comic;
            $comic->fill($data);
            $comic->save();
        }
    }
}
