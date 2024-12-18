<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('deliveries')->insert([
            // [
            //     'order_id' => 5 ,
            //     'pickup_id' => 5 ,
            //     'deliver_id' => 5 ,
            //     'proof_pickup' => 5 ,
            //     'proof_deliver'
            // ],

        ]);
        
    }
}
