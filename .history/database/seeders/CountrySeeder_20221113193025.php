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
        $usertypes = [
            ['name'=>'Australia'],
            ['name'=>'Staff'],
            ['name'=>'Consultancy'],
            ['name'=>'Counselor'],
            ['name'=>'Student'],
        ];
        DB::table('countries')->insert($usertypes);
    }
}
