@extends('layouts.admin')
@section('content')
    <p class="header" >عدد المستخدمين: {{$users->count()}}</p>
    <a href="{{route('admin.users.block.index')}}" class="btn btn-info mb-4">المستخدمين المحظورين</a>
    <a href="{{route('admin.users.active.index')}}" class="btn btn-info mb-4">الحسابات الغير مفعله</a>
@foreach($users as $user)
    <div class="container pt-5  pb-3 text-right d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-header bg-info" id="hed">
                <h4 class="h4">بيانات المستخدم</h4>
            </div>
            <div class="card-body">
               @include('_partial._user-info')
                <div class="d-flex justify-content-center pb-2">
                    @if($user->block != null)
                        @include('_partial._form-delete' , ['route' => route('admin.users.block.destroy' , $user) , 'method' => 'DELETE' , 'methodType' => 'post' , 'btnName' => 'إلغاء الحظر' , 'btnColor' => 'success'])
                    @else
                        @include('_partial._form-post' , ['route' => route('admin.users.block.store') , 'id' => $user->id , 'methodType' => 'post' , 'btnName' => 'حظر' , 'btnColor' => 'danger'])
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
