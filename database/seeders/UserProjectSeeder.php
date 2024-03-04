<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        DB::table('user_projects')->insert([
            'user_id' => '1',
            'project_id' => '1'
        ]);

        DB::table('user_projects')->insert([
            'user_id' => '1',
            'project_id' => '2'
        ]);

        DB::table('user_projects')->insert([
            'user_id' => '1',
            'project_id' => '3'
        ]);

        DB::table('user_projects')->insert([
            'user_id' => '1',
            'project_id' => '4'
        ]);

        DB::table('user_projects')->insert([
            'user_id' => '1',
            'project_id' => '5'
        ]);

    }
}
