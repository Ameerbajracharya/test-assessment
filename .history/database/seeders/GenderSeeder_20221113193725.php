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
            ['gender'=>'Australia'],
            ['gender'=>'China'],
            ['gender'=>'India'],
            ['gender'=>'UK'],
            ['gender'=>'USA'],
        ];
        DB::table('genders')->insert($genders);
    }
}
