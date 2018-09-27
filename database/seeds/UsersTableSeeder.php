<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\User::create([
    		'rut' => '1111111-1',
    		'first_name' => 'admin',
    		'last_name' => '1',
    		'email' => 'admin@gmail.com',
    		'password' => bcrypt(123456),
    		'address' => 'talca', 
    		'phone' => '454576765',
    		'role' => 'Admin',
    	]);

         factory(App\User::class, 10)->create();
    }
}
