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
        Schema::create('galleryvideos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usersid');
            $table->string('judul');
            $table->text('picture')->nullable();
            $table->string('urlvideo')->nullable();
            $table->enum('jenis', ['Gallery', 'Video']);
            $table->enum('isactivegallery', ['Active', 'Non Active'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleryvideos');
    }
};
