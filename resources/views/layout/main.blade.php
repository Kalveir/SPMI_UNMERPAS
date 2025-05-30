<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SPMI | @yield('tittle')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('/assets/img/unmer.png') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('/assets/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/atlantis.min.css') }}">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}">
    {{-- select2 --}}
    <link href="{{ asset('/assets/vendor/selectif/slimselect.css') }}" rel="stylesheet" type="text/css">

</head>

<body data-background-color="bg1">
    @include('sweetalert::alert')

    <div class="wrapper">
        @include('layout.header')
        <!-- Sidebar -->
        @include('layout.sidebar')
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">@yield('judul')</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @yield('container')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('layout.footer') --}}
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Atlantis JS -->
    <script src="{{ asset('/assets/js/atlantis.min.js') }}"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{ asset('/assets/js/setting-demo2.js') }}"></script>
    <!-- summertnote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     <!-- Include FilePond CSS and JS CDN -->
     <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
     <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
     <!-- Load FilePond Plugin: File Validate Type -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <!-- Load FilePond Plugin: File Validate Size -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    {{-- select2 --}}
    <script src="{{ asset('/assets/vendor/selectif/slimselect.min.js') }}"></script>

    {{-- select2 --}}
    <script>
        new SlimSelect({
            select: '#single',
            settings: {
                contentLocation: document.getElementById('input_modal')
            }
        })
    </script>

     {{-- data table --}}
     <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            var dataTable = $('#basic-datatables').DataTable();

            // Fokus pada input pencarian setelah DataTable diinisialisasi
            $('div.dataTables_filter input').focus();
        });
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#contoh-datatables').DataTable({
                scrollX: true, // Mengaktifkan horizontal scrolling
                scrollCollapse: true, // Mengaktifkan collapse agar horizontal scrollbar muncul
                });

            $('.toggle-col').on('click', function(e) {
                e.preventDefault();
                var column = table.column($(this).attr('data-column'));
                column.visible(!column.visible());
                var icon = $(this).find('i');
                if (column.visible()) {
                    $(this).removeClass('active');
                } else {
                    $(this).addClass('active');
                }
            });

            // Fokus pada input pencarian setelah DataTable diinisialisasi
            $('div.dataTables_filter input').focus();
        });
    </script>


    <script>
        $(document).ready(function() {
            // Inisialisasi Summernote untuk elemen dengan kelas summernote
            $('.summernote').summernote({
                placeholder: 'Input text here...',
                tabsize: 2,
                minHeight: 200, // Atur nilai sesuai kebutuhan
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    [['fontsize']],
                    ['height',['height']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Summernote untuk elemen dengan kelas summernote
            $('.summernotet').summernote({
                placeholder: 'Input text here...',
                tabsize: 2,
                minHeight: 200, // Atur nilai sesuai kebutuhan
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        });
    </script>
</body>

</html>
