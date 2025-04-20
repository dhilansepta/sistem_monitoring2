<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>@yield('title') |
      @if (in_array(Auth()->user()->role, ['kaprodi', 'gkmp']))
      {{ Auth()->user()->aktif_role->is_dosen == 1 ? "Dosen Pengampu" : namaPeran(Auth()->user()->role)  }}
      @else
        {{ namaPeran(Auth()->user()->role) }}
      @endif
    </title>

    <meta name="description" content="Sistem Monitoring Kelengkapan Dokumen Perkuliahan Pogram Studi Teknik Informatika Institut Teknologi Sumatera">
    <meta name="author" content="Putu Ary Kusuma Yudha IF'19">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Pogram Studi Teknik Informatika Institut Teknologi Sumatera">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="Sistem Monitoring Kelengkapan Dokumen Perkuliahan Pogram Studi Teknik Informatika Institut Teknologi Sumatera">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <link rel="shortcut icon" href={{ URL::asset("assets/media/favicons/logo-if.png") }}>
    <link rel="icon" type="image/png" sizes="192x192" href={{ URL::asset("assets/media/favicons/logo-if.png") }}>
    <link rel="apple-touch-icon" sizes="180x180" href={{ URL::asset("assets/media/favicons/logo-if.png") }}>

    @yield('style')

    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href={{ URL::asset("assets/css/oneui.min.css")}}>
  </head>

  <body>
    <!-- Page Container -->
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow {{ session()->get('btn-mini') == true ? 'sidebar-mini' : '' }} {{ session()->get('btn-dark-mode') == true ? 'page-header-dark dark-mode' : '' }}">
      <!-- Side Overlay-->
      <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header border-bottom">
          <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
            <i class="fa fa-fw fa-times"></i>
          </a>
        </div>
      </aside>

      <!-- Sidebar -->
      <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="content-header">
          <!-- Logo -->
          <a class="text-dual" href="/">
            <img class="fa fa-2x navbar-toggler-icon" src="{{ URL::asset("assets/media/favicons/logo-if.png")}}" />
          </a>

          <!-- Extra -->
          <div>
            <div class="dropdown d-inline-block ms-1">
              <span class="smini-hide fs-sm tracking-wider">Sistem Monitoring Dokumen Perkuliahan</span>
            </div>

            <!-- Close Sidebar -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
              <i class="fa fa-fw fa-times"></i>
            </a>
          </div>
        </div>

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
          <!-- Side Navigation -->
          <div class="content-side">
            <ul class="nav-main">
              <li class="nav-main-item">
                <a class="nav-main-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                  <i class="nav-main-link-icon si si-speedometer"></i>
                  <span class="nav-main-link-name">Dashboard</span>
                </a>
              </li>

              @if(Auth()->user()->role == 'gkmf')
                <li class="nav-main-item">
                  <a class="nav-main-link {{ Request::is('gkmf') ? 'active' : '' }}" href="{{ route('gkmf.index') }}">
                    <i class="nav-main-link-icon si si-users"></i>
                    <span class="nav-main-link-name">Manajemen User</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link {{ Request::is('gkmf/create-user') ? 'active' : '' }}" href="{{ route('gkmf.create-user') }}">
                    <i class="nav-main-link-icon si si-user-plus"></i>
                    <span class="nav-main-link-name">Tambah User</span>
                  </a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>

      <!-- Header -->
      <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
          <!-- Left Section -->
          <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
              <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- Toggle Mini Sidebar -->
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block btn-mini" data-toggle="layout" data-action="sidebar_mini_toggle">
              <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>

            <!-- Toggle Dark Mode -->
            <button type="button" class="btn btn-sm btn-alt-secondary btn-dark-mode" data-toggle="layout" data-action="dark_mode_toggle">
              <i class="far fa-moon"></i>
            </button>
          </div>

          <!-- Right Section -->
          <div class="d-flex align-items-center">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ms-2">
              <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle" src="{{ (auth()->user()->avatar == null) ? asset('storage/avatar/avatar13.jpg') : asset('storage/avatar/'.auth()->user()->avatar) }}" alt="Header Avatar" style="width: 21px;">
                <span class="d-none d-sm-inline-block ms-2">{{ Auth()->user()->nama }}</span>
                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ (auth()->user()->avatar == null) ? asset('storage/avatar/avatar13.jpg') : asset('storage/avatar/'.auth()->user()->avatar) }}" alt="Avatar">
                  <p class="mt-2 mb-0 fw-medium">{{ Auth()->user()->nama }}</p>
                  <p class="mb-0 text-muted fs-sm fw-medium">{{ namaPeran(Auth()->user()->role) }}</p>
                </div>
                <div class="p-2">
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="/profil">
                    <span class="fs-sm fw-medium">Profile</span>
                  </a>
                </div>
                <div role="separator" class="dropdown-divider m-0"></div>
                <div class="p-2">
                  <form action="/user-logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center justify-content-between">
                      <span class="fs-sm fw-medium">Log Out</span>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Container -->
      <main id="main-container">
        @yield('content')
      </main>
    </div>

    <!-- OneUI Core JS -->
    <script src={{ URL::asset("assets/js/oneui.app.min.js")}}></script>
    @stack('scripts')
  </body>
</html> 