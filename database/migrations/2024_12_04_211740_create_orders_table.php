<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->string('name')->nullable(); // For unregistered customers
            $table->string('email')->nullable(); // For unregistered customers
            $table->string('phone_number', 15)->nullable(); // For unregistered customers
            $table->string('laundry_type');
            $table->string('service');
            $table->text('remark')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['Pending', 'In Work', 'Pay', 'Complete'])->default('Pending');
            $table->enum('order_method', ['Walk in', 'Pickup']);
            $table->boolean('delivery_option')->default(false);
            $table->text("address")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
