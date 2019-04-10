<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $this->call(PatientsTableSeeder::class);
        $this->call(ManagersTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
         $this->call(DoctorsTableSeeder::class);
        //$this->call(TimetablesTableSeeder::class);
        //$this->call(TimeslotsTableSeeder::class);
       // $this->call(AppointmentsTableSeeder::class);
        //$this->call(consultanciesTableSeeder::class);


        //$this->call(FeedbacksTableSeeder::class);
    }
}
