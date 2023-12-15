@extends('.layout.main')

@section('title')
    SPMI | Dashboard
@endsection

@section('container')
    <div class="page-heading">
        {{-- <style>
            .card:active {
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                /* Menambahkan efek bayangan ketika ditekan */
                background-color: #CCCCFF;
                /* Mengubah warna latar belakang ketika ditekan */
            }
        </style> --}}
        <div class="page-heading">
            <h3>Dashboard SPMI Unmerpas</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="bi-laptop"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Informatika</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="bi-code-square"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Rekayasa Perangkat Lunak</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green ">
                                                <i class="bi-cash-stack"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Manajemen</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon grey">
                                                <i class="bi-journal-bookmark-fill"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Hukum</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="bi-flower1"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Argoteknologi</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row 2"></div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sistem Penjaminan Mutu Internal (SPMI)</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-justify">
                                    Sistem Penjaminan Mutu Internal (SPMI) adalah suatu kerangka kerja yang digunakan oleh
                                    lembaga atau organisasi untuk memastikan bahwa proses pendidikan, layanan, dan kegiatan
                                    internal lainnya memenuhi standar mutu yang telah ditetapkan. SPMI melibatkan
                                    perencanaan,
                                    implementasi, pemantauan, dan evaluasi berkelanjutan dari semua aspek kegiatan lembaga
                                    tersebut. Dengan menggunakan metode audit internal, analisis data, dan umpan balik dari
                                    stakeholder, SPMI bertujuan untuk meningkatkan efisiensi, efektivitas, dan kualitas
                                    keseluruhan layanan yang disediakan. Sistem ini juga memungkinkan lembaga untuk secara
                                    proaktif mengidentifikasi dan mengatasi potensi masalah, mempromosikan inovasi, dan
                                    meningkatkan kepuasan pemangku kepentingan dalam rangka terus mewujudkan peningkatan
                                    mutu
                                    berkelanjutan.
                                </p>
                            </div>
                        </div>
                    </section>
            </section>
        </div>
    </div>
@endsection
