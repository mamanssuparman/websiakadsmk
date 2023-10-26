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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('slug')->nullable();
            $table->text('headerpicture');
            $table->unsignedBigInteger('categoriesid');
            $table->text('article');
            $table->unsignedBigInteger('usersid');
            $table->enum('isactivearticle', ['Active', 'Non Active'])->default('Non Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
