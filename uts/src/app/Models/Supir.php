<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supir extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'sim',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'status',
    ];

    public function penugasans()
    {
        return $this->hasMany(Penugasan::class);
    }
}
