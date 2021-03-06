<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$name = 'Hombre';
        Genre::create([
        	'name' => $name,
        	'slug' => str_slug($name),
            'active' => 1
        ]);

        $name1 = 'Mujer';
        Genre::create([
        	'name' => $name1,
        	'slug' => str_slug($name1),
            'active' => 1
        ]);

        $name2 = 'Niño';
        Genre::create([
        	'name' => $name2,
        	'slug' => str_slug($name2),
            'active' => 1
        ]);

        $name3 = 'Niña';
        Genre::create([
        	'name' => $name3,
        	'slug' => str_slug($name3),
            'active' => 1
        ]);
    }
}
