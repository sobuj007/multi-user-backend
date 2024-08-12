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
        Schema::create('services_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->decimal('servicePrice', 8, 2);
            $table->string('category');
            $table->string('img_url')->nullable();
            $table->string('subcategory');
            $table->json('time');
            $table->string('gender');
            $table->json('location');
            $table->decimal('rating', 2, 1);
            $table->string('available');
            $table->integer('slot');
            $table->json('bodypart');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_product');
    }
};
