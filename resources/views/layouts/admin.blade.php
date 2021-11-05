
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{config('app.direction')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}" defer></script>


    <script src="{{asset('js/admin.js')}}" defer></script>

</head>
<body>

<div class="wrapper d-flex align-items-stretch ">

    <nav id="sidebar" class="text-right">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-dark">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4">
            <h1><a href="{{route('home')}}" class="logo">حلاق توفيق</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="{{route('admin.dashboard')}}"><span class="fa fa-home mr-3"></span> الصفحة الرئيسية</a>
                </li>
                <li>
                    <a href="{{route('admin.reservations.index')}}"><span class="fa fa-user mr-3"></span> الحجوزات</a>
                </li>
                <li>
                    <a href="{{route('admin.users.index')}}"><span class="fa fa-users mr-3"></span> المستخدمين</a>
                </li>

                <li>
                    <a href="{{route('admin.contacts.index')}}"><span class="fa fa-paper-plane mr-3"></span> الرسائل</a>
                </li>
                <li>
                    <a href="{{route('logout')}}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">تسجيل الخروج</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </li>
            </ul>




        </div>
    </nav>

<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container-fluid text-right">
            @yield('content')
        </div>
    </div>
</div>

</body>
<div class="footer">
    <div class="footer-copyright text-center py-3">© 2020 Copyright: abdulaziz mualla
    </div>
</div>


</html>

