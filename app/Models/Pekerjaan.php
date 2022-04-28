<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pekerjaan',
        'lokasi',
        'no_kontrak',
        'tgl'
    ];

    public function jenis_monitoring()
    {
        $this->hasMany(JenisMonitoring::class);
    }
}
