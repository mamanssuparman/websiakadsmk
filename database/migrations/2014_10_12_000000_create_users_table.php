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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nuptk')->nullable();
            $table->string('nip')->nullable();
            $table->string('nama');
            $table->text('alamat')->nullable();
            $table->enum('jeniskelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('pendidikanterakhir')->default('-');
            $table->enum('jabatan', ['Kepala Sekolah', 'Tenaga Pendidik', 'Tenaga Kependidikan'])->nullable();
            $table->enum('tugastambahan', ['Wakasek Kurikulum', 'Wakasek Humas', 'Wakasek Kesiswaan', 'Wakasek Sarpras'])->nullable();
            $table->enum('role', ['Super Admin', 'Admin', 'User'])->default('User');
            $table->text('photos')->nullable();
            $table->enum('statususers',['Active', 'Non Active'])->default('Active');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
