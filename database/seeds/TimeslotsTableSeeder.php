<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TimeslotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('Timeslots')->insert([
                'timetable_id'=>rand(1,3),
                'start time' => $faker->time('H:i:s'),
                'stop time' => $faker->time('H:i:s'),
            ]);
        }
    }
}
