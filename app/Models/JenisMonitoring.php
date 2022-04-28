<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisMonitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_pekerjaan',
    ];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function detail()
    {
        return $this->hasMany(DetailMonitoring::class);
    }

    public function material()
    {
        return $this->hasMany(MaterialMonitoring::class);
    }
}
