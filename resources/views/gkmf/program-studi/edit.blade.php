@extends('layouts.user-base')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Program Studi</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('gkmf.program-studi.update', $prodi->id, ['prodi' => $prodi->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_prodi">Kode Program Studi</label>
                            <input type="text" class="form-control" id="kode_prodi" value="{{ $prodi->kode_prodi }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_prodi">Nama Program Studi</label>
                            <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" 
                                   id="nama_prodi" name="nama_prodi" value="{{ old('nama_prodi', $prodi->nama_prodi) }}" required>
                            @error('nama_prodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" disabled>
                                <option value="1" {{ $prodi->is_aktif ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ !$prodi->is_aktif ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>

                        @if(!$prodi->is_aktif)
                            <div class="form-group">
                                <label for="alasan_nonaktif">Alasan Nonaktif</label>
                                <textarea class="form-control" id="alasan_nonaktif" rows="3" readonly>{{ $prodi->alasan_nonaktif }}</textarea>
                            </div>
                        @endif

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('gkmf.program-studi.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 