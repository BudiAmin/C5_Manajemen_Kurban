<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
=======
use App\Models\Detail;

>>>>>>> cd26f31254b49eb9a31483249892a3e50d31da7e
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
