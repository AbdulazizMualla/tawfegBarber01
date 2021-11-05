@extends('layouts.app')

@section('content')
    <div class="container pt-5 text-right">
        <div id="login">
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-lg-6 col-md-12 col-mb-4">
                    <div class="card">
                        <div class="card-header" id="hed">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>

@endsection
