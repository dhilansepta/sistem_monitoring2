<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DokumenDitugaskan;
use App\Models\User;
use App\Models\DokumenPerkuliahan;
use App\Models\Gamifikasi;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\MatkulDibuka;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenugasanController extends Controller
{
    public function index()
    {
        return view('super-admin.penugasan.index');
    }

    public function stepOne()
    {
        return view('super-admin.penugasan.step-one');
    }

    public function storeStepOne(Request $request)
    {
        $request->validate([
            'tahun1' => 'required',
            'tahun2' => 'required',
            'jenis' => 'required',
            'tanggal_mulai_kuliah' => 'required',
        ]);

        $tahun_ajaran = $request->tahun1 . '/' . $request->tahun2 . ' ' . $request->jenis;

        $data_tahun_ajaran = TahunAjaran::where('tahun_ajaran', $tahun_ajaran)->first();
        if ($data_tahun_ajaran) {
            return redirect()->back()->with('failed', 'Tahun ajaran sudah ada!');
        }

        $tahun_aktif = TahunAjaran::where('is_aktif', 1)->first();
        if ($tahun_aktif) {
            Gamifikasi::storeResultBadge($tahun_aktif->id_tahun_ajaran);
            $tahun_aktif->update(['is_aktif' => 0]);
        }

        // save tahun ajaran ke database
        TahunAjaran::create([
            'tahun_ajaran' => $tahun_ajaran,
            'is_aktif' => 1,
        ]);


        return redirect()->route('gkmf.index')->with('success', 'Tahun ajaran berhasil ditambahkan.');
    }

    public function stepTwo()
    {
        $data = TahunAjaran::latest('id_tahun_ajaran')->first();
        $matkul = MataKuliah::matkulDibuka($data['jenis'])->get();
        $dokumen = DokumenPerkuliahan::all();
        return view('super-admin.penugasan.step-two', ['data' => $data, 'matkul' => $matkul, 'dokumen' => $dokumen]);
    }

    public function storeStepTwo(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'jumlah' => 'required',
            'dokumen' => 'required',
        ]);

        $request->session()->put('data', $request->all());

        return redirect('/penugasan/buat-penugasan-baru/form-ketiga');
    }

    public function stepThree()
    {
        $data = session('data');
        $prodi_id = Auth::user()->prodi_id;
        $dosen = User::where('role', '!=', 'admin')->where('prodi_id', $prodi_id)->get();

        $matkuls = MataKuliah::Select('nama_matkul')
            ->whereIn('kode_matkul', $data['kode_matkul'])->get();

        return view('super-admin.penugasan.step-three', ['data' => $data, 'dosen' => $dosen, 'matkuls' => $matkuls]);
        // return view('test3', ['data' => $data, 'dosen' => $dosen]);
    }

    public function storePenugasan(Request $request)
    {
        $request->validate([
            'nama_kelas'    => 'required',
            'id_dosen'      => 'required',
            'id_dokumen'    => 'required',
        ]);
        $data = session('data');
        // dd($data);

        $tahun = TahunAjaran::where('is_aktif', 1)->first();

        $mata_kuliah = MataKuliah::whereIn('kode_matkul', $data['kode_matkul'])->get();
        foreach ($mata_kuliah as $key => $matkul) {
            $matkul_dibuka = MatkulDibuka::create([
                'kode_matkul' => $matkul->kode_matkul,
                'id_tahun_ajaran' => $tahun->id_tahun_ajaran,
                'nama_matkul' => $matkul->nama_matkul,
                'bobot_sks' => $matkul->bobot_sks,
                'praktikum' => $matkul->praktikum,
            ]);

            for ($i = 0; $i < $data['jumlah'][$key]; $i++) {
                $kelas = Kelas::create([
                    'nama_kelas'       => $request->nama_kelas[$key][$i],
                    'id_matkul_dibuka' => $matkul_dibuka->id_matkul_dibuka,
                    'id_tahun_ajaran'  => $tahun->id_tahun_ajaran,
                ]);

                foreach ($request->id_dosen[$key][$i] as $dosen) {
                    $kelas->dosen_kelas()->attach($dosen);
                }
            }
        }

        $kelas = Kelas::with('dosen_kelas')->kelasAktif()->get();

        $matkuls = MatkulDibuka::with(['kelas' => function ($query) {
            $query->with('dosen_kelas');
        }])->matkulAktif()->get();
        // dd($matkuls);   

        $dokumen_perkuliahan = DokumenPerkuliahan::whereIn('id_dokumen', $request->id_dokumen)->get();

        $tahun_ajar = TahunAjaran::where('is_aktif', 1)->first();
        // dd($tahun_ajar);
        foreach ($dokumen_perkuliahan as $key => $dokumen) {
            $tenggat = createTenggat($tahun_ajar['tanggal_mulai_kuliah'], $dokumen->tenggat_waktu_default);

            $dokumen_ditugaskan = DokumenDitugaskan::create([
                'id_dokumen'            => $dokumen->id_dokumen,
                'id_tahun_ajaran'       => $tahun->id_tahun_ajaran,
                'nama_dokumen'          => $dokumen->nama_dokumen,
                'tenggat_waktu'         => $tenggat,
                'pengumpulan'           => 1,
                'dikumpulkan_per'       => $dokumen->dikumpulkan_per,
                'dikumpul'              => $request->dikumpul[$key],
            ]);

            if ($dokumen_ditugaskan->dikumpulkan_per == 1) {
                foreach ($kelas as $kls) {
                    $dokumen_kelas = $kls->dokumen_kelas()->create([
                        'id_dokumen_ditugaskan' => $dokumen_ditugaskan->id_dokumen_ditugaskan,
                    ]);
                    foreach ($kls->dosen_kelas as $dsn) {
                        $dokumen_kelas->scores()->create([
                            'id_dosen'        => $dsn->id,
                            'kode_kelas'      => $kls->kode_kelas,
                            'id_tahun_ajaran' => $kls->id_tahun_ajaran,
                        ]);
                    }
                }
            } else {
                foreach ($matkuls as $mkl) {
                    if ($mkl->praktikum == 0  && $dokumen->id_dokumen == 'DP00000003') {
                        continue;
                    }

                    $dokumen_matkul = $mkl->dokumen_matkul()->create([
                        'id_dokumen_ditugaskan' => $dokumen_ditugaskan->id_dokumen_ditugaskan,
                    ]);

                    foreach ($mkl->kelas as $kls) {
                        $kls->kelas_dokumen_matkul()->attach($dokumen_matkul->id_dokumen_matkul);

                        foreach ($kls->dosen_kelas as $dsn) {
                            $dokumen_matkul->scores()->create([
                                'id_dosen'        => $dsn->id,
                                'kode_kelas'      => $kls->kode_kelas,
                                'id_tahun_ajaran' => $kls->id_tahun_ajaran,
                            ]);
                        }
                    }
                }
            }
        }

        $request->session()->forget('tahun_ajaran');
        $request->session()->forget('data');

        return redirect('/penugasan')->with('success', 'Penugasan berhasil ditambahkan');
    }

    public function showJumlahKelas()
    {
        $tahun_ajaran = TahunAjaran::orderBy('id_tahun_ajaran', 'desc')->get();
        $tahun_aktif = TahunAjaran::tahunAktif()->first();

        $prodi_id = Auth::user()->prodi_id;
        $matkul = MatkulDibuka::with('kelas')->withCount(['kelas as banyak_kelas'])
            ->whereHas('matkul', function ($query) use ($prodi_id) {
                $query->where('prodi_id', $prodi_id);
            })
            ->matkulTahun(request('tahun_ajaran'))->get();

        return view('super-admin.penugasan.daftar-jumlah-kelas', [
            'matkul'       => $matkul,
            'tahun_ajaran' => $tahun_ajaran,
            'tahun_aktif'  => $tahun_aktif
        ]);
    }
}
