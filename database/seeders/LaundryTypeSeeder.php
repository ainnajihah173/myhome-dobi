<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaundryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laundry_types')->insert([

            [
                'laundry_name' => 'Clothes',
            ],

            [
                'laundry_name' => 'Bedsheets',
            ],
            
            [
                'laundry_name' => 'Curtains',
            ],

        ]);
    }
}
