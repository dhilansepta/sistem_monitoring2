@extends('layouts.user-base')
@section('title', 'Manajemen Data Temuan')
@section('content')
    <!-- Page Content -->
    <div class="content">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                <strong>{{ session()->get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <strong>{{ session()->get('failed') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Overview -->
        <div class="d-flex justify-content-start">

            <!-- Sub Kriteria -->
            <div class="col-6 col-lg-3">
                <a class="btn block block-rounded block-link-shadow text-center button-tambah-sub-kriteria" id="btn-detail"
                    type="button" data-toggle="modal" data-target="#modal-block-normal">
                    <div class="block-content block-content-full">
                        <div class="fs-2 fw-semibold text-success">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                    <div class="block-content py-2 bg-body-light">
                        <p class="fw-medium fs-sm text-success mb-0">
                            Tambah Sub Kriteria
                        </p>
                    </div>
                </a>
            </div>
            <!-- END Sub Kriteria -->

            <!-- Hasil Temuan -->
            <div class="col-6 col-lg-3">
                <a class="btn block block-rounded block-link-shadow text-center button-tambah-hasil-temuan" id="btn-detail"
                    type="button" data-toggle="modal" data-target="#modal-block-normal">
                    <div class="block-content block-content-full">
                        <div class="fs-2 fw-semibold text-success">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                    <div class="block-content py-2 bg-body-light">
                        <p class="fw-medium fs-sm text-success mb-0">
                            Tambah Hasil Temuan
                        </p>
                    </div>
                </a>
            </div>
            <!-- Hasil Temuan -->

        </div>
        <!-- END Overview -->

        <!-- All Products -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Data Temuan</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-responsive class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kriteria</th>
                            <th class="text-center">Sub Kriteria</th>
                            <th class="text-center">Hasil Temuan</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasil_temuan as $key => $item)
                            <tr>
                                <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                <td class="fs-sm">{{ $item->sub_kriteria->kriteria->nama_kriteria }}</td>
                                <td class="text-center fw-semibold fs-sm">{{ $item->sub_kriteria->nama_sub_kriteria }}</td>
                                <td class="text-center fw-semibold fs-sm">{{ $item->hasil_temuan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END All Products -->
    </div>
    <!-- END Page Content -->

@endsection

@section('script')
    <script src={{ URL::asset("assets/js/pages/be_pages_dashboard.min.js") }}></script>
    <script>
        $(document).ready(function () {
            $(".alert").delay(2000).fadeOut("slow");
        });
    </script>
@endsection