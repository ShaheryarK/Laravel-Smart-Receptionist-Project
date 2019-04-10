<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PatientsTableSeeder extends Seeder
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
            DB::table('Patients')->insert([
                'firstname' => $faker->name,
                'lastname' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'phonenumber' => $faker->phoneNumber,
                'gender' => "male",
                'DOB'=> $faker->date('Y-m-d'),
            ]);
        }
    }
}
