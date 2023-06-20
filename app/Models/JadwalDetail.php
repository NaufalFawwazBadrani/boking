<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_boking',
        'id_penonton',
        'jumlah',
        'sub_total',
    ];

    public function getPenonton()
    {
        return $this->belongsTo(Penonton::class, 'id_penonton', 'id');
    }
}
