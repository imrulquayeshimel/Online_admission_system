<?php

use Illuminate\Database\Seeder;
use App\Models\Admission\Form\Student;
use App\Models\Admission\Form\Parents;
use App\Models\Admission\Form\Payment;
use App\Models\Admission\Form\Guardian;
use App\Models\Admission\Form\EducationalQualification as EQ;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(App\User::class)->create();

        // factory(Student::class,50)->create()->each(function($student)
        // {
        //     $student->educationalQualification()->save(factory(Parents::class)->make());
        //     $student->educationalQualification()->save(factory(Payment::class)->make());
        //     $student->educationalQualification()->save(factory(Guardian::class)->make());
        //     $student->educationalQualification()->save(factory(EQ::class)->make());
        // });
    }
}
