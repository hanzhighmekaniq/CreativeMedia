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
        Schema::create('slide_img_home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**home
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slide_img_home_pages');
    }
};
