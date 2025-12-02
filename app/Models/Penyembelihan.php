<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyembelihan extends Model
{
    use HasFactory;

    protected $table = 'penyembelihan';

    protected $fillable = [
        'id_hewan',
        'id_pelaksanaan',
        'id_distribusi',
        'dokumentasi_penyembelihan',
    ];

    public function hewan()
    {
        return $this->belongsTo(HewanKurban::class, 'id_hewan', 'ID_Hewan');
    }

    public function pemilik()
    {
        return $this->hasOneThrough(
            User::class,         // Target
            HewanKurban::class,        // Lewat tabel hewan
            'ID_Hewan',          // Foreign key Hewan → Penyembelihan.id_hewan
            'ID_User',           // Key User → Hewan.id_user
            'id_hewan',          // FK Penyembelihan
            'id_user'            // FK Hewan
        );
    }


    public function pelaksanaan()
    {
        return $this->belongsTo(Pelaksanaan::class, 'id_pelaksanaan');
    }

    public function distribusi()
    {
        return $this->belongsTo(DistribusiDaging::class, 'id_distribusi');
    }

    // public function pemilik()
    // {
    //     return $this->hasOneThrough(User::class, HewanKurban::class, 'ID_Hewan', 'id', 'id_hewan', 'id_user');
    // }
}
