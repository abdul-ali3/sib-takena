<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model {
    protected $table = 'booking';
    protected $fillable = [
        'kode_booking', 'pelanggan_id', 'paket_layanan_id', 'fotografer_id',
        'tanggal_pemotretan', 'jam_mulai', 'jam_selesai', 'lokasi', 'catatan_pelanggan',
        'status_booking', 'total_harga', 'uang_muka', 'sisa_pembayaran'
    ];
    protected $casts = [
        'tanggal_pemotretan' => 'date',
        'total_harga' => 'decimal:2', 'uang_muka' => 'decimal:2', 'sisa_pembayaran' => 'decimal:2',
    ];

    public function pelanggan(): BelongsTo { return $this->belongsTo(Pelanggan::class); }
    public function paketLayanan(): BelongsTo { return $this->belongsTo(PaketLayanan::class); }
    public function fotografer(): BelongsTo { return $this->belongsTo(Fotografer::class); }
    public function jadwal(): HasOne { return $this->hasOne(JadwalPemotretan::class); }

    public static function generateKodeBooking(): string {
        $tanggal = date('Ymd');
        $lastBooking = self::whereDate('created_at', today())->orderBy('id', 'desc')->first();
        $urutan = $lastBooking ? (intval(substr($lastBooking->kode_booking, -3)) + 1) : 1;
        return 'BK-' . $tanggal . '-' . str_pad($urutan, 3, '0', STR_PAD_LEFT);
    }
}