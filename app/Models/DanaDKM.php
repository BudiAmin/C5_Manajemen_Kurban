<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanaDKM extends Model
{
    protected $table = 'dana_dkm';
    protected $primaryKey = 'ID_DKM';

    protected $fillable = [
        'Sumber_dana',
        'Jumlah_dana',
        'Tanggal_masuk',
        'Keterangan'
    ];

    public function operasional()
    {
        return $this->hasMany(DanaOperasional::class, 'ID_DKM', 'ID_DKM');
    }
}
