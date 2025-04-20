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
                <li class="nav-main-item">
                  <a class="nav-main-link {{ Request::is('gkmf/program-studi') ? 'active' : '' }}" href="{{ route('gkmf.program-studi.index') }}">
                    <i class="nav-main-link-icon si si-graduation-cap"></i>
                    <span class="nav-main-link-name">Manajemen Program Studi</span>
                  </a>
                </li>