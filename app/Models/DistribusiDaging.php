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
        'Penerima',
        'Status_Distribusi',
        'Tanggal_Distribusi',
        'Dokumentasi'
    ];

    // RELASI KE HEWAN KURBAN
    public function hewanKurban()
    {
        return $this->belongsTo(HewanKurban::class, 'ID_Hewan', 'ID_Hewan');
    }

    // RELASI KE PENERIMA
    public function penerimaKurban()
    {
        return $this->belongsTo(PenerimaKurban::class, 'ID_Penerima', 'ID_Penerima');
    }
}
