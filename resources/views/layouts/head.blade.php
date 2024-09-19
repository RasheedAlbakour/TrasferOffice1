<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="vexel – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @if (app()->isLocale('ar'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    @else
        <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    @endif
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}">

    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Choices JS -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- TITLE -->
    <title>mohammed alsahel</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

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
    <link rel="stylesheet" href="{{ asset('assets/libs/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/quill/quill.bubble.css') }}">
</head>
