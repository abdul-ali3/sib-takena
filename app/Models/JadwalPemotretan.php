<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalPemotretan extends Model {
    protected $table = 'jadwal_pemotretan';
    protected $fillable = ['booking_id', 'fotografer_id', 'tanggal', 'jam_mulai', 'jam_selesai', 'lokasi', 'status_jadwal', 'catatan'];
    protected $casts = ['tanggal' => 'date'];

    public function booking(): BelongsTo { return $this->belongsTo(Booking::class); }
    public function fotografer(): BelongsTo { return $this->belongsTo(Fotografer::class); }

    // FUNGSI RAHASIA: Cek Bentrok Jadwal
    public static function cekBentrok(int $fotograferId, string $tanggal, string $jamMulai, string $jamSelesai, ?int $excludeBookingId = null): bool {
        $query = self::where('fotografer_id', $fotograferId)
            ->where('tanggal', $tanggal)
            ->where('status_jadwal', '!=', 'dibatalkan')
            ->where(function($q) use ($jamMulai, $jamSelesai) {
                $q->where('jam_mulai', '<', $jamSelesai)
                  ->where('jam_selesai', '>', $jamMulai);
            });
        if ($excludeBookingId) { $query->where('booking_id', '!=', $excludeBookingId); }
        return $query->exists(); 
    }
}