<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PenerimaKurban extends Model
{
    protected $table = 'penerima_kurban';
    protected $primaryKey = 'ID_Penerima';

    protected $fillable = [
        'Nama',
        'Tempat_Tinggal',
        'Tanggal_Terima',
        'ID_User'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_User', 'id');
    }

    public function distribusi()
    {
        return $this->hasMany(DistribusiDaging::class, 'ID_Penerima', 'ID_Penerima');
    }
}
