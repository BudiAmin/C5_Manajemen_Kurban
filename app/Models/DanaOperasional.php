<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DanaOperasional extends Model
{
    protected $table = 'dana_operasional';
    protected $primaryKey = 'ID_Operasional';

    protected $fillable = [
        'Keperluan',
        'Jumlah_Pengeluaran',
        'Tanggal_Pengeluaran',
        'Keterangan',
        'ID_DKM',
        'ID_User'
    ];

    public function dkm()
    {
        return $this->belongsTo(DanaDKM::class, 'ID_DKM', 'ID_DKM');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_User', 'id');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalPenyembelih::class, 'ID_Operasional', 'ID_Operasional');
    }
}
