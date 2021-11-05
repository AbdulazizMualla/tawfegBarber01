@extends('layouts.app')
@section('title' , __('Password reset'))
@section('content')

    <div class="container pt-5 text-right">
        <div id="login">
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-lg-6 col-md-12 col-mb-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <section>
                        <form id="frmCap" class="text-center border border-light p-5 "  action="" method="post">
                          @csrf
                            <p class="h1 mb-4">إستعادة كلمة المرور</p>
                            <hr >
                            <div class="form-group">
                                <input type="email" name="email" class="form-control  mb-4 @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني" id="email" value="{{old('email')}}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-block btn-get-started mb-3" >إستعادة كلمة المرور!</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
