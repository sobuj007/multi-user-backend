<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateImageFilesTable extends Migration
{
    public function up()
    {
        Schema::create('certificate_image_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_image_id')->constrained()->onDelete('cascade');
            $table->string('path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificate_image_files');
    }
}
