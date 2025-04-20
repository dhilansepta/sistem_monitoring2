<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studis';

    protected $fillable = [
        'nama_prodi',
        'is_aktif'
    ];

    protected $casts = [
        'is_aktif' => 'boolean'
    ];

    public function scopeAktif($query)
    {
        return $query->where('is_aktif', true);
    }

    public function scopeNonaktif($query)
    {
        return $query->where('is_aktif', false);
    }
} 