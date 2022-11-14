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
            ['group_title'=>'Old'],
            ['group_title'=>'Young'],
            ['group_title'=>'Child'],
        ];
        DB::table('groups')->insert($groups);
    }
}
