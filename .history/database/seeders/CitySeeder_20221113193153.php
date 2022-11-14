<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['_name'=>'Australia'],
            ['_name'=>'China'],
            ['_name'=>'India'],
            ['_name'=>'UK'],
            ['_name'=>'USA'],
        ];
        DB::table('cities')->insert($cities);
    }
}
