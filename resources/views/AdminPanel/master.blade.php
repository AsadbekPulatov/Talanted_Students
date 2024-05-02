<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('AdminPanel/assets/assets/img/apple-icon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('AdminPanel/assets/img/favicon.png')}}" />
    <title>@yield('title')</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{asset('AdminPanel/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('AdminPanel/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{asset('AdminPanel/assets/css/argon-dashboard-tailwind.css?v=1.0.1')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{asset('sweetalert.js')}}"></script>

</head>
<style>

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
<div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
<!-- sidenav  -->

@include('AdminPanel.sidebar')

<!-- end sidenav -->

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    <!-- Navbar -->
    @include('AdminPanel.navbar')
    <!-- end Navbar -->

    <!-- cards -->
    @yield('content')
    <!-- end cards -->
</main>

@include('AdminPanel.nav')

</body>
<!-- plugin for charts  -->
<script src="{{asset('AdminPanel/assets/js/plugins/chartjs.min.js')}}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{asset('AdminPanel/assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
<!-- main script file  -->
<script src="{{asset('AdminPanel/assets/js/argon-dashboard-tailwind.js?v=1.0.1')}}" async></script>

<script src="{{asset('jquery.min.js')}}"></script>
<script>
    let th = @json($setting->theme);
    if(th == 'dark')
    {
        var dark_mode = document.querySelector("[dark-toggle]");
        var root = document.querySelector("html");
        root.classList.add("dark");
    }
</script>
<script>
    function onsubmitForm(form) {
        // create AJAX instance
        var ajax = new XMLHttpRequest();

        // open the request
        ajax.open("POST", form.getAttribute("action"), true);

        // ajax.onreadystatechange = function () {
        //     // when the request is successfull
        //     if (this.readyState == 4 && this.status == 200) {
        //         // convert the JSON response into Javascript object
        //         var data = JSON.parse(this.responseText);
        //
        //         // show the response
        //         alert(data.status + " - " + data.message);
        //     }
        //
        //     // if the request fails
        //     if (this.status == 500) {
        //         alert(this.responseText);
        //     }
        // };

        var formData = new FormData(form);
        ajax.send(formData);
        return false;
    }

</script>
@yield('script')
</html>
