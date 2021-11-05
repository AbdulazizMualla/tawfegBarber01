@extends('layouts.admin')
@section('content')
    @isset($userNoActive)
    <p class="header" >عدد المستخدمين الغير مفعلين:  {{$userNoActive->count()}}</p>
        @foreach($userNoActive as $user)
    <div class="container pt-5  pb-3 text-right d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-header bg-info" id="hed">
                <h4 class="h4">بيانات المستخدم</h4>
            </div>
            <div class="card-body">
                @include('_partial._user-info')
                <div class="d-flex justify-content-center pb-2">
                    @include('_partial._form-delete' , ['route' => route('admin.users.active.update' , $user) , 'method' => 'PUT' , 'methodType' => 'post' , 'btnName' => 'تفعيل' , 'btnColor' => 'success'])
                </div>

            </div>
        </div>
    </div>
        @endforeach
    @endisset
@endsection
