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
                'status' => 'Assign Pickup',
                'order_method' => 'Pickup',
                'delivery_option' => true,
                'address' => 'XXXXXXXXXXXXXX',
                'remark' => null,
                'pickup_date' => now(),
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
                'status' => 'Assign Pickup',
                'order_method' => 'Pickup',
                'delivery_option' => true,
                'address' => 'XXXXXXXXXXXXXX',
                'remark' => 'Tolong basuh elok-elok', 
                'pickup_date' => now(),
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
                'status' => 'Assign Pickup',
                'order_method' => 'Pickup',
                'delivery_option' => true,
                'address' => 'XXXXXXXXXXXXXX',
                'remark' => 'Baju Berbulu', 
                'pickup_date' => now(),
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
                'status' => 'Assign Pickup',
                'order_method' => 'Pickup',
                'delivery_option' => true,
                'address' => 'XXXXXXXXXXXXXX',
                'remark' => 'Baju koyak jadi basuh elok', 
                'pickup_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
