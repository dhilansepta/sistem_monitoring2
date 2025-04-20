<?php

namespace App\Http\Controllers;

use App\Models\AktifRole;
use App\Models\User;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    private function CreateorDeleteAktifRole($id, $role, $requestRole) {
        if($role != $requestRole) {
            if(in_array($role, ['kaprodi', 'gkmp']) && in_array($requestRole, ['dosen', 'admin'])) {
                AktifRole::where('id_user', $id)->delete();
            } else if (in_array($role, ['dosen', 'admin']) && in_array($requestRole, ['kaprodi', 'gkmp'])) {
                AktifRole::create([
                    'id_user'   => $id,
                    'is_dosen'  => 0,
                ]);
            }
        }
    }

    public function index()
    {
        $data=User::get();
        // dd($data);

        return view('admin.user-management', ['data' => $data]);
    }

    // GKMF Dashboard
    public function gkmfIndex()
    {
        // Mengambil semua Kaprodi dan GKMP
        $users = User::whereIn('role', ['kaprodi', 'gkmp'])->get();
        return view('gkmf.dashboard', compact('users'));
    }

    public function gkmfCreateUser()
    {
        // Ambil data program studi yang aktif
        $programStudis = ProgramStudi::where('is_aktif', true)->get();
        
        return view('gkmf.create-user', compact('programStudis'));
    }

    public function gkmfStoreUser(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:kaprodi,gkmp',
            'prodi' => 'required|exists:program_studis,id'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'prodi_id' => $request->prodi
        ]);

        $user->aktif_role()->create([
            'is_dosen' => 0,
        ]);

        return redirect()->route('gkmf.index')->with('success', 'User berhasil ditambahkan');
    }

    public function gkmfEditUser($id)
    {
        $user = User::findOrFail($id);
        // Ambil data program studi yang aktif
        $programStudis = ProgramStudi::where('is_aktif', true)->get();
        
        return view('gkmf.edit-user', compact('user', 'programStudis'));
    }

    public function gkmfUpdateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:kaprodi,gkmp',
            'prodi' => 'required|in:Teknik Informatika,Teknik Mesin,Geologi,Teknik Industri,Teknik Kimia,Teknik Pangan,Teknik Elektro'
        ]);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'prodi' => $request->prodi
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('gkmf.index')->with('success', 'User berhasil diperbarui');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|max:255',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:5|max:30',
            'role'      => 'required',
            'prodi'     => 'required|in:Teknik Informatika,Teknik Mesin,Geologi,Teknik Industri,Teknik Kimia,Teknik Pangan,Teknik Elektro'
        ]);

        //create user
        $user=User::create([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
            'prodi'     => $request->prodi
        ]);

        if(in_array($request->role, ['kaprodi', 'gkmp'])) {
            $user->aktif_role()->create([
                'is_dosen'  => 0,
            ]);
        }

        return redirect()->back()->with('success', 'Data pengguna berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required|max:255',
            'role'      => 'required',
            'prodi'     => 'required|in:Teknik Informatika,Teknik Mesin,Geologi,Teknik Industri,Teknik Kimia,Teknik Pangan,Teknik Elektro'
        ]);
    
        $pengguna=User::find($id);
        if($pengguna->email != $request->email) {
            $request->validate([
                'email'     => 'required|email|unique:users',
            ]);
        }

        if(is_null($request->password)) {
            User::where('id', $id)->update([
                'nama'      => $request->nama,
                'email'     => $request->email,
                'role'      => $request->role,
                'prodi'     => $request->prodi
            ]);

            $this->CreateorDeleteAktifRole($id, $pengguna->role, $request->role);

        } else {
            $request->validate([
                'password'  => 'required|min:5|max:30',
            ]);
            User::where('id', $id)->update([
                'nama'      => $request->nama,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'role'      => $request->role,
                'prodi'     => $request->prodi
            ]);

            $this->CreateorDeleteAktifRole($id, $pengguna->role, $request->role);
        }

        return redirect()->back()->with('success', 'Data pengguna berhasil diubah');
    }

    public function destroy($id)
    {
        try {
            $user=User::with('dosen_kelas')->find($id)->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Tidak dapat menghapus parent data');
        }
    
        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus');
    }
}