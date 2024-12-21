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
                'address' => 'No 63, Jalan Beringin, Taman Melodies',
                'remark' => null,
                'pickup_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // For Registered User with Remark
            [
                'user_id' => 14, 
                'laundry_service_id' => 3, 
                'laundry_type_id' => 1, 
                'quantity' => 1,
                'total_amount' => 15,
                'status' => 'Assign Delivery',
                'order_method' => 'Pickup',
                'delivery_option' => true,
                'address' => 'No. 22B Jalan Pandan Indah 1/23A',
                'remark' => 'Tolong basuh elok-elok', 
                'pickup_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

             // For Registered User with Remark
             [
                'user_id' => 15, 
                'laundry_service_id' => 2, 
                'laundry_type_id' => 1, 
                'quantity' => 1,
                'total_amount' => 15,
                'status' => 'Assign Pickup',
                'order_method' => 'Pickup',
                'delivery_option' => true,
                'address' => '67, Jalan Tempinis Satu Lucky Garden Bangsar',
                'remark' => 'Baju mudah berbulu, jadi asingkan baju tersebut', 
                'pickup_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // For Registered User with Remark
            [
                'user_id' => 16, 
                'laundry_service_id' => 1, 
                'laundry_type_id' => 1, 
                'quantity' => 1,
                'total_amount' => 15,
                'status' => 'Assign Pickup',
                'order_method' => 'Pickup',
                'delivery_option' => true,
                'address' => ' PLOT 557 Lorong Perusahaan 4, Prai Free Trade Zone Phase 1',
                'remark' => 'Baju mudah koyak jadi sila basuh dengan cermat', 
                'pickup_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

             // For Registered User
             [
                'user_id' => 17, 
                'laundry_service_id' => 3, 
                'laundry_type_id' => 1, 
                'quantity' => 5,
                'total_amount' => 25,
                'status' => 'In Work',
                'order_method' => 'Pickup',
                'delivery_option' => false,
                'address' => 'No 213, Jln Bandar 2 Taman Melawati Hulu',
                'remark' => null,
                'pickup_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
