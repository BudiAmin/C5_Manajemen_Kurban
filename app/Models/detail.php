<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_ketersediaan',
        'Bobot',
        'Harga',
        'Jumlah',
    ];

    public function ketersediaan()
    {
        return $this->belongsTo(Ketersediaan::class, 'id_ketersediaan', 'id');
    }

    // public function jenis()
    // {
    //     return $this->belongsTo(DistribusiDaging::class, 'id_distribusi');
    // }
}
