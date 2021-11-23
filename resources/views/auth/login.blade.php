@extends('layouts.app')
@section('title' , __('Login'))
@section('content')
    <div class="container pt-5 text-right">
        <div id="login">
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-lg-6 col-md-12 col-mb-4">
                    <section>
                        <form id="frmCap" class="text-center border border-light p-5 "  action="{{route('login')}}" method="post">
                           @csrf
                            <p class="h1 mb-4">تسجيل الدخول</p>
                            <hr >
                            <div class="form-group">
                                <input type="text" name="email" class="form-control  mb-4 @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني أو رقم الجوال" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control  mb-4 @error('password') is-invalid @enderror" placeholder="كلمة المرور" id="password" required autocomplete="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <div class="form-check text-right">
                                        <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-get-started mb-3" >دخول!</button>

                                <a href="{{route('password.email')}}">هل نسيت كلمة المرور؟</a>
                                <br>
                                <a href="{{route('register')}}">ليس لديك حساب؟ قم بالتسجيل من هنا</a>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
