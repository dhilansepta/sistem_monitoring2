@extends('layouts.user-base')

@section('title', 'Tambah Program Studi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Program Studi</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('gkmf.program-studi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_prodi">Nama Program Studi</label>
                            <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" 
                                   id="nama_prodi" name="nama_prodi" value="{{ old('nama_prodi') }}" required>
                            @error('nama_prodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('gkmf.program-studi.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 