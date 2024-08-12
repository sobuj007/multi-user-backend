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
        // Schema::create('orders', function (Blueprint $table) {
        //     $table->id(); // Auto-incrementing ID
        //     $table->string('name'); // Order name
        //     $table->string('img')->nullable(); // Image URL or path
        //     $table->time('selectedTime'); // Selected time
        //     $table->date('selectedDate'); // Selected date
        //     $table->integer('selectedServicsQun'); // Quantity of selected services
        //     $table->integer('selectedProductQun'); // Quantity of selected products
        //     $table->string('orderfor'); // Order for (e.g., service/product)
        //     $table->foreignId('services_product_id')->constrained()->onDelete('cascade'); // Foreign key for services_product
        //     $table->string('orderstatus')->default(''); // Order status
        //     $table->timestamps(); // Created at and updat
        // });
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the order
            $table->string('img'); // Image associated with the order
            $table->string('selectedTime'); // Selected time for the order
            $table->date('selectedDate'); // Selected date for the order
            $table->integer('selectedServicsQun')->default(1); // Quantity of selected services
            $table->integer('selectedProductQun')->default(1); // Quantity of selected products
            $table->string('orderfor'); // Who the order is for
            $table->unsignedBigInteger('orderby'); // ID of the user who made the order
            $table->foreign('orderby')->references('id')->on('users')->onDelete('cascade'); // Foreign key reference to users table
            $table->json('product'); // Service product details, stored as JSON
            $table->string('orderstatus')->default(''); // Status of the order
            $table->timestamps(); // Timestamps for created_at and updated_at
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
