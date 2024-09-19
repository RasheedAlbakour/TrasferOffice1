<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="vexel – Bootstrap 5  Admin & Dashboard Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords"
            content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico">

        <!-- Main Theme Js -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <!-- Choices JS -->
        <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

        <!-- TITLE -->
        <title>Vexel – Bootstrap 5 Admin &amp; Dashboard Template </title>

        <!-- BOOTSTRAP CSS -->
        <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- STYLE CSS -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

        <!-- Simplebar Css -->
        <link href="../assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet">

        <!--- FONT-ICONS CSS -->
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

        <!-- Color Picker Css -->
        <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

        <!-- Choices Css -->
        <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">



        <!-- Datatables Cdn -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">


        <!-- Quill Editor CSS -->

        <link rel="stylesheet" href="../assets/libs/quill/quill.snow.css">
        <link rel="stylesheet" href="../assets/libs/quill/quill.bubble.css">

</head>
<body>

            @yield('content')

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Popper JS -->
<script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Defaultmenu JS -->
<script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

<!-- Node Waves JS -->
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<!-- Sticky JS -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>

<!-- Simplebar JS -->
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.js') }}"></script>

<!-- Color Picker JS -->
<script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

<!-- Custom-Switcher JS -->
<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>

<!-- Modal JS -->
<script src="{{ asset('assets/js/modal.js') }}"></script>

<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Table Data JS -->
<script src="{{ asset('assets/js/table-data.js') }}"></script>

<!-- Quill Editor JS -->
<script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>

<!-- Internal Quill JS -->
<script src="{{ asset('assets/js/quill-editor.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</body>
</html>
