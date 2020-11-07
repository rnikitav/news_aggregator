<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Factory::create();
        $count = 30;
        $data = [];
        for ($i = 0; $i < $count; $i++){
            $data[] = [
                'idCategory' => $faker->numberBetween(1, 9),
                'source_id' => $faker->numberBetween(1, 10),
                'slug' => $faker->word,
                'title' => $faker->sentence(rand(3, 7)),
                'desc' => $faker->sentence(4),
                'views' => $faker->numberBetween(0, 999),
                'likes' => $faker->numberBetween(0, 999),
                'dislikes' => $faker->numberBetween(0, 999),
                'img' => $faker->image(),
                'body' => '<p>' . $faker->sentence(rand(67 , 75)) . '</p>' .
                    '<p>'. $faker->sentence(rand(45 , 55)) . '</p>' .
                    '<h3>'. $faker->sentence(rand(3 , 5)) .  '</h3>' .
                    '<p>' . $faker->sentence(rand(47 , 57)) . '</p>' .
                    '<ul>' .
                        '<li>'. $faker->sentence(rand(10, 15)). '</li>'.
                        '<li>'. $faker->sentence(rand(10, 15)). '</li>'.
                        '<li>'. $faker->sentence(rand(10, 15)). '</li>'.
                        '<li>'. $faker->sentence(rand(10, 15)). '</li>'.
                    '</ul>'.
                    '<p>'. $faker->sentence(rand(75 , 85)) . '</p>'
                ,
                'is_private' =>$faker->numberBetween(0 , 1),
                'created_at' => $faker->dateTime
            ];
        }
        return $data;
    }
}
