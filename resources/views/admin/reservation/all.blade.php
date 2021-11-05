@extends('layouts.admin')
@section('content')
    <div class="topBage">
        <h2>الحجوزات</h2>
        <p class="header" >عدد الحجوزات :  {{$reservations->count()}}</p>
        <hr>
        <div class="search">
            <form class="" action="" method="post">
                <label for="idReservation">معرف الحجز: </label>
                <input type="number" name="idReservation" id="idReservation">
                <button class="btn btn-outline-secondary" type="button" name="button">
                    <i class="fa fa-search"></i>
                </button>
            </form>

        </div>
    </div>

    @foreach($reservations as $res)
        <div class="container pt-5  pb-3 text-right d-flex justify-content-center ">

            <div class="card my_reserves" style="width: 18rem;" id="" >

                <div class="card-header bg-info" id="hed">
                    <h4 class="h4">بيانات الحجز</h4>
                </div>
                <div class="card-body">

                    <label for=""><b>معرف الحجز:</b>{{$res->id}}</label>
                    <br>
                    <label for=""> <b>الإسم:</b> {{$res->user->name}}</label>
                    <br>
                    <label for=""> <b>التاريخ:</b> {{$res->date}}</label>
                    <br>
                    <label for=""> <b>الوقت:</b> {{$res->time}}</label>
                    <br>
                    <label for=""> <b>الجوال:</b> {{$res->user->phone}} </label>
                    <hr>
                    <div class="d-flex justify-content-center pb-2">
                        <form class="" action="" method="post">
                            <input type="hidden" name="r_id" value="">
                            <button class="btn btn-sm btn-info"type="submit" ><i class="fa fa-check"></i></button>
                        </form>
                        <form class="mr-3" action="" method="post">
                            <input type="hidden" name="cancel_res" value="">
                            <button class="btn btn-sm btn-danger"type="submit"><i class="fa fa-times"></i></button>
                        </form>
                        <form class="mr-3" action="" method="post">
                            <input type="hidden" name="block" value="">
                            <button class="btn btn-sm btn-danger"type="submit"><i class="fa fa-ban"></i></button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    @endforeach
@endsection
