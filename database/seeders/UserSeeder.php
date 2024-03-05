<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();

        DB::table('users')->insert([
            'name' => 'Test',
            'last_name' => 'Test',
            'email' => "Test@email.com",
            'password' => Hash::make('1234'),
        ]);
    }
}
