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
                <a href="#profile">
                  <span class="link-collapse">My Profile</span>
                </a>
              </li>
              <li>
                <a href="#edit">
                  <span class="link-collapse">Edit Profile</span>
                </a>
              </li>
              <li>
                <a href="#settings">
                  <span class="link-collapse">Settings</span>
                </a>
              </li>
              <li>
                <a href="#settings">
                  <span class="link-collapse">Logout</span>
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
            <i class="fas fa-home"></i>
            <p>Fakultas</p>
          </a>
        </li>
        @endcan
        @can('kelola prodi')
        <li class="nav-item">
          <a href="/prodi" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Program Studi</p>
          </a>
        </li>
        @endcan
        @can('kelola jabatan')
        <li class="nav-item">
          <a href="/jabatan" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Jabatan</p>
          </a>
        </li>
        @endcan
        <li class="nav-item">
          <a href="/standard" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Standard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/bookmanual" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Buku manual</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/bookstandard" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
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
            <p>Book Dokumentasi</p>
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
            <i class="fas fa-home"></i>
            <p>Indikator</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/jenis" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Jenis</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/nilai" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Bobot Nilai</p>
          </a>
        </li>
        @can('kelola berkas')
        <li class="nav-item">
          <a href="/berkas" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Pengisian Berkas</p>
          </a>
        </li>
        @endcan
        @can('kelola penilaian')
        <li class="nav-item">
          <a href="/penilaian" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Penilaian</p>
          </a>
        </li>
        @endcan
      </ul>
    </div>
  </div>
</div>