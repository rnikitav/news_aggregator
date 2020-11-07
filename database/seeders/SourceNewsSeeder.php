<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('source_news')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Factory::create();
        $count = 10;
        $data = [];
        $value = $faker->randomElements([
            'THE WASHINGTON POST', 'RBC', 'BBC',
            'charlie hebdo', 'THE NEW YORK TIMES',
            'THE GUARDIAN', 'THE DAILY TELEGRAPH',
            'THE TIMES', 'FINANCIAL TIMES', 'THE ECONOMIST', 'Yandex News'],$count, false);
        for ($i = 0; $i < $count; $i++){

            $data[] = [
            'name' => $value[$i]
                ];
        }
        return $data;
    }
}
