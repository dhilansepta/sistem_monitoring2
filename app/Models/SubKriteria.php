<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';

    protected $fillable = [
        'id_kriteria',
        'sub_kriteria',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class,  'id_kriteria', 'id_kriteria');
    }

    public function hasilTemuan()
    {
        return $this->hasMany(HasilTemuan::class);
    }
}
