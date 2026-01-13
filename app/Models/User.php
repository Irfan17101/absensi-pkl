<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Models\Absensi;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi mass assignment
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // admin | anggota
    ];

    /**
     * Kolom yang disembunyikan
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutator password
     * Otomatis hash password jika belum di-hash
     */
    public function setPasswordAttribute($value)
    {
        if (!$value) {
            $this->attributes['password'] = $value;
            return;
        }

        // jika sudah bcrypt, simpan langsung
        if (preg_match('/^\$2y\$/', $value)) {
            $this->attributes['password'] = $value;
            return;
        }

        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Relasi: User memiliki banyak Absensi
     */
    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
