<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // <-- TAMBAHKAN INI (Wajib ada)

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // <-- TAMBAHKAN 'HasRoles' DI SINI

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke Pelanggan (1 User punya 1 data Pelanggan)
    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class);
    }

    // Relasi ke Fotografer (1 User bisa punya 1 data Fotografer)
    public function fotografer()
    {
        return $this->hasOne(Fotografer::class);
    }
}