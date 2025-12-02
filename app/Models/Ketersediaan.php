<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Detail;

class Ketersediaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'Jenis_Hewan',
    ];

    public function details()
    {
        return $this->hasMany(Detail::class, 'id_ketersediaan');
    }
}
