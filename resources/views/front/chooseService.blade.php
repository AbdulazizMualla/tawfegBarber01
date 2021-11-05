@extends('layouts.app')
@section('title' , __('Choose service'))
@section('content')
    {{--@if($userHaveRes)
    @include('_partial._message-reservation-not-available')
    @else--}}
    <section class="counts">
        <div class="container text-center" >
            <div class="row aos-init aos-animate" data-aos="fade-up" >
                <div class="col-lg-12 col-md-6 pt-5">
                    <div class="count-box">
                        <i class="icofont-hand-drag1"></i>
                        <form class="form-group pt-3" action="{{route('saveService')}}" method="post">
                            @csrf
                            <div class="pt-3">
                                <label for="time">أختر نوع الخدمة:</label>
                                <select class="form-control" name="service" id="service">
                                    @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->service}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="pt-3">
                                <button class="btn btn-get-started " id="btnrev">التالي</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
  {{--  @endif--}}
@endsection
