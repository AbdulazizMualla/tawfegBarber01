@extends('layouts.app')
@section('title' , __('Change password'))
@section('content')
    <div class="container pt-5 text-right">
        <div id="login">
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-lg-6 col-md-12 col-mb-4">
                    <section>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form id="frmCap" class="text-center border border-light p-5 "  action="{{route('password.update')}}" method="post">
                          @csrf
                            <input type="hidden" name="token" value="{{ request()->route('token')}}">
                            <p class="h1 mb-4">تغيير كلمة المرور</p>
                            <hr >
                            <div class="form-group">
                                <input type="email" name="email" class="form-control  mb-4 @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني" id="email" value="{{$request->email}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control  mb-4 @error('password') is-invalid @enderror" placeholder="كلمة المرور" id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control  mb-4 @error('password_confirmation') is-invalid @enderror" placeholder="تأكيد كلمة المرور" id="password_confirmation">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-get-started mb-3" >تغيير كلمة المرور!</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    <div>
@endsection
