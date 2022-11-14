<?php

namespace Database\Seeders;

use Faker\ORM\CakePHP\Populator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Populator::factory()->times(50)->create();
    }
}
