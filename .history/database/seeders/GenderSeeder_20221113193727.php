<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['gender_title'=>'Australia'],
            ['gender_title'=>'China'],
            ['gender_title'=>'India'],
            ['gender_title'=>'UK'],
            ['gender_title'=>'USA'],
        ];
        DB::table('genders')->insert($genders);
    }
}
