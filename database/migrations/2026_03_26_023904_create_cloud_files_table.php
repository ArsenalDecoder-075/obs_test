<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cloud_files', function (Blueprint $table) {
            $table->id();
            $table->string('custom_file_name');
            $table->string('uploader_name');
            $table->text('description')->nullable();
            $table->date('upload_date');
            $table->string('file_path');
            $table->string('file_type');
            $table->string('file_size');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cloud_files');
    }
};
