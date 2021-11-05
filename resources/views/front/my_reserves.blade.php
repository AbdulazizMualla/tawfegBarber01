@extends('layouts.app')
@section('title' , __('My reserves'))
@section('content')
@isset($reservation)
    <div class="container pt-5  pb-5 text-right d-flex justify-content-center ">

        <div class="card my_reserves" style="width: 18rem;">
            <div class="card-header" id="hed">
                <h4 class="h4">بيانات الحجز</h4>
            </div>
            <div class="card-body">
                <label for=""><b>معرف الحجز:</b> {{$reservation->id}} </label>
                <br>
                <label for=""><b>اليوم:</b> {{__(Carbon\Carbon::createFromFormat('Y-m-d', $reservation->date)->format('l'))}}</label>
                <br>
                <label for=""> <b>التاريخ:</b> {{$reservation->date}}</label>
                <br>
                <label for=""> <b>الوقت:</b> {{\Carbon\Carbon::parse($reservation->time)->format('g:i')}}
                                                        @if(Carbon\Carbon::parse($reservation->time)->format('A') == 'PM')
                                                            {{__('PM')}}
                                                        @elseif(Carbon\Carbon::parse($reservation->time)->format('AM'))
                                                            {{__('AM')}}
                                                        @endif</label>
                <hr>
                <div class="d-flex justify-content-center pb-2">
                    <form class="form-group" action="{{route('reservation.destroy' , $reservation)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('هل أنت متأكد من إلغاء الحجز')" type="submit" class="btnDelete"><i class="icofont-bin icofont-1x"></i></button>
                    </form>
                    <form class="form-group" action="{{route('edit.reservation')}}" method="post">
                        @csrf
                        <button class="btnEdit mr-3">  <i class="icofont-edit icofont-1x"></i></button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@else
    <div class="container text-center pt-5">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p class="text-center">لايوجد لديك حجوزات</p>
            <a href="{{route('chooseService')}}">إحجز الأن من هنا</a>
        </div>
    </div>

@endisset
@endsection
