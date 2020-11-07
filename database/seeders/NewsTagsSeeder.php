<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_tags')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Factory::create();
        $count = 10;
        $data = [];
        for ($i = 0; $i < $count; $i++){

            $data[] = [
                'news_id' => $faker->numberBetween(1 , 31),
                'tag_id' => $faker->numberBetween(1, 15)
            ];
        }
        return $data;
    }
}
