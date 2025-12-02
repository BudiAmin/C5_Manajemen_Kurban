<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistribusiDaging extends Model
{
    protected $table = 'distribusi_daging';
    protected $primaryKey = 'ID_Distribusi';

    protected $fillable = [
        'ID_Hewan',
        'ID_Penerima',
        'Tanggal_Distribusi',
        'Penerima',
        'Dokumentasi',
        'Status_Distribusi'
    ];

    public function hewan()
    {
        return $this->belongsTo(HewanKurban::class, 'ID_Hewan', 'ID_Hewan');
    }

    public function penerima()
    {
        return $this->belongsTo(PenerimaKurban::class, 'ID_Penerima', 'ID_Penerima');
    }
}
