<div class="sidebar sidebar-style-2" data-background-color="dark2">

  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              {{ Auth::user()->nama }}
              <span class="user-level">{{ Auth::user()->roles->first()->name}}</span>
              <span class="caret"></span>
            </span>
          </a>
          <div class="clearfix"></div>

          <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li>
                  <a href="{{ route('profile.ProfilInfo',Auth::user()->id) }}">
                    @csrf
                    <span class="link-collapse">My Profile</span>
                  </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <ul class="nav nav-primary">

        <li class="nav-item">
          <a href="/dashboard" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        @can('kelola fakultas')
        <li class="nav-item">
          <a href="/fakultas" class="collapsed" aria-expanded="false">
            <i class="fas fa-flag"></i>
            <p>Fakultas</p>
          </a>
        </li>
        @endcan
        @can('kelola prodi')
        <li class="nav-item">
          <a href="/prodi" class="collapsed" aria-expanded="false">
            <i class="fas fa-project-diagram"></i>
            <p>Program Studi</p>
          </a>
        </li>
        @endcan
        @can('kelola jabatan')
        <li class="nav-item">
          <a href="/jabatan" class="collapsed" aria-expanded="false">
            <i class="fas fa-solid fa-crown"></i>
            <p>Jabatan</p>
          </a>
        </li>
        @endcan
        @can('kelola pegawai')
        <li class="nav-item">
          <a href="/pegawai" class="collapsed" aria-expanded="false">
            <i class="fas fa-solid fa-users"></i>
            <p>Pegawai</p>
          </a>
        </li>
        @endcan
        @can('kelola pegawai')
        <li class="nav-item">
          <a href="/audhitor" class="collapsed" aria-expanded="false">
            <i class="fas fa-solid fa-user-tie"></i>
            <p>Auditor</p>
          </a>
        </li>
        @endcan
        <li class="nav-item">
          <a href="/standard" class="collapsed" aria-expanded="false">
            <i class="fas fa-th-list"></i>
            <p>Standard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/bookmanual" class="collapsed" aria-expanded="false">
            <i class="fas fa-book-reader"></i>
            <p>Buku manual</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/bookstandard" class="collapsed" aria-expanded="false">
            <i class="fas fa-book"></i>
            <p>Buku Standard</p>
          </a>
        </li>
        {{-- <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Components</h4>
        </li> --}}
        <li class="nav-item">
          <a data-toggle="collapse" href="#base">
            <i class="fas fa-layer-group"></i>
            <p>Buku Dokumentasi</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="base">
            <ul class="nav nav-collapse">
              <li>
                <a href="/SOP">
                  <span class="sub-item">SOP</span>
                </a>
              </li>
              <li>
                <a href="/formulir">
                  <span class="sub-item">Formulir</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="/indikator" class="collapsed" aria-expanded="false">
            <i class="fas fa-tasks"></i>
            <p>Indikator</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/jenis" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Jenis</p>
          </a>
        </li>
        @can('kelola nilai')
        <li class="nav-item">
          <a href="/nilai" class="collapsed" aria-expanded="false">
            <i class="fas fa-tachometer-alt"></i>
            <p>Bobot Nilai</p>
          </a>
        </li>
        @endcan
        @can('kelola berkas')
        <li class="nav-item">
          <a href="/berkas" class="collapsed" aria-expanded="false">
            <i class="fas fa-file-alt"></i>
            <p>Pengisian Berkas</p>
          </a>
        </li>
        @endcan
        <li class="nav-item">
          <a data-toggle="collapse" href="#penilaian">
            <i class="fas fa-file-signature"></i>
            <p>Penilaian</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="penilaian">

            <ul class="nav nav-collapse">
              @role('Auditor Informatika')
              <li>
                <a href="/penilaian/informatika">
                  <span class="sub-item">Teknik Informatika</span>
                </a>
              </li>
              @endrole
              @role('Auditor RPL')
              <li>
                <a href="/penilaian/RPL">
                  <span class="sub-item">Rekayasa Perangkat Lunak</span>
                </a>
              </li>
              @endrole
              @role('Auditor Manajemen')
              <li>
                <a href="/penilaian/Manajemen">
                  <span class="sub-item">Manajemen</span>
                </a>
              </li>
              @endrole
              @role('Auditor Hukum')
              <li>
                <a href="/penilaian/Hukum">
                  <span class="sub-item">Hukum</span>
                </a>
              </li>
              @endrole
              @role('Auditor Agroteknologi')
              <li>
                <a href="/penilaian/Agroteknologi">
                  <span class="sub-item">Agroteknologi</span>
                </a>
              </li>
              @endrole
            </ul>
          </div>
        </li>
        @role('LPPM')
        <li class="nav-item">
          <a data-toggle="collapse" href="#pengendalian">
            <i class="fas fa-file-signature"></i>
            <p>Pengendalian</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="pengendalian">
            <ul class="nav nav-collapse">
              <li>
                <a href="/pengendalian/informatika">
                  <span class="sub-item">Teknik Informatika</span>
                </a>
              </li>
              <li>
                <a href="/pengendalian/RPL">
                  <span class="sub-item">Rekayasa Perangkat Lunak</span>
                </a>
              </li>
              <li>
                <a href="/pengendalian/Manajemen">
                  <span class="sub-item">Manajemen</span>
                </a>
              </li>
              <li>
                <a href="/pengendalian/Hukum">
                  <span class="sub-item">Hukum</span>
                </a>
              </li>
              <li>
                <a href="/pengendalian/Agroteknologi">
                  <span class="sub-item">Agroteknologi</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        @endrole
      </ul>
    </div>
  </div>
</div>