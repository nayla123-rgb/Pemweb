<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penugasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'supir_id',
        'tanggal_penugasan',
        'rute',
        'kendaraan',
        'durasi',
        'status',
    ];

    public function supir()
    {
        return $this->belongsTo(Supir::class);
    }
}

