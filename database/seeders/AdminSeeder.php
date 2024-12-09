<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Admin', // Change as needed
            'email' => 'admin@gmail.com', // Change as needed
            'password' => Hash::make('admin'), // Change as needed
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
