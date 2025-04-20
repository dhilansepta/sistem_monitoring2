@extends('layouts.user-base')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manajemen Program Studi</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="block-options">
                        <a href="{{ route('gkmf.program-studi.create') }}" class="btn btn-alt-primary">
                            <i class="si si-plus me-1"></i> Tambah Program Studi
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Prodi</th>
                                    <th>Nama Program Studi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($program_studis as $index => $prodi)
                                    <tr>
                                        <td>{{ $index + $program_studis->firstItem() }}</td>
                                        <td>{{ $prodi->id }}</td>
                                        <td>{{ $prodi->nama_prodi }}</td>
                                        <td>
                                            <span class="badge bg-{{ $prodi->is_aktif ? 'success' : 'danger' }}">
                                                {{ $prodi->is_aktif ? 'Aktif' : 'Nonaktif' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('gkmf.program-studi.edit', $prodi->id) }}" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Edit Program Studi">
                                                    <i class="si si-pencil"></i>
                                                </a>
                                                <form action="{{ route('gkmf.program-studi.toggle-status', $prodi->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-alt-{{ $prodi->is_aktif ? 'danger' : 'success' }}" data-bs-toggle="tooltip" title="{{ $prodi->is_aktif ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                        <i class="si si-{{ $prodi->is_aktif ? 'ban' : 'check' }}"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data program studi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $program_studis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 