@extends('layouts.app')
@section('title' , __('Register'))
@section('content')
    <div class="container pt-5 text-right">
        <div id="login">
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-lg-6 col-md-12 col-mb-4">
                    <section>
                        <form id="frmCap" class="text-center border border-light p-5 "  action="{{route('register')}}" method="post">
                            @csrf
                            <p class="h1 mb-4">التسجيل</p>
                            <hr >
                            <div class="form-group">
                                <input type="text" name="name" class="form-control  mb-4  @error('name') is-invalid @enderror" placeholder="الإسم" id="name" value="{{old('name')}}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control  mb-4  @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني" id="email" value="{{old('email')}}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control  mb-4  @error('password') is-invalid @enderror" placeholder="كلمة المرور" id="password" required autocomplete="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control  mb-4" placeholder="تأكيد كلمة المرور" id="password_confirmation" required autocomplete="password_confirmation">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control  mb-4 @error('phone') is-invalid @enderror" placeholder="رقم الجوال: 05XXXXXXXX" id="phone" value="{{old('phone')}}" required autocomplete="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-get-started mb-3" >دخول!</button>
                                <a href="{{ route('login') }}">مسجل مسبقا؟ سجل دخولك من هنا.</a>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
