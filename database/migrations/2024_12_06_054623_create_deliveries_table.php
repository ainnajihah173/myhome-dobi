<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(); //registered user
            $table->foreignId('guest_id')->nullable(); //unregistered user
            $table->foreignId('order_id')->nullable(); //order details
            $table->string('pickup_driver')->nullable();
            $table->string('deliver_driver')->nullable();
            $table->datetime('delivery_date')->nullable();
            $table->string('proof_pickup')->nullable();
            $table->string('proof_deliver')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
