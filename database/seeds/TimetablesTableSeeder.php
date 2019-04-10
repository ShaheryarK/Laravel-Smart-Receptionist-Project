<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TimetablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=0;
        foreach (range(1,10) as $index) {
            DB::table('timetables')->insert([
                'doctor_id' => $i++,
            ]);
        }
    }
}
