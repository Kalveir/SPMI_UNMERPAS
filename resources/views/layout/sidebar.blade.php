<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" >
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                @can('kelola fakultas')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/fakultas" aria-expanded="false"><i class="mdi mdi-flag"></i><span
                            class="hide-menu">Fakultas</span></a></li>
                @endcan
                @can('kelola prodi')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/prodi" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                            class="hide-menu">Program Studi</span></a></li>
                @endcan
                @can('kelola jabatan')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/jabatan" aria-expanded="false"><i class="mdi mdi-tie"></i><span
                            class="hide-menu">Jabatan</span></a></li>
                @endcan
                @can('kelola pegawai')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/pegawai" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span
                            class="hide-menu">Pegawai</span></a></li>
                @endcan
                @can('kelola standard')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/standard" aria-expanded="false"><i class="mdi mdi-developer-board"></i><span
                            class="hide-menu">Standard</span></a></li> 
                @endcan
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="/bookmanual" aria-expanded="false"><i class="mdi mdi-book"></i><span
                        class="hide-menu">Book Manual</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="/bookstandard" aria-expanded="false"><i class="mdi mdi-book-open"></i><span
                        class="hide-menu">Book Standard</span></a></li>
                
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span
                            class="hide-menu">Book Docs</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="/SOP" class="sidebar-link"><i
                                    class="mdi mdi-book-open-variant"></i><span class="hide-menu"> SOP
                                </span></a></li>
                        <li class="sidebar-item"><a href="/formulir" class="sidebar-link"><i
                                    class="mdi mdi-library-books"></i><span class="hide-menu"> Formulir
                                </span></a></li>
                    </ul>
                </li>
                @can('kelola indikator')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="/indikator" aria-expanded="false"><i class="mdi mdi-scale-balance"></i><span
                        class="hide-menu">Indikator</span></a></li>
                @endcan

                @can('kelola jenis')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="/jenis" aria-expanded="false"><i class="mdi mdi-chart-gantt"></i><span
                        class="hide-menu">Jenis</span></a></li>
                @endcan

                @can('kelola nilai')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="/nilai" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span
                        class="hide-menu">Nilai</span></a></li>
                @endcan
                @can('kelola berkas')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="/berkas" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span
                        class="hide-menu">Pengisian Berkas</span></a></li>
                @endcan
                @can('kelola penilaian')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="/penilaian" aria-expanded="false"><i class="mdi mdi-widgets"></i><span
                        class="hide-menu">Penilaian</span></a></li>
                @endcan
                
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>