<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('Departments')->insert(
                [
            'name'=> 'Psychiatry',
            'Description'=> 'Department of Psychiatry at MIH provides comprehensive, specialized psychiatric inpatient, outpatient and acute care to adults, adolescents and children.']
            );
        DB::table('Departments')->insert(
            [
                'name'=> 'Dental',
                'Description'=> 'Hospital proudly introduces a full range of dental care to children and adults. Supervised by a team of experts, we ensure to provide best dental care to help everyone smile again with full confidence.'
            ]);
        DB::table('Departments')->insert(
            [
                    'name'=> 'Cardiology',
                    'Description'=> 'ncreasing heart diseases in current era have added special emphasis to the field of heart care. For healthy life, it is crucial and sensitive; and needs extra care. The team of cardiologists, nurses and other specialists at MIH ensure collectively dedicated efforts to providing a full spectrum of cardiac services for patients with congenital heart disease and other rare heart conditions. MIH emergency department is ready round the clock to deal with all sorts of cardiac patients under the supervision of highly qualified cardiologists.'
            ]);
        DB::table('Departments')->insert(
            [
            'name'=> 'Dermatology',
            'Description'=> 'Dermatology clinic has been working with patients to provide the best dermatological care for patients at MAROOF International Hospital Islamabad. '
            ]);
        DB::table('Departments')->insert(
            [
                    'name'=> 'Orthopedic',
                    'Description'=> 'Orthopedic Surgery is the surgical treatment of musculus-skeletal diseases and injuries. These diseases can impair physical activity and the aim of Orthopedic Surgery is always to attempt to restore lost function, allowing the patient to return to their former way of life.'
                ]);
        DB::table('Departments')->insert([
            'name'=> 'Pediatric',
            'Description'=> 'Maroof’s efforts of taking healthcare to the next level are not just limited to the adults but the children’s health is considered no less.'
        ]);

    }
}
