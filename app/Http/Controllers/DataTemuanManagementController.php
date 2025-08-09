<?php

namespace App\Http\Controllers;

use App\Models\HasilTemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataTemuanManagementController extends Controller
{
    public function index()
    {
        $hasil_temuan = HasilTemuan::with('sub_kriteria.kriteria')->get(); // Ambil data dari model
        return view('gkmf.data-temuan.index', compact('hasil_temuan'));
    }
}
