<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Factory::create();
        $count = 10;
        $data = [];
        for ($i = 0; $i < $count; $i++){

            $data[] = [
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->email,
                'password' => $faker->password(4, 10),
                'phone' => $faker->numberBetween(100, 999) . $faker->numberBetween(0000000, 9999999),
                'gender' =>$faker->randomElement(['f', 'm']),
                'birthday' => $faker->date('Y-m-d'),
                'hometown' => $faker->city,
                'photo' => $faker->image(),
                'created_at' => $faker->dateTime
            ];
        }
        return $data;
    }
}
