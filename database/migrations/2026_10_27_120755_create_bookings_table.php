<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking')->unique();
            $table->foreignId('pelanggan_id')->constrained('pelanggan')->cascadeOnDelete();
            $table->foreignId('paket_layanan_id')->constrained('paket_layanan')->cascadeOnDelete();
            $table->foreignId('fotografer_id')->nullable()->constrained('fotografer')->nullOnDelete();
            
            $table->date('tanggal_pemotretan');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('lokasi')->nullable();
            $table->text('catatan_pelanggan')->nullable();
            
            $table->enum('status_booking', [
                'menunggu_konfirmasi', 'terjadwal', 'selesai_dipotret', 
                'proses_penyuntingan', 'siap_diambil', 'selesai', 'dibatalkan'
            ])->default('menunggu_konfirmasi');
            
            $table->decimal('total_harga', 12, 2);
            $table->decimal('uang_muka', 12, 2)->default(0);
            $table->decimal('sisa_pembayaran', 12, 2);
            $table->timestamps();
            
            $table->index(['tanggal_pemotretan', 'status_booking']);
        });
    }
    public function down(): void { Schema::dropIfExists('booking'); }
};