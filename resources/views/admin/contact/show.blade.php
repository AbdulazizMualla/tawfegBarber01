@extends('layouts.admin')
@section('content')
    <div class="card">

        <div class="content">



            <form style="padding: 20px" action="{{route('admin.contacts.update' , $contact)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">الإسم</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$contact->name}}" readonly>
                </div>

                <div class="form-group">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$contact->email}}" readonly>
                </div>

                <div class="form-group">
                    <label for="date">التاريخ & الوقت</label>
                    <input type="datetime" name="date" class="form-control" id="date" value="{{$contact->created_at}}" readonly>
                </div>

                <div class="form-group">
                    <label for="message">الرسالة</label>
                    <textarea name="message" id="message" class="form-control" rows="4" cols="80" readonly>{{$contact->message}}</textarea>
                </div>

                <div class="form-group">
                    <label for="reply">الرد</label>
                    <textarea name="reply" id="reply" class="form-control" rows="4" cols="80" ></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-info" name="button"><i class="fa fa-paper-plane mr-1"></i> إرسال</button>
                </div>
            </form>
        </div>
    </div>
@endsection




