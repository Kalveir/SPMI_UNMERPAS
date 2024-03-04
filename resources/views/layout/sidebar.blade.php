@php
    use App\Models\prodi;
@endphp
<div class="sidebar sidebar-style-2" data-background-color="dark2">

  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="{{ asset('/assets/img/avataaars.jpg') }}" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              {{ Auth::user()->nama }}
              <span class="user-level text-warp">{{ optional(Auth::user()->roles->first())->name}}</span>
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
          <a href="{{ route('dashboard.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        @can('kelola fakultas')
        <li class="nav-item">
          <a href="{{ route('fakultas.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-flag"></i>
            <p>Fakultas</p>
          </a>
        </li>
        @endcan
        @can('kelola prodi')
        <li class="nav-item">
          <a href="{{ route('prodi.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-project-diagram"></i>
            <p>Program Studi</p>
          </a>
        </li>
        @endcan
        @can('kelola jabatan')
        <li class="nav-item">
          <a href="{{ route('jabatan.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-solid fa-crown"></i>
            <p>Jabatan</p>
          </a>
        </li>
        @endcan
        @can('kelola pegawai')
        <li class="nav-item">
          <a href="{{ route('pegawai.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-solid fa-users"></i>
            <p>Pegawai</p>
          </a>
        </li>
        @endcan
        @role('PPM')
        <li class="nav-item">
          <a href="{{ route('audhitor.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-solid fa-user-tie"></i>
            <p>Auditor</p>
          </a>
        </li>
        @endrole
        <li class="nav-item">
          <a href="{{ route('standard.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-th-list"></i>
            <p>Standar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('bookmanual.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-book-reader"></i>
            <p>Buku Manual</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('bookstandard.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-book"></i>
            <p>Buku Standar</p>
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
                <a href="{{ route('SOP.index') }}">
                  <span class="sub-item">SOP</span>
                </a>
              </li>
              <li>
                <a href="{{ route('formulir.index') }}">
                  <span class="sub-item">Formulir</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="{{ route('indikator.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-tasks"></i>
            <p>Indikator</p>
          </a>
        </li>
        @can('kelola bobot')
        <li class="nav-item">
          <a href="{{ route('bobot.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-chart-line"></i>
            <p>Bobot Nilai</p>
          </a>
        </li>
        @endcan
        @can('kelola nilai')
        <li class="nav-item">
          <a href="{{ route('nilai.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-tachometer-alt"></i>
            <p>Skor Nilai</p>
          </a>
        </li>
        @endcan
        @can('kelola berkas')
        <li class="nav-item">
          <a href="{{ route('berkas.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-file-alt"></i>
            <p>Pengisian Berkas</p>
          </a>
        </li>
        @endcan
        @role('Auditor Informatika')
        <li class="nav-item">
          <a href="{{ route('informatika.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-file-signature"></i>
            <p>Penilaian Informatika</p>
          </a>
        </li>
        @endrole
        @role('Auditor RPL')
        <li class="nav-item">
          <a href="{{ route('rpl.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-file-signature"></i>
            <p>Penilaian RPL</p>
          </a>
        </li>
        @endrole
        @role('Auditor Manajemen')
        <li class="nav-item">
          <a href="{{ route('manajemen.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-file-signature"></i>
            <p>Penilaian Manajemen</p>
          </a>
        </li>
        @endrole
        @role('Auditor Hukum')
        <li class="nav-item">
          <a href="{{ route('hukum.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-file-signature"></i>
            <p>Penilaian Hukum</p>
          </a>
        </li>
        @endrole
        @role('Auditor Agroteknologi')
        <li class="nav-item">
          <a href="{{ route('agro.index') }}" class="collapsed" aria-expanded="false">
            <i class="fas fa-file-signature"></i>
            <p>Penilaian Agroteknologi</p>
          </a>
        </li>
        @endrole

        @role('PPM')
        <li class="nav-item">
          <a data-toggle="collapse" href="#pengendalian">
            <i class="fas fa-file-signature"></i>
            <p>Pengendalian</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="pengendalian">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('prodi_informatika.index') }}">
                  <span class="sub-item">{{ Prodi::find(1)->nama ?? null}}</span>
                </a>
              </li>
              <li>
                <a href="{{ route('prodi_rpl.index') }}">
                  <span class="sub-item">{{ Prodi::find(2)->nama ?? null}}</span>
                </a>
              </li>
              <li>
                <a href="{{ route('prodi_manajemen.index') }}">
                  <span class="sub-item">{{ Prodi::find(3)->nama ?? null}}</span>
                </a>
              </li>
              <li>
                <a href="{{ route('prodi_hukum.index') }}">
                  <span class="sub-item">{{ Prodi::find(4)->nama ?? null}}</span>
                </a>
              </li>
              <li>
                <a href="{{ route('prodi_agroteknologi.index') }}">
                  <span class="sub-item">{{ Prodi::find(5)->nama ?? null}}</span>
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