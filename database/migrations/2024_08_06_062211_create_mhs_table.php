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
        Schema::create('mhs', function (Blueprint $table) {
            $table->id(); // id (primary key)
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']); // 'L' untuk Laki-laki, 'P' untuk Perempuan
            $table->date('tanggal_lahir');
            $table->string('agama'); // Menyimpan nilai agama dari dropdown
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('program_studi');
            $table->string('jalur_masuk');
            $table->string('foto')->nullable(); // Bisa menyimpan path foto
            $table->string('status')->default('diproses');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            // Foreign key constraint untuk id_user
            $table->foreign('id_user')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mhs');
    }
};
