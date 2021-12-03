@extends('layouts.app')
@section('title' , __('Home'))
@section('content')

    <section id="hero">

        <div class="container text-right">
            <div class="row">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>لاتدق علي ولا أدق عليك <br> <span>فقط أحجز</span></h1>
                        <h2>ضبطنا لك الموقع علشان تحجز أي وقت وأنت مرتاح</h2>
                        <div class="text-center text-lg-right">
                            @auth
                                <a href="{{route('chooseService')}}" class="btn-get-started scrollto">حجز موعد</a>
                                <a href="{{route('my_reservation')}}" class="btn-get-started scrollto">إدارة الحجز</a>
                            @else
                                <a href="{{route('register')}}" class="btn-get-started scrollto">التسجيل</a>
                                <a href="{{'login'}}" class="btn-get-started scrollto">دخول</a>
                            @endauth

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{asset('images/log.png')}}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section>
    <!-- End Hero -->
    <main id="main">



        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row" data-aos="fade-up">

                    <div class="col-lg-4 col-md-6">
                        <div class="count-box">
                            <i class="icofont-simple-smile"></i>
                            <span data-toggle="counter-up">{{$counts->count_user_info}}</span>
                            <p>عملائنا السعيدين</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="icofont-ui-browser"></i>
                            <span data-toggle="counter-up">{{$counts->count_users}}</span>
                            <p>عدد الزيارات</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="icofont-live-support"></i>
                            <span data-toggle="counter-up">{{$counts->count_contact}}</span>
                            <p>الدعم</p>
                        </div>
                    </div>


                </div>

            </div>
        </section><!-- End Counts Section -->




        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact text-right">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>التواصل</h2>
                    <p>تواصل معنا</p>
                </div>

                <div class="row">

                    <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

                        <form action="" method="post" role="form" class="php-email-form">
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="إسمك" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="بريدك الإلكتروني" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="رسالتك"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">تم إرسال الرسالة بنجاح , شكراً لك !</div>
                            </div>
                            <div class="text-center"><button type="submit">إرسال</button></div>
                        </form>

                    </div>

                    <div id="1" class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>الموقع:</h4>

                                <a href="https://goo.gl/maps/EHndjp4GiLH8bAzaA"><p>الرياض - حي الخليج 13223</p></a>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>البريد الإلكتروني:</h4>
                                <p>support@tawfeg.com</p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>جوال:</h4>
                                <p>0559792206</p>
                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
