<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenerimaKurban extends Model
{
    protected $table = 'penerima_kurban';
    protected $primaryKey = 'ID_Penerima';

    protected $fillable = [
        'Nama',
        'Jumlah_Keluarga',
        'Tempat_Tinggal'
    ];

    public function distribusiDaging()
    {
        return $this->hasMany(DistribusiDaging::class, 'ID_Penerima', 'ID_Penerima');
    }
}
