<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.ico') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset("pwa/poultry-24.png") }}">
    <link href="{{ asset("assets/vendor/jqvmap/css/jqvmap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/styles.css") }}" rel="stylesheet">
    @yield('css')
</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">
    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="" class="brand-logo">
            <img class="logo-abbr" src="{{ asset("logo.ico") }}" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

@include('layouts.header')

@include('layouts.sidebar')

<!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->


<!-- Required vendors -->
<script src="{{ asset("assets/vendor/global/global.min.js") }}"></script>
<script src="{{ asset("assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js") }}"></script>
<script src="{{ asset("assets/js/custom.min.js") }}"></script>
<script src="{{ asset("assets/js/deznav-init.js") }}"></script>

<script src="{{ asset('sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
<script>
    (function ($) {
        "use strict"
        var direction = getUrlParams('dir');
        if (direction != 'rtl') {
            direction = 'ltr';
        }
        new dezSettings({
            typography: "roboto",
            version: "light",
            layout: "vertical",
            headerBg: "color_1",
            navheaderBg: "color_3",
            sidebarBg: "color_1",
            sidebarStyle: "full",
            sidebarPosition: "fixed",
            headerPosition: "fixed",
            containerLayout: "wide",
            direction: direction
        });

    })(jQuery);
</script>

@yield('js')


</body>
</html>
