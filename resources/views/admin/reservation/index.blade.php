@extends('layouts.admin')
@section('content')
    <p class="header" >عدد الحجوزات اليوم:  {{$reservations->count()}}</p>
    <a href="{{route('admin.reservations.all')}}" class="btn btn-info mb-4">عرض كل الحجوزات</a>
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
                    <form class="" action="{{route('admin.reservations.destroy' , $res)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-info"type="submit" ><i class="fa fa-check"></i></button>
                    </form>
                    <form class="mr-3" action="{{route('admin.reservations.cancel' , $res)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"type="submit"><i class="fa fa-times"></i></button>
                    </form>
                    <form class="mr-3" action="{{route('admin.users.block.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$res->user->id}}">
                        <button class="btn btn-sm btn-danger"type="submit"><i class="fa fa-ban"></i></button>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endforeach
@endsection
