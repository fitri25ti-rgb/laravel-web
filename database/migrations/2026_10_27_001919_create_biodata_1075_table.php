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
        Schema::create('biodata_1075', function (Blueprint $table) {
            $table->id();
            
            // Kolom Data Utama
            $table->string('nama_lengkap');
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->string('photo')->nullable();
            
            // Kolom Data Tambahan (Pendidikan & Hobi)
            $table->string('pendidikan')->nullable();
            $table->string('hobi')->nullable();
            $table->string('agama')->nullable();
            $table->string('golongan_darah')->nullable();

            // Kolom Data Keluarga
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('anak_ke')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_1075');
    }
};