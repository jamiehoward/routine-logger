<?php

use App\Models\Entry;
use App\Models\Routine;
use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('entries')->truncate();

        foreach (Routine::get() as $routine) {
            factory(Entry::class, 5)->states($routine->type)->create(['routine_id' => $routine->id]);
        }
    }
}
