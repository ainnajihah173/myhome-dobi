<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaundryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laundry_services')->insert([

            [
                'service_name' => 'Wash & Fold',
                'laundry_type_id' => '1',
                'price' => '3.0',
            ],

            [
                'service_name' => 'Wash & Iron',
                'laundry_type_id' => '1',
                'price' => '5.0',
            ],
            
            [
                'service_name' => 'Dry Cleaning',
                'laundry_type_id' => '1',
                'price' => '7.0',
            ],

        ]);
    }
}
