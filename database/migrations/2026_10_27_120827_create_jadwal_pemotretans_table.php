<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jadwal_pemotretan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->unique()->constrained('booking')->cascadeOnDelete();
            $table->foreignId('fotografer_id')->constrained('fotografer')->cascadeOnDelete();
            
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('lokasi')->nullable();
            
            $table->enum('status_jadwal', ['terjadwal', 'selesai', 'dibatalkan'])->default('terjadwal');
            $table->text('catatan')->nullable();
            $table->timestamps();
            
            // Index PENTING untuk deteksi bentrok jadwal
            $table->index(['fotografer_id', 'tanggal']);
        });
    }
    public function down(): void { Schema::dropIfExists('jadwal_pemotretan'); }
};