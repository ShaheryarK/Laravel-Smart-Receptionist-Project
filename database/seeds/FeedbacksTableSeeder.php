<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FeedbacksTableSeeder extends Seeder
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
            DB::table('feedback')->insert([
                'appointment_id'=>4,
                'rating' => $faker->randomDigit(1,5),
                'comment'=> $faker->text,
            ]);
        }
    }
}
