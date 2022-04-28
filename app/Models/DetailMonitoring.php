<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailMonitoring extends Model
{
    use HasFactory;


    protected $fillable = [
        'uraian_pekerjaan',
        'satuan',
        'volume',
        'id_jenis_monitoring',
    ];

    public function jenis_monitoring()
    {
        return $this->belongsTo(JenisMonitoring::class);
    }

    public function material()
    {
        return $this->hasMany(Material::class);
    }

}
