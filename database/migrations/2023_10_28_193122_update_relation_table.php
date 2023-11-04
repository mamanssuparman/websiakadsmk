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
        // Relasi tabel Mata Pelajaran
        Schema::table('mapelajarguru', function(Blueprint $table){
            $table->foreign('guruid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mapelid')->references('id')->on('mapel')->onDelete('cascade')->onUpdate('cascade');
        });

        // Relasi Tabel Ekstrakurikuler
        Schema::table('ekstras', function(Blueprint $table){
            $table->foreign('pembinaid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        // Relasi Tabel Article
        Schema::table('articles', function(Blueprint $table){
            $table->foreign('categoriesid')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('usersid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        // Relasi Tabel Comments
        Schema::table('comments', function(Blueprint $table){
            $table->foreign('articleid')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');
        });

        // Relasi Tabel Visitor
        Schema::table('visitors', function(Blueprint $table){
            $table->foreign('articleid')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');
        });

        // Relasi Gallery Video
        Schema::table('galleryvideos', function(Blueprint $table){
            $table->foreign('usersid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        // Relasi Prodi
        Schema::table('prodis', function(Blueprint $table){
            $table->foreign('kajurid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        // Relasi Prestasi Prodes
        Schema::table('prestasiprodi', function(Blueprint $table){
            $table->foreign('prodiid')->references('id')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
        });

        // Relasi Mapel Produktif
        Schema::table('mapelproduktif', function(Blueprint $table){
            $table->foreign('prodiid')->references('id')->on('prodis')->onDelete('cascade')->onUpdte('cascade');
        });

        // Relasi Pekerjaan Produktif
        Schema::table('pekerjaanproduktif', function(Blueprint $table){
            $table->foreign('prodiid')->references('id')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
