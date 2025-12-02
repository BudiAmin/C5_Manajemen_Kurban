<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class HewanKurban extends Model
{
    protected $table = 'hewan_kurban';
    protected $primaryKey = 'ID_Hewan';

    protected $fillable = [
        'ID_Jadwal',
        'Jenis_Hewan',
        'Status_Hewan',
        'ID_User'
    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalPenyembelih::class, 'ID_Jadwal', 'ID_Jadwal');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_User', 'id');
    }

    public function distribusi()
    {
        return $this->hasMany(DistribusiDaging::class, 'ID_Hewan', 'ID_Hewan');
    }
}
