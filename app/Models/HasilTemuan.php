<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTemuan extends Model
{
    use HasFactory;

    protected $table = 'hasil_temuan';

    protected $fillable = [
    'id_sub_kriteria',
    'hasil_temuan',
    'status_tahun_lalu',
    'status_tahun_ini',
    'kendala',
    'tindak_lanjut',
    'masukkan',
    ];

    public function sub_kriteria(){
        return $this->belongsTo(SubKriteria::class, 'id_sub_kriteria', 'id_sub_kriteria');
    }
}
