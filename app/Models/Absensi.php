<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'jadwal_id',
        'jam_absen',
        'koordinat_absen',
        'alamat_absen',
        'jenis_absen',
        'status_absen'
    ];
}
