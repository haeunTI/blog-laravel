<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB as FacadesDB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('users')->insert([

            [
                'name'=> 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345'),
                'role' => 'admin',
                'status' => 'active',

            ],

            [
                'name'=> 'Agent',
                'username' => 'agent',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('12345'),
                'role' => 'agent',
                'status' => 'active',
            ],

            [
                'name'=> 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345'),
                'role' => 'user',
                'status' => 'active',
            ]
        ]);
    }
}
