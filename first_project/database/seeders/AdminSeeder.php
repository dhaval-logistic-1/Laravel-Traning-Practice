<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Pest\Support\Str;
use Faker\Factory as Faker;
use phpDocumentor\Reflection\Types\Integer;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {

            $user = new User();

            $user->first_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->email = $faker->unique()->safeEmail;
            $user->password = Hash::make('password');
            $user->gender = $faker->randomElement(['male', 'female']);
            $user->mo_no  = $faker->phoneNumber;

            $user->save();
        }


        // DB::table('users')->insert([
        //     'first_name' => Str::random(10),
        //     'last_name' => Str::random(10),
        //     'email' => Str::random(10) . '@gmail.com',
        //     'password' => Hash::make('password'),
        //     'gender' => 'male',
        //     'mo_no' => rand(1000000000, 9999999999),
        // ]);
    }
}
