<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            ['country_name'=>'Australia'],
            ['country_name'=>'China'],
            ['country_name'=>'India'],
            ['country_name'=>'UK'],
            ['country_name'=>'USA'],
        ];
        DB::table('genders')->insert($genders);
    }
}
