<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class AppointmentsTableSeeder extends Seeder
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
            DB::table('appointments')->insert([
                'Doctor_id'=>$faker->randomDigit,
                'Patient_id'=>$faker->randomDigit,
                'started time' => $faker->time('H:i:s'),
                'end time' => $faker->time('H:i:s'),

            ]);
        }
    }
}
