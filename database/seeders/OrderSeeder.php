<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([

            // For Registered User
            [
                'user_id' => 2, 
                'laundry_service_id' => 1, 
                'laundry_type_id' => 1, 
                'quantity' => 5,
                'total_amount' => 25,
                'status' => 'In Work',
                'order_method' => 'Pickup',
                'delivery_option' => true,
                'address' => 'XXXXXXXXXXXXXX',
                'remark' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // For Registered User with Remark
            [
                'user_id' => 2, 
                'laundry_service_id' => 3, 
                'laundry_type_id' => 1, 
                'quantity' => 1,
                'total_amount' => 15,
                'status' => 'In Work',
                'order_method' => 'Pickup',
                'delivery_option' => true,
                'address' => 'XXXXXXXXXXXXXX',
                'remark' => 'Tolong basuh elok-elok', 
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
