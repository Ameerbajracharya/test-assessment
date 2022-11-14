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
            ['city_name'=>'Australia', ],
            ['city_name'=>'China', ],
            ['city_name'=>'India', ],
            ['city_name'=>'UK', ],
            ['city_name'=>'USA', ],
        ];
        DB::table('cities')->insert($cities);
    }
}
