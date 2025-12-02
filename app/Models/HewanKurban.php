<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HewanKurban extends Model
{
    protected $table = 'hewan_kurban';
    protected $primaryKey = 'ID_Hewan';

    protected $fillable = [

        'ID_Detail',
        'ID_User',
        'Titip_bayar',
        'Total_Hewan',
        'Total_Harga'

    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalPenyembelih::class, 'ID_Jadwal', 'ID_Jadwal');
    }

    public function user()
    {

        return $this->belongsTo(User::class, 'ID_User', 'ID_User');
    }

    public function distribusiDaging()
    {
        return $this->hasMany(DistribusiDaging::class, 'ID_Hewan', 'ID_Hewan');
    }
    
    public function penyembelihan()
    {
        return $this->hasOne(Penyembelihan::class, 'id_hewan', 'ID_Hewan');
    }
}
