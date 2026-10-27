<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fotografer extends Model {
    protected $table = 'fotografer';
    protected $fillable = ['user_id', 'nama', 'no_telepon', 'email', 'spesialisasi', 'status_aktif'];
    protected $casts = ['status_aktif' => 'boolean'];
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function scopeActive($query) { return $query->where('status_aktif', true); }
}