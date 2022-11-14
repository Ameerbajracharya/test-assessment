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
            ['countryname'=>'Australia'],
            ['countryname'=>'China'],
            ['countryname'=>'India'],
            ['countryname'=>'UK'],
            ['countryname'=>'USA'],
        ];
        DB::table('countries')->insert($countries);
    }
}
