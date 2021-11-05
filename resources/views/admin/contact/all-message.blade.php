@extends('layouts.admin')
@section('content')
    <div class="topBage">
        <h2>كل الرسائل</h2>

        <p class="header" >عدد الرسائل: {{$contacts->count() }}</p>

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
                    <td>{{$contact->reply}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection


