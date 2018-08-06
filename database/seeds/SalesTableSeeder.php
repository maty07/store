<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Sale::class, 20)->create()
			->each(function(App\Sale $sale){
				$sale->products()->attach([
					rand(1, 99), 
					rand(100, 199),
					rand(200,300),
				]);
			});
    }
}
