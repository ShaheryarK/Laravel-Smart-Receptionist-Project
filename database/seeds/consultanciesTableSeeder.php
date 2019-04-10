<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class consultanciesTableSeeder extends Seeder
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
            DB::table('consultancies')->insert([
                'Doctor_id'=>rand(1,5),
                'start time' => $faker->time('H:i:s'),
                'end time' => $faker->time('H:i:s'),
            ]);
        }
    }
}
