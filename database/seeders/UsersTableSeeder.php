<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' =>  'Admin 1',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Admin',
                'contact_number' =>  '0123456789',
            ],

            //staff
            [
                'name' =>  'Kamal Afli',
                'email' => 'staff@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Staff',
                'contact_number' =>  '0123456789',
            ],

            //customer
            [
                'name' =>  'Siti Fatimah',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Customer',
                'contact_number' =>  '0123456789',
            ]
        ]);
    }
}
