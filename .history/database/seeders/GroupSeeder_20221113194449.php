<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            ['grou_title'=>'Old'],
            ['grou_title'=>'Young'],
            ['grou_title'=>'Child'],
        ];
        DB::table('groups')->insert($groups);
    }
}
