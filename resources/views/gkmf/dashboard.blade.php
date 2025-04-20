@extends('layouts.user-base')

@section('title', 'Dashboard GKMF')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Dashboard GKMF</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Full Table -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Daftar User</h3>
            <div class="block-options">
                <a href="{{ route('gkmf.create-user') }}" class="btn btn-alt-primary">
                    <i class="si si-user-plus me-1"></i> Tambah User Baru
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Program Studi</th>
                            <th class="text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-{{ $user->role == 'kaprodi' ? 'primary' : 'info' }}">
                                        {{ strtoupper($user->role) }}
                                    </span>
                                </td>
                                <td>{{ $user->programStudi->nama_prodi ?? 'Belum Ditetapkan' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('gkmf.edit-user', $user->id) }}" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Edit User">
                                        <i class="si si-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Full Table -->
</div>
<!-- END Page Content -->
@endsection

@push('scripts')
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush 