<?php

use Faker\Generator as Faker;

use App\Models\Admission\Form\Student;
use App\Models\Admission\Form\Parents;
use App\Models\Admission\Form\Payment;
use App\Models\Admission\Form\Guardian;
use App\Models\Admission\Form\EducationalQualification as EQ;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'), // 123456
        'is_admin' => 1,
        'status' => 1,
        'remember_token' => str_random(10),
    ];
});

// student
$factory->define(Student::class, function (Faker $faker) {
    static $order = 20181001;
    return [
        'name'              => $faker->name,
        'dob'               => $faker->date(),
        'exam_roll'         => $order++,
        'gender'            => $faker->numberBetween($min = 1, $max = 2),
        'photo'             => '1538654746.jpg',
        'blood_group'       => $faker->numberBetween($min = 1, $max = 8),
        'email'             => $faker->email,
        'contact_number'    => '01700123456',
        'present_address'   => $faker->text,
        'permanent_address' => $faker->text,
        'nationality'       => 'Bangladeshi',
        'religion'          => 'Islam',
        'signature'         => '1538654746.png',
        'reg_token'         => rand(1000,9999).chr(rand(65,90)).rand(10,99).chr(rand(65,90)).chr(rand(65,90)).rand(100,900),
        'department_id'     => $faker->numberBetween($min = 1, $max = 4),
        'status'            => $faker->numberBetween($min = 0, $max = 1),
        'exam_season_id'    => 1,
    ];
});

// Educational Qualification
$factory->define(EQ::class, function (Faker $faker) {
    return [
        'ssc_board'             => $faker->randomElement(['Dhaka','Comilla','Rajshahi']),
        'ssc_name_of_institute' => 'ABN school',
        'ssc_passing_year'      => '2010',
        'ssc_gpa'               => '5.00',
        'ssc_marksheet'         => '1538655263.jpg',
        'hsc_board'             => $faker->randomElement(['Dhaka','Comilla','Rajshahi']),
        'hsc_name_of_institute' => 'ABN collage',
        'hsc_passing_year'      => '2012',
        'hsc_gpa'               => '5.00',
        'hsc_marksheet'         => '1538654746.png',
    ];
});

// Parents
$factory->define(Parents::class, function (Faker $faker) {
    return [
        'father_name'       => $faker->name,
        'father_occupation' => $faker->randomElement(['Job','Beussman']),
        'father_contact'    => '01700123456',
        'father_photo'      => '1538654746.jpg',
        'mother_name'       => $faker->name,
        'mother_occupation' => $faker->randomElement(['Job','House Wife']),
        'mother_contact'    => '01700123456',
        'mother_photo'      => '1538654746.jpg',
    ];
});

// Guardian
$factory->define(Guardian::class, function (Faker $faker) {
    return [
        'name'                    => $faker->name,
        'photo'                   => '1538654746.jpg',
        'occupation'              => $faker->randomElement(['Job','Beussman']),
        'salary'                  => $faker->randomElement(['12000','24000']),
        'email'                   => $faker->email,
        'contact_number'          => '01700123456',
        'relationship_of_student' => $faker->randomElement(['Brother','Father','Mother']),
        'signature'               => '1538654746.png',
    ];
});

// Payment
$factory->define(Payment::class, function (Faker $faker) {
    return [
        'payment_method'     => $faker->numberBetween($min = 1, $max = 2),
        'transaction_number' => '01700123456',
        'txn_id'             => $faker->bankAccountNumber,
    ];
});
