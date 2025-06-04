<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();                 // Nomor Induk Siswa
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);       // L = Laki-laki, P = Perempuan
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
