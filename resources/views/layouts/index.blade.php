<!doctype html>
<html lang="vi">

<head>
    <title>Trang chủ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Tailwind CSS via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- icon font --}}
    <link rel="stylesheet" href="icons/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="icons/themify-icons/themify-icons.css">

    {{-- link css datepicker --}}
    <link rel="stylesheet" href="css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
</head>

<body class="font-manrope" id="page-top">
    @include('layouts.header')
    <div class="container mx-auto px-4 py-4" style="min-height: calc(100vh - 166px); margin-top: 56px">
        @yield('content')
    </div>

    @include('layouts.footer')

    <!-- Optional JavaScript -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/bootstrap-datepicker.vi.min.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            //Lên đầu trang
            $('[data-toggle="tooltip"]').tooltip();
            $("a[href='#page-top']").on("click", function(event) {
                event.preventDefault();
                var hash = this.hash;
                $("html, body").animate({
                        scrollTop: $(hash).offset().top
                    },
                    1000,
                    function() {
                        window.location.hash = hash;
                    }
                );
            });
            //Datepicker
            // $('.js_my_date_picker').datepicker({
            //     format: 'dd/mm/yyyy',
            //     language: 'vi',
            //     weekStart: 1,
            //     endDate: new Date(),
            //     autoclose: true
            // });
            //Datatable
            // $('#myTable').DataTable();
        });
    </script>
    @yield('script')
    @stack('script')
</body>

</html>
