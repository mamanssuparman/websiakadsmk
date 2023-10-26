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
        Schema::create('ekstras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembinaid');
            $table->string('sinonim')->nullable();
            $table->string('judul');
            $table->text('slug');
            $table->text('headerpicture');
            $table->text('description');
            $table->enum('isactiveekstra', ['Active', 'Non Active'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstras');
    }
};
