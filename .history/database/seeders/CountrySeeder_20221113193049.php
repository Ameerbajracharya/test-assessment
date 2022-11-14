<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['name'=>'Australia'],
            ['name'=>'China'],
            ['name'=>'India'],
            ['name'=>'UK'],
            ['name'=>'USA'],
        ];
        DB::table('countries')->insert($countries);
    }
}
