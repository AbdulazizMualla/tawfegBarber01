
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{config('app.direction')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}" defer></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" defer></script>
    <script src="{{asset('assets/js/jquery.easing.min.js')}}" defer></script>
    <script src="{{asset('assets/js/venobox.min.js')}}" defer></script>
    <script src="{{asset('assets/js/jquery.waypoints.min.js')}}" defer></script>
    <script src="{{asset('assets/js/counterup.min.js')}}" defer></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}" defer></script>
    <script src="{{asset('assets/js/aos.js')}}" defer></script>

    <script src="{{asset('js/app.js')}}" defer></script>

</head>
<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent ">
    <div class="container d-flex align-items-center">

        <div class="logo ml-5">
            <h1 class="text-light"><a href="{{route('home')}}"><span>حلاق توفيق</span></a></h1>
        </div>

        <nav class="nav-menu d-none d-lg-block ml-auto">
            <ul>
                <li class="active"><a href="{{route('home')}}">الرئيسية</a></li>
                @if(Route::is('home'))
                <li><a href="#contact">تواصل معي</a></li>
                @endif
                @auth
                    <li><a href="{{route('chooseService')}}">حجز موعد</a></li>
                    <li><a href="{{route('my_reservation')}}">إدارة الحجز</a></li>
                    <li><a href="{{route('logout')}}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">تسجيل الخروج</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @if(auth()->user()->role === 'admin')
                        <li><a href="{{route('admin.dashboard')}}">لوحة التحكم</a></li>
                    @endif
                @else
                    <li><a href="{{route('login')}}">دخول</a></li>
                    <li><a href="{{route('register')}}">التسجيل</a></li>
                @endauth

            </ul>

        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<main class="">
    @if($errors->any())
        <div class="alert alert-danger text-right">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
       @yield('content')
</main>
<!-- ======= Footer =======-->
<footer id="footer">
    <div class="container">

    </div>
    <div class="copyright">
        &copy; Copyright: abdulaziz mualla 2020
    </div>
</footer><!-- End Footer -->
</body>

</html>

