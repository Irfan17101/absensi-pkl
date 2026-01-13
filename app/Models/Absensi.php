<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Absensi extends Model
{
    use HasFactory;

    /**
     * Nama tabel
     */
    protected $table = 'absensis';

    /**
     * Kolom yang boleh diisi
     */
    protected $fillable = [
        'user_id',
        'tanggal',
        'jam_masuk',
        'status',      // hadir | izin | sakit
        'keterangan',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi: Absensi milik satu User (anggota PKL)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
