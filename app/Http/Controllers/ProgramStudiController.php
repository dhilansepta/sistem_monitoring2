<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $program_studis = ProgramStudi::orderBy('nama_prodi')->paginate(10);
        return view('gkmf.program-studi.index', compact('program_studis'));
    }

    public function create()
    {
        return view('gkmf.program-studi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required|string|max:255',
        ]);

        ProgramStudi::create($request->all());

        return redirect()->route('gkmf.program-studi.index')
            ->with('success', 'Program studi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $prodi = ProgramStudi::findOrFail($id);
        return view('gkmf.program-studi.edit', compact('prodi'));
    }

    public function update(Request $request, $id)
    {

        $prodi = ProgramStudi::findOrFail($id);

        $request->validate([
            'nama_prodi' => 'required|string|max:255',
        ]);

        $prodi->update([
            'nama_prodi' => $request->input('nama_prodi'),
        ]);

        return redirect()->route('gkmf.program-studi.index')
            ->with('success', 'Program studi berhasil diperbarui');
    }

    public function toggleStatus($id)
    {
        $prodi = ProgramStudi::findOrFail($id);

        if($prodi->is_aktif){
            $prodi->update(['is_aktif' => false]);

            return redirect()->route('gkmf.program-studi.index')
            ->with('danger', 'Program studi dinonaktifkan');
        }
        $prodi->update(['is_aktif' => true]);
        return redirect()->route('gkmf.program-studi.index')
        ->with('success', 'Program studi diaktifkan');
    }

    public function select(ProgramStudi $prodi)
    {
        // Simpan ID program studi ke session
        session(['selected_prodi_id' => $prodi->id]);
        
        return redirect()->back()->with('success', 'Program Studi ' . $prodi->nama_prodi . ' telah dipilih');
    }
} 