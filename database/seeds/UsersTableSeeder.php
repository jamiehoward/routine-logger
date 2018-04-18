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
        factory(User::class)->create([
        	'name' => 'Testing User',
        	'email' => 'test@example.com',
        	'password' => bcrypt('test123'),
        ]);
    }
}
