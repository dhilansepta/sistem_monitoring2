@extends('layouts.user-base')

@section('title', 'Edit User')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit User</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('gkmf.index') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Basic -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Form Edit User</h3>
        </div>
        <div class="block-content block-content-full">
            <form method="POST" action="{{ route('gkmf.update-user', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="row push">
                    <div class="col-lg-8 col-xl-5 offset-lg-4">
                        <div class="mb-4">
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="password">Password Baru (Kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="role">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" 
                                id="role" name="role" required>
                                <option value="">Pilih Role</option>
                                <option value="kaprodi" {{ (old('role', $user->role) == 'kaprodi') ? 'selected' : '' }}>Kaprodi</option>
                                <option value="gkmp" {{ (old('role', $user->role) == 'gkmp') ? 'selected' : '' }}>GKMP</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="prodi">Program Studi</label>
                            <select class="form-select @error('prodi') is-invalid @enderror" 
                                id="prodi" name="prodi_id" required>
                                <option value="">Pilih Program Studi</option>
                                @foreach($programStudis as $prodi)
                                    <option value="{{ $prodi->id }}" {{ (old('prodi', $user->prodi_id) == $prodi->id) ? 'selected' : '' }}>
                                        {{ $prodi->nama_prodi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('prodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('gkmf.index') }}" class="btn btn-alt-secondary">
                                <i class="si si-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-alt-primary">
                                <i class="si si-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Basic -->
</div>
<!-- END Page Content -->
@endsection 