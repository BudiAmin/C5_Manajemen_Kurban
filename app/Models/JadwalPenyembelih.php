<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPenyembelih extends Model
{
    protected $table = 'jadwal_penyembelih';
    protected $primaryKey = 'ID_Jadwal';

    protected $fillable = [
        'Foto_Dokumentasi',
        'Nama_Penyembelih',
        'Waktu_Penyembelih',
        'Lokasi_Penyembelih',
        'ID_Operasional'
    ];

    public function operasional()
    {
        return $this->belongsTo(DanaOperasional::class, 'ID_Operasional', 'ID_Operasional');
    }

    public function hewanKurban()
    {
        return $this->hasMany(HewanKurban::class, 'ID_Jadwal', 'ID_Jadwal');
    }
}
