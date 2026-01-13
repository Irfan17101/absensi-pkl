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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();

            // relasi ke user (anggota PKL)
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // data absensi
            $table->date('tanggal');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_pulang')->nullable();

            // status absensi
            $table->enum('status', ['hadir', 'izin', 'sakit', 'alpha'])
                  ->default('hadir');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
