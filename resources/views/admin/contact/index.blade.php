@extends('layouts.admin')
@section('content')
    <div class="topBage">
        <h2> الرسائل</h2>

        <p class="header" >عدد الرسائل: {{$contacts->count() }}</p>
        <a href="{{route('admin.contacts.all')}}" class="btn btn-info mb-4">عرض كل الرسائل</a>

    </div>
    <div class="table table-hover table-striped">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>الإسم</th>
                <th>البريد الإلكتروني</th>
                <th>الرسالة</th>
                <th>التاريخ</th>
                <th>الرد</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->message}}</td>
                <td>{{$contact->created_at}}</td>
                <td>
                    <a href="{{route('admin.contacts.show' , $contact)}}" class="btn btn-sm btn-info fa fa-envelope-open"></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection


