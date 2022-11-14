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
            ['groups_title'=>'Child'],
            ['groups_title'=>'Old'],
            ['groups_title'=>'Young'],
        ];
        DB::table('groups')->insert($groups);
    }
}