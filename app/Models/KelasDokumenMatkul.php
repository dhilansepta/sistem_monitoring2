<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasDokumenMatkul extends Model
{
    use HasFactory;
    public $table = 'kelas_dokumen_matkul';
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $fillable = [
        'kode_kelas', 'id_dokumen_matkul'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }
    public function dokumen_matkul()
    {
        return $this->belongsTo(DokumenMatkul::class, 'id_dokumen_matkul', 'id_dokumen_matkul');
    }

    public function dosen_kelas()
    {
        return $this->belongsTo(DosenKelas::class, 'kode_kelas', 'kode_kelas');
    }
}