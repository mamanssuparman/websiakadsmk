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
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usersid');
            $table->string('namamitra');
            $table->string('picture');
            $table->enum('statusmitra',['Active', 'Non Active'])->default('Active');
            $table->timestamps();
        });

        // Relasi ke Table Users
        Schema::table('mitra', function(Blueprint $table){
            $table->foreign('usersid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra');
    }
};
