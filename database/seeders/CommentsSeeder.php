<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Factory::create();
        $count = 10;
        $data = [];
        for ($i = 0; $i < $count; $i++){

            $data[] = [
                'user_id' => $faker->numberBetween(1 , 22),
                'news_id' => $faker->numberBetween(1, 31),
                'body' => $faker->text(40),
                'useful' => $faker->numberBetween(0, 999),
                'unuseful' => $faker->numberBetween(0, 999),
                'created_at' => $faker->dateTime
            ];
        }
        return $data;
    }
}
