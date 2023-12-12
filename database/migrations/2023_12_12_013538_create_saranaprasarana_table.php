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
        Schema::create('saranaprasarana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usersid');
            $table->string('judul');
            $table->string('pictures');
            $table->enum('isactivesarana', ['Active', 'Non Active'])->default('Active');
            $table->timestamps();

            // Relation to table Users
            $table->foreign('usersid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saranaprasarana');
    }
};
