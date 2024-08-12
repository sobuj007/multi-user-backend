<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesImagesTable extends Migration
{
    public function up()
    {
        Schema::create('service_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('service_image_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_image_id');
            $table->string('path');
            $table->foreign('service_image_id')->references('id')->on('service_images')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_image_files');
        Schema::dropIfExists('service_images');
    }
}
