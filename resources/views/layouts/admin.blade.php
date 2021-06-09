<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8"/>
    @yield('title')
    <meta name="description"
          content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="{{ asset('html_version/libs/assets/animate.css/animate.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('html_version/libs/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('html_version/libs/assets/simple-line-icons/css/simple-line-icons.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('html_version/libs/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('html_version/html/css/font.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('html_version/html/css/app.css') }}" type="text/css"/>

    <style>
        td.empty-data {
            text-align: center;
        }

        table th,td {
            font-size: 16px;
            padding: 12px 15px !important;
        }

        table th i,td i {
            font-size: 12px;
        }
    </style>


</head>
<body>
<div class="app app-header-fixed ">

    <!-- header -->
    @include('partials.header')
    <!-- / header -->

    <!-- aside -->
    @include('partials.sidebar')
    <!-- / aside -->

    <!-- content -->
    @yield('content')
    <!-- /content -->

    <!-- footer -->
    @include('partials.footer')
    <!-- / footer -->

</div>

<script src="{{ asset('html_version/libs/jquery/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('html_version/libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-load.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-jp.config.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-jp.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-nav.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-toggle.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-client.js') }}"></script>

</body>
</html>
