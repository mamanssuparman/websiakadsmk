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
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kajurid');
            $table->string('sinonim');
            $table->string('judul');
            $table->text('slug')->nullable();
            $table->text('logoprodi');
            $table->text('description');
            $table->enum('isactiveprodi', ['Active', 'Non Active'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodis');
    }
};
