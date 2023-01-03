<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - prinso-invoice</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/js/theme.js','resources/js/bs-init.js','resources/js/chart.min.js','resources/js/bootstrap.min.js']) -->
    @vite(['resources/css/bootstrap.min.css', 'resources/js/app.js','resources/js/theme.js','resources/js/bs-init.js','resources/js/chart.min.js','resources/js/bootstrap.min.js'])
</head>

<body class="text-end" id="page-top" dir="rtl">
    <div id="wrapper">
        @include('components.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('components.top-bar')
                @yield('content')
            </div>
        </div>


    </div>



    <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script> -->
</body>