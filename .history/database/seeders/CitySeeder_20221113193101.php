<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usertypes = [
            ['name'=>'Admin'],
            ['name'=>'Staff'],
            ['name'=>'Consultancy'],
            ['name'=>'Counselor'],
            ['name'=>'Student'],
        ];
        DB::table('user_types')->insert($usertypes);
    }
}
