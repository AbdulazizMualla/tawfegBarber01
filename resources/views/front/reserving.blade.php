@extends('layouts.app')
@section('title' , __('Reserving'))
@section('content')
{{--@if($userHaveRes)--}}
{{--    @include('_partial._message-reservation-not-available')--}}
{{--@else--}}
{{--    <div class="container text-center pt-5">--}}
{{--        <div class="alert alert-warning alert-dismissible fade show" role="alert">--}}
{{--            <p class="text-center">لايوجد حجوزات متاحة</p>--}}
{{--        </div>--}}
{{--    </div>--}}
    <section id="counts" class="counts">
        <div class="container  text-right" >
            <div class="container d-flex justify-content-center">
                <div class="pross " hidden>
                    <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>


            <div class="row aos-init aos-animate" data-aos="fade-up" id="divRev">
             @isset($dateAndTime)
                    @foreach($dateAndTime as $key => $date)
                        <div class="col-lg-4 col-md-6 pt-5">
                            <div class="count-box">
                                @if(count($date))
                                    <i class="icofont-meeting-add"></i>
                                    <form class="form-group pt-3 formRev" action="{{route('reservation.store')}}" method="post">
                                        @csrf
                                        <div class="">
                                            <h6 class="font-weight-bold text-success" name="data">{{__(Carbon\Carbon::createFromFormat('Y-m-d', $key)->format('l'))}}</h6>
                                            <h6 class="font-weight-bold " name="data"> {{ $key }}م  </h6>
                                        </div>
                                        <input type="hidden" name="date" value="{{$key}}">
                                        <div class="form-inline pt-3 d-flex justify-content-center">
                                            <label for="time">أختر الوقت:</label>
                                            <select class="form-control mr-2" name="time" id="time">
                                                @foreach($date as $time)

                                                    <option value="{{$time}}"> {{\Carbon\Carbon::parse($time)->format('g:i')}}
                                                        @if(Carbon\Carbon::parse($time)->format('A') == 'PM')
                                                            {{__('PM')}}
                                                        @elseif(Carbon\Carbon::parse($time)->format('AM'))
                                                            {{__('AM')}}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="pt-3">
                                            <button class="btn btn-get-started " id="btnrev">حجز</button>
                                        </div>
                                    </form>
                                @else
                                    <div class="">
                                        <h6 class="font-weight-bold text-success" name="data">{{__(Carbon\Carbon::createFromFormat('Y-m-d', $key)->format('l'))}}</h6>
                                        <h6 class="font-weight-bold " name="data"> {{ $key }}م  </h6>
                                        <i class="icofont-ban" style="background: red;"></i>
                                        <h6 class="h6 text-danger">لايوجد حجوزات متاحة لهذا اليوم</h6>

                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
             @endisset
            </div>
        </div>
    </section>
{{--@endif--}}
@endsection
