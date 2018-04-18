<?php

use App\Models\Routine;
use Illuminate\Database\Seeder;

class RoutinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('routines')->truncate();

        factory(Routine::class, 5)->create(['user_id' => 1]);
    }
}
