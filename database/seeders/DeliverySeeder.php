<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the specific image you want to copy
        $imageToStore = 'pic4.jpeg';

        // Store the specific image
        $this->storeImage($imageToStore);


        DB::table('deliveries')->insert([

            [
                'order_id' => 1,
                'pickup_id' => 6,
                'deliver_id' => NULL,
                'delivery_date' => NULL,
                'proof_pickup' => NULL,
                'proof_deliver' =>  NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'order_id' => 2,
                'pickup_id' => 7,
                'deliver_id' => NULL,
                'delivery_date' => NULL,
                'proof_pickup' => $imageToStore,
                'proof_deliver' =>  NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'order_id' => 5,
                'pickup_id' => 6,
                'deliver_id' => NULL,
                'delivery_date' => NULL,
                'proof_pickup' => $imageToStore,
                'proof_deliver' =>  NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
    private function storeImage($image)
    {
        $sourceImagePath = database_path("seeders/images/{$image}"); // Adjust the path as necessary
        $destinationImagePath = "public/banner/{$image}"; // This is where you want to store it

        // Check if the source image exists
        if (File::exists($sourceImagePath)) {
            // Copy the image to the storage
            Storage::disk('public')->putFileAs('banner', new File($sourceImagePath), $image);
        }
    }
}
